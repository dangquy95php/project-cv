const {check} = require('express-validator');

module.exports = {

    changePassword: function() {
        return [
            check('password_new').notEmpty().withMessage('Password can not be blank')
                .isLength({min:5, max:50}).withMessage('The minimum and maximum lengths are: [5-50]'),
            check('password_comfirm', 'Password confirm is required.').notEmpty(),
            check('password_comfirm','Password mismatch').custom((value, { req }) => {
                if (req.body.password_new != value)
                    throw new Error('Password incorrect');
    
                return true;
            })
        ];
    },
}