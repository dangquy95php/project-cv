const { validationResult } = require('express-validator');
const Playwright_No1 = require('../../Playwright_No1');
const HtmlCheck      = require('../Models/HtmlCheck');
const data_json = require('../../../config/data_json');
const code = require('../../../config/code');
const axios  = require('axios');

module.exports = {
    index: async function(req, res) {
        // return res.render('html-check', { data_json: JSON.parse(data_json.data)});
        return await axios.get(process.env.URL_LIST_COMPANY).then(function (response) {
            // console.log(response.data);
            // this.list_company = response.data;
            return res.render('html-check', { data_json: response.data});
        }).catch(function (error) {
            return res.render('html-check', { data_json: [], error_api: error.message});
        })
    },

    validateHtml: async function(req, res) {
        const errors = validationResult(req);
        if (!errors.isEmpty())
            return res.status(422).send({ errors: errors.array()});

        let linkMutiple = req.query.input_link.trim().replace(/^\s+|\s+$/g, '').split(/\s+/);
        req.query.input_link = [];

        linkMutiple.forEach(element => {
            if (element.match(/\/$/g)) {
                req.query.input_link.push(element);
            } else {
                req.query.input_link.push(element + '/');
            }
        });
        
        let option = {
            user_id: req.session.user._id,
            option:  JSON.stringify(req.query)
        }
        
        return HtmlCheck.create(option, function (err, result) {
            if (err) {
                return res.status(422).send({errors: [{msg: err.message}]});
            } else {
                return res.status(200).send({data: 'Successfully', id: result._id});
            }
        });
    },

    checkToolHtml: async function(req, res) {
        let id = req.body.id;
        return HtmlCheck.findById(id).exec(async (err, html) => {
            if (err) {
                return res.status(500).send({ message: err.message});
            }

            if (html) {
                let html1 = JSON.parse(html.option);
                let listLink = html1.input_link;
                let select_company = html1.select_company;
                let list_company = await axios.get(process.env.URL_LIST_COMPANY).then(function (response) {
                    return response.data;
                });

                let url = html1.input_link[0];
                let groupUrl = url.split('/');
                let wordpress = '';

                if (html1.twentytwenty_and_no1 == 'on' || html1.no1_theme01_css_style == 'on'
                || html1.page_post_news_works == 'on' || html1.toppage_front_page == 'on'
                || html1.plugin_default == 'on' || html1.all_seo == 'on' || html1.h1_added_in_function == 'on') {
                    await axios({ method: 'post', url: groupUrl[0]+ '//'+ groupUrl[1]+ groupUrl[2] + '/wp-admin/admin-ajax.php', params: {
                        action: 'checktool',
                    }, auth: {
                        username: req.body.username,
                        password: req.body.password
                    }}).then(function (response) {
                        wordpress = JSON.stringify(response.data);
                    }).catch(err => {
                        if (err.response && err.response.status == 400) {
                            wordpress = JSON.stringify({
                                data: {
                                success: false,
                                message: "Please install or active plugin in wordpress admin!<br/><a target='_blank' href='https://gitlab.com/respect-pal-jp/respect-base/chronodrive/vietnam/quy-plugin'>https://gitlab.com/respect-pal-jp/respect-base/chronodrive/vietnam/quy-plugin</a>"
                            }
                        })} else {
                            wordpress = JSON.stringify({
                                data: {
                                success: false,
                                message: err.response
                            }
                        })}
                    });
                }
                if (wordpress == '') {
                        wordpress = JSON.stringify({
                            data: {
                            success: false,
                            message: ''
                        }
                    })
                }

                // let list_company = JSON.parse(data_json.data);
                const playwright = new Playwright_No1(list_company, listLink, undefined, undefined , select_company);
                playwright.basicAuth(req.body.username, req.body.password)
                let data = await playwright.newSomeBrowserAndScreenshoot(html1);
      
                for (let index = 0; index < data.length; index++) {
                   data[index].no1.wordpress = JSON.parse(wordpress).data;
                   data[index].no1.wordpress.success = JSON.parse(wordpress).success;
                }

                html.check_result = JSON.stringify(data);
                html.save(async (err, result) => {
                    if (err) {
                        return res.status(500).send({ message: err.message});
                    }

                    return res.status(200).send({ message: 'Successfully', id: result._id});
                });
            }
        });
    },

    showHtmlCheck: async function(req, res) {
        let id = req.query.id;
        return await HtmlCheck.findById(id).exec((err, result) => {
            if (err) {
                return res.redirect('html-check');
            }

            if (result) {
                var data = { options: JSON.parse(result.option), data: JSON.parse(result.check_result) };
                return res.render('result-check', data);
            } else {
                return res.render('html-check');    
            }
        });
    }
}