const User = require('../Models/User');
const PixelDiff = require('../Models/PixelDiff');
const { validationResult } = require('express-validator');
const bcrypt = require('bcrypt');
const helper = require("../../../config/helper");
const Cryptr = require('cryptr');
const cryptr = new Cryptr(process.env.KEY_ENCRYPTION);
const Mail = require('../../../config/mail');

module.exports = {
    login: async function(request, response) {
        return response.render('account/login');
    },

    postLogin: function(request, response) {
        return User.findOne({email: request.body.email, active: true}).exec(function(err, user) {
            if(err) {
                request.flash('errors', [err.message]);
                return response.redirect('/login');
            } else if (!user) {
                request.flash('errors', ['Username and Password are incorrect']);
                return response.redirect('/login');
            }
            let userCurrent = user;
            bcrypt.compare(request.body.password, user.password, (err, result) => {
                if(result === true) {
                    request.session.user = userCurrent;
                    if (request.body.remember) {
                        request.session.cookie.expires = new Date(Date.now() + 1000 * 60 * 24 * 300)
                        request.session.cookie.maxAge = 1000 * 60 * 24 * 300;
                    }

                    let admin = (userCurrent.role == 'admin') ? true : false;
                    return response.render('account/login', {isAdmin: admin});
                } else {
                    request.flash('errors', ['Username and Password are incorrect']);
                    return response.redirect('/login');
                }
            });
        });
    },

    proflie: function(request, response) {
        return PixelDiff.find({user_id: request.session.user._id}).sort({ _id: 'desc' }).exec((err, result) => {
            return response.render('account/profile', {histories: result});
        });
    },

    postProflie: function(request, response) {
        const errors = validationResult(request);
        if (!errors.isEmpty()) {
            request.flash('validate', errors.array());
            return response.redirect('/user/profile');
        }
        return bcrypt.compare(request.body.password, request.session.user.password, function(err, result) {
            if (err) {
                request.flash('errors', [err.message]);
                return response.redirect('/user/profile');
            }
            if (result) {
                return bcrypt.hash(request.body.password_new, 10, function(err, hash) {
                    if(err) {
                        request.flash('errors', [err.message]);
                        return response.redirect('/user/profile');
                    }
                    return bcrypt.compare(request.body.password_new, request.session.user.password, function(err, result) {
                        if (result) {
                            request.flash('errors', ['This password has been pre-set']);
                            return response.redirect('/user/profile');
                        }
                        // update session
                        request.session.user.password = hash;
                        return User.updateOne({email: request.session.user.email, active: true}, {$set: {password: hash} }).exec((err, user) => {
                            if (err) {
                                request.flash('errors', [err.message]);
                                return response.redirect('/user/profile');
                            }
                            request.flash('success', ['Updated password successfully']);
                            return response.redirect('/user/profile');
                        });
                    });
                });
            } else {
                request.flash('errors', ['Password old not corect']);
                return response.redirect('/user/profile');
            }
        });
    },

    activeAccount: function(request, response) {
        return User.findOneAndUpdate({active_code: request.query.active_code, active: false}, {active: true}, {option: false}).exec(function(err, data) {
            let result = {}
            if (err) {
                result = {success: false, message: error.message};
            } else {
                if (data) {
                    result = {success: true, message: 'Account activated successfully'}
                } else {
                    result = {success: false, message: 'Account activated before'};
                }
            }
            
            return response.render('account/active-code', result);
        });
    },

    register: function(request, response) {
        return response.render('account/register_user');
    },

    submitRegister: function(request, response) {
        const errors = validationResult(request);
        if (!errors.isEmpty()) {
            request.flash('validate', errors.array());
            return response.redirect('/user/register');
        }
            
        return User.findOne({email: request.body.email}, (err, user) => {
            if(user == null) {
                let code = cryptr.encrypt(request.body.email + helper.makeid(20));
                return bcrypt.hash(request.body.password, 10, function(err, hash) {
                    if (err) {
                        request.flash('errors', [err.message]);
                        return response.redirect('/user/register');
                    }

                    const user = new User(request.body)
                    user.password = hash;
                    user.active_code = code;
                    if (process.env.ALLOW_SEND_MAIL == 'false') {
                        user.active = true;
                    }

                    return user.save(async (error, result) => {
                        if(error) {
                            request.flash('errors', [error.message]);
                            return response.redirect('/user/register');
                        }
                        if (process.env.ALLOW_SEND_MAIL  == 'true') {
                            await new Mail(code, request.body.email).sendMail();
                        }
                        
                        request.flash('success', [`Please active email ${result.email}`]);
                        return response.redirect('/user/register');
                    })
                });
            }

            request.flash('errors', ['User already exists']);
            return response.redirect('/user/register');
        });
    },

    logout: function(request, response) {
        if (request.session) {
            return request.session.destroy(function(err) {
                if(err) {
                    return response.status(500).send({error: err.message});
                } else {
                    return response.status(200).send({message: 'Logout successfully'});
                }
            });
        }
    },

    forgotPassword: function(request, response) {
        return response.render('account/forgot-password');
    },

    postForgotPassword: function(request, response) {
        const errors = validationResult(request);
        if (!errors.isEmpty()) {
            request.flash('validate', errors.array());
            return response.redirect('/user/forgot-password');
        }

        let newPass = helper.makeid(10);
        return bcrypt.hash(newPass, 10, function(err, hash) {
            return User.updateOne({email: request.body.email, active: true}, {$set: {password: hash} }).exec(async(err, user) => {
                if (err) {
                    request.flash('errors', [err.message]);
                    return response.redirect('/user/forgot-password');
                }

                if (process.env.ALLOW_SEND_MAIL) {
                    let mail = await new Mail(undefined, request.body.email, 'Forgot Password')
                    await mail.defaultTemplate(mail.templateForgotPassword(newPass));
                    try {
                        await mail.sendMail();
                    } catch(ex) {
                        request.flash('errors', [`${ex.message} ${request.body.email}`]);
                        return response.redirect('/user/forgot-password');
                    }
                }

                request.flash('success', [`Password has been sent to email ${request.body.email}`]);
                return response.redirect('/user/forgot-password');
            });
        });
    },
}