const User = require('../../Models/User');
const bcrypt = require('bcrypt');
const { validationResult } = require('express-validator');
const { help } = require('../../../../winston');

module.exports = {
    
    index: async function(request, response) {
        const escapeRegex = (string) => {
            return string.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
        };

        var page = parseInt(request.query.page) || 1;
        var perPage = parseInt(request.query.per_page) || 10;
        const searchQuery = request.query.text_seach || '';
        regex = new RegExp(escapeRegex(searchQuery), 'gi');
        const numOfUsers = await User.find({role: 'user'}).countDocuments({email: regex});

        return User.find({role: 'user', email: regex }).sort({ email: 'desc' }).skip((perPage * page) - perPage).limit(perPage).exec((err, data) => {
            return response.render('admin/users', {
                search_query: searchQuery,
                users: data,
                per_page: perPage,
                current: page,
                pages: Math.ceil(numOfUsers / perPage),
                flash: request.flash()});
        });
    },

    changePassword: function(request, response) {
        let userId = request.params.id;
        return User.findOne({_id: userId }, (err, result) => {
            if (err) {
                request.flash('errors', err.message);
                return response.redirect(`/404`);
            }

            return response.render('admin/change-password', {user: result});
        });
    },

    postChangePassword: function(request, response) {
        const errors = validationResult(request);
        if (!errors.isEmpty()) {
            request.flash('validate', errors.array())
            return response.redirect(`/admin/user/change-password/${request.params.id}`);
        }

        let userId = request.params.id;
        let pass_hash = request.body.password;
        return bcrypt.compare(request.body.password_new, pass_hash, function(err, result) {
            if (err) {
                request.flash('errors', err.message);
                return response.redirect(`/admin/user/change-password/${userId}`);
            }
            if (result){
                request.flash('errors', `This password has been pre-set`);
                return response.redirect(`/admin/user/change-password/${userId}`);
            } 
            
            return bcrypt.hash(request.body.password_new, 10, function(err, hash) {
                if(err) {
                    request.flash('errors', err.message);
                    return response.redirect(`/admin/user/change-password/${userId}`);
                }
                return User.findOne({_id: userId, role: 'user'}).exec((err, user) => {
                    if(err) {
                        request.flash('errors', err.message);
                        return response.redirect(`/admin/user/change-password/${userId}`);
                    }
                    if (!user) {
                        request.flash('errors', 'No user found');
                        return response.redirect(`/admin/user/change-password/${userId}`);
                    }
                    user.password = hash;
                    return user.save( function(err){
                        if(err) {
                            request.flash('errors', err.message);
                            return response.redirect(`/admin/user/change-password/${userId}`);
                        }

                        request.flash('success', 'Updated password successfully');
                        return response.redirect(`/admin/user/change-password/${userId}`);
                    })
                   
                });
            });
        });
    },

    deleteUser: function(request, response) {
        let id = request.params.id;
        let email = request.query.email;
        return User.deleteOne({_id: id, role: 'user'}).exec((err, result) => {
            if (err) {
                request.flash('errors', `Delete user ${email} failed.`);
            } else {
                request.flash('success', `Deleted user ${email} successfully.`)
            }
            
            return response.redirect('/admin/users');
        });
    }
}