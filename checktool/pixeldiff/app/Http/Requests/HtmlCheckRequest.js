const {check} = require('express-validator');

module.exports = {
    
    validateCheckHTML: function() {
        return [
            check('company_name').custom((value, { req }) => {
                if ((req.query.company_name != undefined || req.query.copyright != undefined || req.query.apple_touch_icon != undefined || 
                        req.query.favicon_yet != undefined || req.query.link_die != undefined || req.query.re_captchar != undefined || req.query.contact_tel_link != undefined ||
                        req.query.hidden_recaptcha != undefined ||req.query.faq_cursor != undefined || req.query.design_same_image != undefined ||
                        req.query.first_h1 != undefined || req.query.sp_tel_link != undefined || req.query.detail_h1_h5 != undefined || req.query.google_map_address != undefined ||req.query.mv_background != undefined)) {
                    if (req.query.select_company == "")
                        throw new Error('Please choose company name');
                    return true;
                }
                return true;
            }),

            check('input_link').notEmpty().withMessage('Input link at least 10 characters'),
            check('input_link').custom((value, { req }) => {
                let request = req.query.input_link.trim().replace(/^\s+|\s+$/g, '').split(/\s+/);
                for (const element of request) {
                    if (!helper.validURL(element)) {
                        throw new Error('Input link is incorrect');
                    }
                }
                return true;
            })
        ];
    }
}
