const {check} = require('express-validator');

module.exports = {

    userRegiser: function() {
        return [
            check('email').notEmpty().withMessage('Email cannot be left blank')
                .isLength({min:5, max:100}).withMessage('The minimum and maximum lengths are: [5-100]')
                .isEmail().withMessage('Email format is incorrect'),
            check('password').notEmpty().withMessage('Password can not be blank')
                .isLength({min:5, max:50}).withMessage('The minimum and maximum lengths are: [5-50]'),
            check('password_confirm', 'Password confirm is required.').notEmpty(),
            check('password_confirm','Password mismatch').custom((value, { req }) => {
                if (req.body.password != value)
                    throw new Error('Password incorrect');
    
                return true;
            })
        ];
    },

    activeAccount: function() {
        return [
            check('active_code').notEmpty().withMessage('Your code is incorrect')
                .isLength({min:20}).withMessage('The length of your code should not be less than 20 characters')
        ];
    },

    forgotPassword: function() {
        return [
            check('email').isEmail().withMessage('Email không hợp lệ')
        ];
    },

    updatedPassword: function() {
        return [
            check('password').notEmpty().withMessage('Password can not be blank')
                .isLength({min:5, max:50}).withMessage('The minimum and maximum lengths are: [5-50]'),
            check('password_new').notEmpty().withMessage('Password new can not be blank')
                .isLength({min:5, max:50}).withMessage('The minimum and maximum lengths are: [5-50]'),
            check('password_comfirm', 'Password confirm is required.').notEmpty(),
            check('password_comfirm','Password mismatch').custom((value, { req }) => {
                if (req.body.password_new != value)
                    throw new Error('Password comfirm incorrect');
    
                return true;
            })
        ];
    }
}