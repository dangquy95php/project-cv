const Playwright_Wordpress = require('../../Playwright_Wordpress');
const HtmlCheck      = require('../Models/HtmlCheck');

module.exports = {

    checkToolWordpressAdmin: async function(req, res) {
        let id = req.body.id;

        return HtmlCheck.findById(id).exec(async (err, html) => {
            if (err) {
                return res.status(500).send({ message: err.message});
            }

            if (html) {
                let groupUrl = JSON.parse(html.option).input_link[0];
                if (groupUrl.search('wp-login.php') == -1) {
                    groupUrl = groupUrl.split('/');
                    groupUrl = groupUrl[0]+ '//'+ groupUrl[1]+ groupUrl[2] + '/wp-login.php';
                }

                let wordpress = new Playwright_Wordpress();
                let data = await wordpress.check(groupUrl, req, JSON.parse(html.option));
                html.check_result = JSON.stringify(data);
                if (!data.sucess) {
                    return res.status(500).send({ message: data.data});
                }

                html.save(async (err, result) => {
                    if (err) {
                        return res.status(500).send({ message: err.message});
                    }

                    return res.status(200).send({ message: 'Successfully', id: result._id});
                });
            }
        });
    },

    showCheckWordpressAdmin: async function(req, res) {
        let id = req.query.id;
        return await HtmlCheck.findById(id).exec((err, result) => {
            if (err) {
                return res.redirect('html-check');
            }

            if (result) {
                return res.render('result-check-wordpress', {data: JSON.parse(result.check_result), options: JSON.parse(result.option)});
            } else {
                return res.render('html-check');    
            }
        });
    }
}