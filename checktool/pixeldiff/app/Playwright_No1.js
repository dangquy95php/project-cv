const playwright = require('playwright');
const validateWww = require("html-validator");
const logger = require('../winston');
const axios          = require('axios');
const { error } = require('winston');
const request = require("request");
const HTMLParser  = require('node-html-parser');
const defined = require('../config/define');
const code = require('../config/code');
const matchAll = require("match-all");

module.exports = class Playwright_No1 {
    constructor(list_company, listUrlRequest = [], width = 1417, browserType = ['chromium', 'firefox', 'webkit'], select_company = '') {//, 'firefox', 'webkit'
        this.listUrlRequest = listUrlRequest;
        this.browsers = browserType;
        this.width = width;
        this.select_company = select_company;

        if (list_company == undefined) {
            this.list_company = JSON.stringify([]);
        } else {
            this.list_company = list_company;
        }
    }

    basicAuth(username = '', password = '') {
        this.username = username;
        this.password = password;
    }
    
    // call asynchronous browser chrome, firefox, webkit
    async newSomeBrowserAndScreenshoot(option = {}) {
        let that = this;
        var promise = this.listUrlRequest.map(async function(url, index) {
            const browser = await playwright[that.browsers[0]].launch({
                ignoreHTTPSErrors: true,
                headless: false,
                args: [
                    '--no-sandbox',
                    '--disable-gpu',
                    '--disable-dev-shm-usage',
                    '--hide-scrollbars',
                    '--mute-audio',
                    '--disable-web-security',
                    '--disable-features=IsolateOrigins,site-per-process'
                ]
            });

            const object = new Object;
            object.conso = [];
            object.meta = [];
            object.url = url;
            object.href1 = [];
            object.href2 = [];
            object.php = [];
            object.validate = {};
            object.no1 = {};
            object.error = '';
            object.no1.company_in_html = [];
            object.no1.link_die = [];
            object.no1.design_same_image = [];
            object.no1.tel_link = [];
            object.no1.tel_link_not_exits_fax = [];
            object.no1.hidden_recaptcha = '';
            object.no1.re_captchar = [];
            object.no1.first_h1 = '';
            object.no1.detail_h1_h5 = [];

            let domain = url.split('/');
            domain = domain[0] + '//'+ domain[2];
            let url_basic_auth = url;

            const context =  await browser.newContext();
            const page = await context.newPage();
            let override = Object.assign(page.viewportSize(), {width: parseInt(that.width)});
            await page.setViewportSize(override);
            if (that.username && that.password) {
                const auth = Buffer.from(`${that.username}:${that.password}`).toString('base64');
                let url1 = url;
                url1 = url1.replace('http://', '');
                url_basic_auth = `http://${that.username}:${that.password}@`. concat(url1);

                await page.setExtraHTTPHeaders({
                    'Authorization': `Basic ${auth}`
                });
            }

            page.on("pageerror", error => {
                if (error.message.match(/Invalid or unexpected token/g)) {
                    object.conso.push({syntax: '<span class="badge badge-danger">SyntaxError</span>'+ ' ' + error.message });
                }
                if (error.message.match(/SyntaxError:/g)) {
                    object.conso.push({syntax: '<span class="badge badge-danger">SyntaxError</span>'+ ' ' + error.message.replace('SyntaxError: ""', '') });
                }
            });

            page.on("response", response => {
                if (300 > response.status() && 200 <= response.status()) return;
                if (302 == response.status()) return;
                if (304 == response.status()) return;
                if (response.status() == 404) {
                    object.conso.push({status: '<span class="badge badge-danger">404</span>ファイルが無い<br>' + response.url()});    
                }
                if (response.status() == 401) {
                    object.conso.push({status: '<span class="badge badge-danger">401</span>Basic認証かかっているかも？<br>' + response.url()});    
                }
            });

            try {
                let time = Number.isInteger(parseInt(option.timeout)) ? parseInt(option.timeout) * 1000 : 40000;
                const response = await page.goto(url, { waitUntil: 'networkidle', timeout: time });
                if (response.status() == 401) {
                    object.error = 'There was a user authentication error';
                    return object;
                }
            } catch(exception) {
                object.error = exception.message;
                return object;
            }
            await helper.scrollHeight(page);
             // validate
             const options = {
                url: url_basic_auth,
                isLocal: true
            };

            try {
                let validate_result = await validateWww(options);
                validate_result = JSON.parse(validate_result);
                object.validate = validate_result.messages;
            } catch(exception_err) {
                object.validate = [];
            }

            try {
                const bodyHTML = await page.evaluate(() => document.body.outerHTML);
                // GET META
                const istExists = await page.$('title').then(res =>!! res);
                if (!istExists) {
                    object.meta.push({title: '<span><span class="badge badge-danger">error </span> titleタグが無い<br>No HTML tag</span>'});
                } else {
                    const title = await page.title();
                    if (title != "") {
                        object.meta.push({title: `<span class="badge badge-success">Successfully</span> Titlte: ${title}`});
                    } else {
                        object.meta.push({title: '<span><span class="badge badge-danger">error </span> titleの中身がない<br>No content</span>' });
                    }
                }

                let description = await page.$("meta[name='description']");
                if (description) {
                    description = await (await description.getProperty("content")).jsonValue();
                    if (description != "") {
                        object.meta.push({description: `<span class="badge badge-success">Successfully</span> Description: ${description}`});
                    } else {
                        object.meta.push({description: '<span><span class="badge badge-danger">error </span> descriptionの中身がない<br>No content</span>'});
                    }
                } else {
                    object.meta.push({description: '<span><span class="badge badge-danger">error </span> descriptionのタグがない<br>No HTML tag</span>'})
                }

                let keywords = await page.$("meta[name='keywords']");
                if (keywords) {
                    keywords = await (await keywords.getProperty("content")).jsonValue();
                    if (keywords != "") {
                        object.meta.push({keywords: `<span class="badge badge-success">Successfully</span> Keywords: ${keywords}`});
                    } else {
                        object.meta.push({keywords: '<span><span class="badge badge-danger">error </span> keywordsの中身がない<br>No content</span>'});
                    }
                } else {
                    object.meta.push({keywords: '<span><span class="badge badge-danger">error </span> keywordsのタグがない<br>No HTML tag</span>'});
                }

                // GET HREF
                const html = await page.content();
                const count1 = (html.match(/href=\"\"/g) || []).length;
                const count2 = (html.match(/href="#"/g) || []).length;

                if (count1) {
                    object.href1.push({href1: `<div><span class="badge badge-danger">error</span> href="" or href='' が ${count1} 箇所あります</div>`});
                } else {
                    object.href1.push({href1: '<span class="badge badge-success">Successfully</span>'});
                }

                if (count2) {
                    object.href2.push({href2: `<div><span class="badge badge-danger">error</span> href="#" or href='#' が ${count2} 箇所あります</div>`});
                } else {
                    object.href2.push({href2: '<span class="badge badge-success">Successfully</span>'});
                }
                object.php.push('<div><span class="badge badge-danger">error</span> PHPエラー「Fatal error（致命的なエラー）」 が  箇所あります</div>' );
                //"<b>Fatal error:</b>"
                const count11 = (html.match(/<b>Fatal error<\/b>:/g) || []).length;
                if (count11) {
                    object.php.push(`<div><span class="badge badge-danger">error</span> PHPエラー「Fatal error（致命的なエラー）」 が ${count11} 箇所あります</div>`)
                }

                //"<b>Parse error:</b>"
                const count22 = (html.match(/<b>Parse error<\/b>:/g) || []).length;
                if (count22) {
                    object.php.push(`<div><span class="badge badge-danger">error</span> PHPエラー「Parse error（構文エラー）」 が ${count22} 箇所あります</div>`);
                }

                //"<b>Warning:</b>"
                const count33 = (html.match(/<b>Warning<\/b>:/g) || []).length;
                if (count33) {
                    object.php.push(`<div><span class="badge badge-danger">error</span> PHPエラー「Warning（警告）」 が ${count33} 箇所あります</div>`);
                }

                //"<b>Notice:</b>"
                const count44 = (html.match(/<b>Notice<\/b>:/g) || []).length;
                if (count44) {
                    object.php.push(`<div><span class="badge badge-danger">error</span> PHPエラー「Notice（注意）」 が ${count44} 箇所あります</div>`);
                }

                object.php.shift();
                
                // get copyright
                // get class copyright
                let valid_flag = false;
                let isset_copy_right = "";
                isset_copy_right = await page.evaluate(() => {
                    let data = [];
                    let elements = document.getElementsByClassName('copyright');
                    for (var element of elements)
                        data.push(element.textContent);
                    return data;
                });

                if (isset_copy_right.length > 0) {
                    let data_copy_right = isset_copy_right[0];
                    if (data_copy_right.match(/©\s+2020\s+.*/gmi)) {
                        valid_flag = true;
                    }
                }

                // get tag footer
                if (!valid_flag) {
                    const isExistsFooter = await page.$('footer').then(res =>!! res);
                    let footer = "";
                    if (isExistsFooter) {
                        footer = await page.evaluate(() => {
                            return document.querySelector('footer').innerText;
                        });
                    }
                    
                    if (footer) {
                        if (footer.match(/©\s+2020\s+.*/gmi)) {
                            valid_flag = true;
                        }
                    }
                }

                // send response to popup
                if (!valid_flag) {
                    object.no1.copyright= `<span><span class="badge badge-danger">error</span> Company ${that.select_company} is invalid</span>`;
                } else {
                    object.no1.copyright= `<span><span class="badge badge-success">Successfully</span> Company ${that.select_company} valid</span>`;
                }

                //Company name in HTML:
                let htmlFull = await page.evaluate('new XMLSerializer().serializeToString(document.doctype) + document.documentElement.outerHTML');
                let data_json_copy = that.list_company;
                let array_company_html = [];

                let fail_company = false;
                data_json_copy.forEach((el, index) => {
                    if (el.official_company_name != that.select_company) {
                        let regex = new RegExp(el.official_company_name, 'g');
                        if (htmlFull.match(regex)) {
                            fail_company = true;
                            array_company_html.push(`<span class="badge badge-danger">error </span> ${el.official_company_name}`);
                        }
                    }
                });

                if (!fail_company) {
                    array_company_html.push(`<span class="badge badge-success">Successfully</span>`);
                }
                
                let mainHTML = await page.evaluate(() => {
                    return document.querySelector('main').outerHTML || '';
                });
                
                // Show advanced
                // check link die
                if (option.link_die == 'on') {
                    let listA = await page.evaluate(() => Array.from( document.querySelectorAll('a'), a => a.getAttribute('href')));
                    listA = listA.filter(function(element) {
                        return element && element.search(/^#[^\s]*/) == -1;
                    });
                    listA.forEach(url1 => {
                        if (url1.match(/http:\/\/|https:\/\//gm)) {
                            axios.get(url1, {
                                auth: {
                                    username: that.username,
                                    password: that.password
                                }
                            }).then(data => {
                            }).catch(error => {
                                object.no1.link_die.push({url: url1, messages: `<span class="badge badge-danger">error </span>${error.message}`});
                            })
                        }
                    });
                    if (object.no1.link_die.length == 0) {
                        object.no1.link_die.push({url: '', messages: `<span class="badge badge-success">Successfully</span>`});
                    }
                }
                
                // Ẩn reCAPTCHA
                if (url.match(/[http|https].*?\/contact/gm) && option.hidden_recaptcha == 'on') {
                    const istExistsVisibility = await page.$('.grecaptcha-badge').then(res =>!! res);
                    if (istExistsVisibility) {
                        const visibilityHidden = await page.$eval('.grecaptcha-badge', (elem) => {
                            return window.getComputedStyle(elem).getPropertyValue('visibility')
                        });

                        if (visibilityHidden != 'hidden') {
                            object.no1.hidden_recaptcha = `<span class="badge badge-danger">error </span> Is not an attribute visibility:hidden`;
                        }
                        if (object.no1.hidden_recaptcha == '') {
                            object.no1.hidden_recaptcha = `<span class="badge badge-success">Successfully</span>`;
                        }
                    } else {
                        object.no1.hidden_recaptcha = `<span class="badge badge-danger">error </span> Can't found class grecaptcha-badge -> visibility:hidden`;
                    }
                }

                object.no1.company_in_html = array_company_html;

                // favicon có chưa?
                object.no1.favicon_yet = '';
                if (option.favicon_yet == 'on') {
                    const favicon = await page.evaluate(() => {
                        const elementLink = document.querySelectorAll("head link");
                        return [...elementLink].map(element => {
                            return element.getAttribute('href');
                        });
                    });

                    let count_favicon = false;
                    for (const icon of favicon) {
                        if (icon.search('favicon.ico') !== -1) {
                            count_favicon = true;
                            break;
                        }
                    }
                    if (!count_favicon) {
                        object.no1.favicon_yet = `<span class="badge badge-danger">error </span> Favicon not found`;
                    } else {
                        object.no1.favicon_yet = `<span class="badge badge-success">Successfully</span>`;
                    }
                }
                
                // apple-touch-icon.png có chưa?
                object.no1.apple_touch_icon = '';
                if (option.apple_touch_icon == 'on') {
                    const apple = await page.evaluate(() => {
                        const elementLink = document.querySelectorAll("head link");
                        return [...elementLink].map(element => {
                            return element.getAttribute('href');
                        });
                    });

                    let count_apple_touch_icon = false;
                    for (const icon of apple) {
                        if (icon.search('apple-touch-icon.png') !== -1) {
                            count_apple_touch_icon = true;
                            break;
                        }
                    }
                    if (!count_apple_touch_icon) {
                        object.no1.apple_touch_icon = '<span class="badge badge-danger">error </span> Apple touch icon not found';
                    } else {
                        object.no1.apple_touch_icon = `<span class="badge badge-success">Successfully</span>`;
                    }
                }

                // Kích thước của hình ảnh có như thiết kế không?
                if (option.design_same_image == 'on') {
                    let images = await page.$$eval('img', imgs => imgs.map(img => {
                        if (!img.getAttribute('src').match(/.svg/m)) {
                            if (([0, -1, 1].indexOf(img.naturalWidth - img.width) == -1)
                                || ([0, -1, 1].indexOf(img.naturalHeight - img.height) == -1)) {
                                return {
                                    message: `<span class="badge badge-danger">error </span>`,
                                    src: img.getAttribute('src'),
                                    width: img.width,
                                    height: img.height,
                                    naturalWidth: img.naturalWidth,
                                    naturalHeight: img.naturalHeight,
                                }
                            }
                        }}));

                    object.no1.design_same_image.push(...helper.filterAndRemove(images))
                    if (object.no1.design_same_image.length == 0) {
                        object.no1.design_same_image.push({
                            message: `<span class="badge badge-success">Successfully </span>`,
                            src: '',
                            width: '',
                            height: '',
                            naturalWidth: '',
                            naturalHeight: '',
                        })
                    }
                }                

                //Đầu tiên là text h1
                if (option.first_h1 == 'on') {
                    const istExistsHeader = await page.$('header').then(res =>!! res);
                    if (istExistsHeader) {
                        const firstH1 = await page.$eval('header', (element) => {
                            return element.outerHTML
                        });
                        const findH1 = firstH1.match(/<h[1-6].*?h[1-6]>/gm);
                        if (findH1 == null || (findH1.length > 0 && findH1[0].search('<h1') == -1))
                            object.no1.first_h1 = `<span class="badge badge-danger">error </span>The first is not the text h1`;
                    } else {
                        object.no1.first_h1 = `<span class="badge badge-danger">error </span>Not found tag header -> The first is not the text h1`;
                    }

                    if (object.no1.first_h1 == '') {
                        object.no1.first_h1 = `<span class="badge badge-success">Successfully </span>`;
                    }
                }
              
                object.no1.faq_cursor = '';
                //"page FAQ, Khi không có design according, cứ để mặc định cursor(không cần thêm cursor pointer)."
                if (url.match(/[http|https].*?\/faq/gm) && option.faq_cursor == 'on' && object.url.match(/\/works/gm)) {
                    object.no1.show_faq_cursor = true;
                    const FAQ_ITEM = await page.evaluate(() => {
                        const elements = document.querySelectorAll('.c-faq_item');
                        return [...elements].map(element => {
                            element.focus();
                            return window.getComputedStyle(element).getPropertyValue("cursor");
                        });
                    });
                    const FAQ_HEADING = await page.evaluate(() => {
                        const elements = document.querySelectorAll('.c-faq_heading');
                        return [...elements].map(element => {
                            element.focus();
                            return window.getComputedStyle(element).getPropertyValue("cursor");
                        });
                    });

                    if (FAQ_ITEM != '' && FAQ_ITEM.toString().search('pointer') !== -1 || FAQ_HEADING != '' && FAQ_HEADING.toString().search('pointer') !== -1) {
                        object.no1.faq_cursor = 'Please do not add cursor:pointer';
                    }
                }
                // news detail có h1-h5 không?
                // get class new-detail_content;
                if (option.detail_h1_h5 == 'on' && url.match(/\/news\/[0-9].*?\/$/gm)) {
                    let isExistsDetailContent = await page.$('.wp-content').then(res =>!! res);
                    if (isExistsDetailContent) {
                        let content = "";
                        content = await page.evaluate(() => {
                            return document.querySelector('.wp-content').outerHTML;
                        });
                        
                        let regextagH = /<h[1-5]>.*?<\/h[1-5]>/g;
                        let findHresult = content.match(regextagH) || [];
                        let formatTagH = ['<h1>','<h2>', '<h3>', '<h4>', '<h5>'];
        
                        formatTagH.forEach((element, i) => {
                            for (let index = 0; index < findHresult.length; index++) {
                                if (i == index && findHresult[index].search(formatTagH[i]) == -1) {
                                    object.no1.detail_h1_h5.push({
                                        item: `<span class="badge badge-danger">error </span>`,
                                        messages: findHresult[index]
                                    });
                                    break;
                                }
                            }
                        });
                    } else {
                        object.no1.detail_h1_h5.push({
                            item: `<span class="badge badge-danger">error </span>`,
                            messages: 'Class not found wp-content'
                        });
                    }

                    if (object.no1.detail_h1_h5.length == 0) {
                        object.no1.detail_h1_h5.push({
                            item: `<span class="badge badge-success">Successfully </span>`,
                            messages: ''
                        });
                    }
                }

                // check page contact recaptcha "page conatct, có 2 button này chưa? 「リセット」「送信する」.có reCAPTCHA chưa?"
                if (option.re_captchar == 'on' && url.match(/[http|https].*?\/contact/gm)) {
                    const textBody = bodyHTML.toString().replace(/[\n\r\s]/g,'');
                    if (textBody.search('リセット') == -1 && textBody.search('送信する') == -1)
                        object.no1.re_captchar.push(`<span class="badge badge-danger">error </span>Not found button 「リセット」「送信する」.`);

                    if (textBody.replace(/\?/g, '').search(defined.reCAPTCHA1.replace(/\?/g, '')) == -1
                    || textBody.replace(/\?/g, '').search(defined.reCAPTCHA2.replace(/\?/g, ''))== -1)
                    object.no1.re_captchar.push(`<span class="badge badge-danger">error </span>Has error recaptcha! Pleae check again...`);
                    if (object.no1.re_captchar.length == 0) {
                        object.no1.re_captchar.push(`<span class="badge badge-success">Successfully</span>`);
                    }
                }

                let phone_in_policy = '';
                if (url.match(/[http|https].*?\/contact/gm)) {
                    // "Ở trang contact trong mục này [個人情報保護方針内] nếu có số điện thoại cũng thêm class=""tel link"" để kích hoạt số điện thoại"
                    let isExistsContactForm = await page.$('.contact_form').then(res =>!! res);
                    if (isExistsContactForm) {
                        let outerHTML = await page.evaluate(() => {
                            return document.querySelector('.contact_form').outerHTML;
                        });

                        // kiểm tra số điện thoại trong contact 個人情報保護方針内
                        let splitHtml = outerHTML.toString().split(/<\/dl>/g);
                        splitHtml.forEach(el => {
                            if (el.search('個人情報保護方針') != -1) {
                                const splitString = el.replace(/[\n\r\s]/g,'');
                                const textLower = splitString.toLowerCase();
                    
                                if (textLower.search('tel') !== -1 && textLower.search('tel link') == -1) {
                                    object.no1.tel_link.push(`Currently there aren't class tel link in 個人情報保護方針内`);
                                    phone_in_policy = el.replace(/\s/g, '');
                                }
                            }
                        });
                    }
                }

                // kiểm tra toàn bộ số điện thoại
                let regexPhone = /.*?\n.*?\n(((?!fax)).)*0\d{1,2}[-|\s|.]\d{3,4}[-|\s|.]\d{4}.*?[>]$/gm;
                let regexResult = bodyHTML.match(regexPhone) || [];
                regexResult.forEach(el => {
                    if (phone_in_policy.length > 0 && phone_in_policy.search(el.replace(/\s/g, '')) !== -1) {
                        return;
                    } else {
                        // không có class tel_link và fax
                        if (el.toLowerCase().search('tel_link') == -1 && el.toLowerCase().search('fax') == -1) {
                            object.no1.tel_link.push(el);
                        }
                    }
                });

                // tel_link_not_exits_fax
                // Kiểm tra tel_link không tồn tại trong fax
                // Check fax in container
                // check company
                if (url.match(/[http|https].*?\/company/gm)) {
                    let regexFaxCompany = mainHTML.match(/[0-9].*?\n.*?0\d{1,2}[-|\s|.]\d{3,4}[-|\s|.]\d{4}.*?[>]/gm);
                    if (regexFaxCompany) {
                        regexFaxCompany.forEach(element => {
                            if (element.toLowerCase().search('tel_link') != -1 && element.toLowerCase().search('fax') != -1) {
                                object.no1.tel_link_not_exits_fax.push(element);
                            }
                        });
                    } else {
                        let regexFaxCompany1 = mainHTML.match(/.*?\n.*?\n.*?\n*0\d{1,2}[-|\s|.]\d{3,4}[-|\s|.]\d{4}.*?[>]$/gm);
                        if (regexFaxCompany1) {
                            regexFaxCompany1.forEach(element => {
                                if (element.toLowerCase().search('tel_link') != -1 && element.toLowerCase().search('fax') != -1) {
                                    object.no1.tel_link_not_exits_fax.push(element);
                                }
                            });
                        }
                    }
                }
                // check contact
                if (url.match(/[http|https].*?\/contact/gm)) {
                    // kiểm tra fax và tel gần nhau
                    let regexFaxContact = mainHTML.match(/[0-9]*0\d{1,2}[-|\s|.]\d{3,4}[-|\s|.]\d{4}.*?[>]$/gm);
                    if (regexFaxContact) {
                        regexFaxContact.forEach(element => {
                            // nếu tồn tail tel_link trong fax là sẽ bị lỗi
                            if (element.toLowerCase().search('tel_link') != -1 && element.toLowerCase().search('fax') != -1) {
                                object.no1.tel_link_not_exits_fax.push(element);
                            }
                        });
                    } else {
                        let regexFaxContact1 = mainHTML.match(/.*?\n.*?\n.*?\n*0\d{1,2}[-|\s|.]\d{3,4}[-|\s|.]\d{4}.*?[>]$/gm);
                        if (regexFaxContact1) {
                            regexFaxContact1.forEach(element => {
                                if (element.toLowerCase().search('tel_link') != -1 && element.toLowerCase().search('fax') != -1) {
                                    object.no1.tel_link_not_exits_fax.push(element);
                                }
                            });
                        }
                    }
                }

                // check fax footer
                let footerFax = await page.evaluate(() => {
                    return document.querySelector('footer').outerHTML || '';
                });

                let regexFaxFooter = footerFax.match(/[0-9|\/].*?\n.*?\n*0\d{1,2}[-|\s|.]\d{3,4}[-|\s|.]\d{4}.*?[>]$/gm) || [];
                regexFaxFooter.forEach(element => {
                    if (element.toLowerCase().search('tel_link') != -1 && element.toLowerCase().search('fax') != -1) {
                        object.no1.tel_link_not_exits_fax.push(`<span class="badge badge-success">Successfully</span>`);
                    }
                });
                
                object.no1.mv_background = `<span class="badge badge-danger">error</span>Mainvisual can't found background`;
                if (option.mv_background == 'on') {
                    // check class mainvisual
                    const matchResult = [];
                    const regexMv = /class="(.*?(mv|mainvisual).*?)">/gm;
                    let matches = matchAll(mainHTML, regexMv).toArray();
                    if (matches.length > 0)  {
                        matches.forEach(el => {
                            matchResult.push(...el.split(/\s/));
                        });
                        
                        let flag_mv = false;
                        for (const match of matchResult) {
                            let mv_background = await page.evaluate((match) => {
                                const elements = document.querySelectorAll(`.${match}`);
                                return [...elements].map(element => {
                                    return window.getComputedStyle(element).getPropertyValue("background");
                                });
                            }, match);

                            if (mv_background != '' && mv_background.toString().search('url') !== -1) {
                                flag_mv = true;
                                object.no1.mv_background = '<span class="badge badge-success">Successfully</span>';
                                break;
                            }
                        }
                        if (!flag_mv) {
                            object.no1.mv_background = '<span class="badge badge-danger">error</span> Background URL is not working.';
                        }
                    }
                }

                object.no1.google_map_address = 'Google map address not found';
                if (option.google_map_address == 'on' && url.match(/\/company/gm)) {
                    let isExistsIframe = await page.$('iframe').then(res =>!! res);
                    if (isExistsIframe) {
                        const elementHandle = await page.$('iframe');
                        const frame = await elementHandle.contentFrame();
                        const frameContent = await frame.content();
                        let regexClass = /class=["|' ].*?address.*?["|' ]>/gm;
                        let classMatch = bodyHTML.match(regexClass);

                        if (classMatch) {
                            classMatch = classMatch[0];
                            let splitClass  = classMatch.split(/ /g);
        
                            var classResult = '';
                            for (const el of splitClass) {
                                if (el.search('address') != -1) {
                                    let regexAddressNew = /["|' ].*?address/gm;
                                    classResult = el.match(regexAddressNew);
                                    if (classResult.length > 0) {
                                        classResult = classResult.toString().replace('"', '');
                                        classResult = classResult.replace("'", '');
                                        break;
                                    }
                                }
                            }

                            if (classResult) {
                                let address = await page.evaluate((classResult) => {
                                    return document.querySelector(`.${classResult}`).textContent;
                                }, classResult);

                                address = address.substring(0, 17).replace(/\s/g, '');
                                let addressInner = frameContent.match(/class="place-name" jsan="7.place-name">(.*?)\/div>/gm);
                                if (addressInner) {
                                    for (const el of addressInner) {
                                        if (el.replace(/\s/g, '').search(address) != -1) {
                                            object.no1.google_map_address = "";
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                await browser.close();
            } catch(ex) {
                await browser.close();
                logger.error(ex.message);
            }

            return object;
        });

        return Promise.all(promise);
    }
}