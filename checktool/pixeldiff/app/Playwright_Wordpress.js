const playwright = require('playwright');
const path = require('path');
const { exception } = require('console');

module.exports = class Playwright_Wordpress {

    constructor() {
        this.content = [];
        this.template_url = [];
        this.fromCompany = {};
        this.message_jp_and_en = [];
        this.recapchaData = [];
        this.categories_uncategorized = [];
    }

    async check(url = '', req, options = []) {
        const browser = await playwright['chromium'].launch({
            ignoreHTTPSErrors: true,
            headless: false
        });
        var object = new Object;
        const context = await browser.newContext();
        const page = await context.newPage();
        const auth = Buffer.from(`${req.body.username}:${req.body.password}`).toString('base64');
        await page.setExtraHTTPHeaders({
            'Authorization': `Basic ${auth}`                    
        });
        try {
            await page.setViewportSize({ width: 1200, height: 720 });
            await page.goto(url, { waitUntil: 'networkidle' });

            await page.type('#user_login', req.body.username1);
            await page.type('#user_pass', req.body.password1);

            await Promise.all([
                page.click('#wp-submit'),
                page.waitForNavigation({ waitUntil: 'networkidle' }),
            ]);

            const isLoginfailed = await page.$('#login_error'). then (res =>!! res);
            if (isLoginfailed) {
                throw new Error('Username wordpress and Password wordpress is incorrect.'); 
            }

            if (options.conten_static_pages == 'on' || options.template_url_and_url == 'on') {
                await Promise.all([
                    page.click('#menu-pages'),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);

                const tagTr = await page.evaluate(() => {
                    const trs = Array.from(document.querySelectorAll('#the-list tr'))
                    return trs.map(tr => tr.outerHTML)
                });

                // 7. Trong các page tĩnh có nội dung html chưa?
                for (const element of tagTr) {
                    let myRegex = /^<tr id="(.*?)"/gm;
                    let execId = myRegex.exec(element);
                    if (execId) {
                        await Promise.all([
                            page.click(`#${execId[1]} .row-title`),
                            page.waitForNavigation({ waitUntil: 'networkidle' }),
                        ]);
    
                        let contentDetail = await page.$eval('#content', item => {
                            return item.textContent;
                        });
    
                        let title = await page.$eval('#title', item => {
                            return item.value || 'not found title';
                        });
    
                        this.content.push({
                            title: title,
                            message: contentDetail  ? '<span class="badge badge-success">Successfully </span>' : '<span class="badge badge-danger mr-2">error </span>'
                        });

                        let img_and_a = contentDetail.match(/<img.*src=".*?">|<a.*?href=".*?">/gm) || [];

                        img_and_a.forEach(element => {
                            if (/<img.*src="\[template_url]\/|<a.*href="\[url]\//gm.exec(element)) {
                                this.template_url.push({
                                    item: element,
                                    message: '<span class="badge badge-success">Successfully </span>'
                                });
                            } else {
                                this.template_url.push({
                                    item: element,
                                    message: '<span class="badge badge-danger mr-2">error </span>'
                                });
                            }
                        });
    
                        await page.goBack();
                    }
                }
            }
           
            // 10. tên công ty trong phần message của contactform và link có khớp với nhau chưa?
            if (options.match_company_contactform == 'on') {
                await Promise.all([
                    page.click(`#toplevel_page_wpcf7`),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);
    
                await Promise.all([
                    page.click(`#the-list .row-title`),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);
    
                await page.click('#mail-panel-tab')
                let from = await page.$eval('#wpcf7-mail-2-sender', item => {
                    return item.value || 'not found from';
                });
    
                let regexFrom = /(.*?)</gm;
                let textFrom = regexFrom.exec(from);
                if (textFrom[1]) {
                    let mailBody = await page.$eval('#wpcf7-mail-2-body', item => {
                        return item.textContent;
                    });
            
                    if (mailBody.search(textFrom[1].trim()) == -1) {
                        this.fromCompany.message = `<span class="badge badge-danger mr-2">error </span>Can"t get seach ${textFrom[1].trim()} in content`;
                        fromCompany.item = from;
                    } else {
                        this.fromCompany.message = `<span class="badge badge-success">Successfully </span>${textFrom[1].trim()}`;
                        this.fromCompany.item = from;
                    }
                } else {
                    this.fromCompany.message = `<span class="badge badge-danger mr-2">error</span>Can't get from mail`;
                    this.fromCompany.item = from;
                }
            }
            
            // message của contactform là tiếng Nhật chưa?
            // Thỉnh thoảng vẫn để tiếng Anh nên hãy chú ý."
            if (options.contactform_msg_JP == 'on') {
                await Promise.all([
                    page.click(`#toplevel_page_wpcf7`),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);
    
                await Promise.all([
                    page.click(`#the-list .row-title`),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);

                await page.click('#messages-panel-tab');
                const messageJapan = await page.evaluate(() => {
                    const list = Array.from(document.querySelectorAll('#messages-panel .description input'));
                    return list.map(data => data.value);
                });
    
                messageJapan.forEach(element => {
                    if (!element.match(/[ぁ-んァ-ン一-龥]/g)) {
                        this.message_jp_and_en.push({
                            item: element,
                            message: '<span class="badge badge-danger mr-2">error </span>'
                        });
                    } else {
                        this.message_jp_and_en.push({
                            item: element,
                            message: '<span class="badge badge-success">Successfully </span>'
                        });
                    }
                });
            }
            
            // 12.Tích hợp contactform có "reCAPTCHA" không?
            if (options.contactform_recapchar == 'on') {
                await Promise.all([
                    page.click(`#toplevel_page_wpcf7`),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);
    
                await Promise.all([
                    page.click(`#the-list .row-title`),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);

                await Promise.all([
                    page.click(`#toplevel_page_wpcf7 ul li:nth-child(4)`),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);
    
                let recaptcha = await page.$eval('#recaptcha', item => {
                    return item.textContent || 'not found recapchar';
                });
                
                if (recaptcha.search(/reCAPTCHA/gm)) {
                    this.recapchaData.push({
                        message: '<span class="badge badge-success">Successfully </span> reCAPTCHA'
                    });
                } else {
                    this.recapchaData.push({
                        message: '<span class="badge badge-danger mr-2">error </span>'
                    });
                }
            }
            
            // 9. Không hiển thị các tag chưa đc phân loại trong nội dung bài viết.
            if (options.unclassified_not_displayed == 'on') {
                await Promise.all([
                    page.click(`#menu-posts`),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);
                
                await Promise.all([
                    page.click(`#menu-posts ul li:nth-child(4)`),
                    page.waitForNavigation({ waitUntil: 'networkidle' }),
                ]);
    
                const tagTrCategories = await page.evaluate(() => {
                    const trs = Array.from(document.querySelectorAll('#the-list tr'))
                    return trs.map(tr => tr.textContent)
                });
                
                tagTrCategories.forEach(element => {
                    if (element.toLowerCase().search('uncategorized') != -1) {
                        this.categories_uncategorized.push({
                            item: element,
                            message: '<span class="badge badge-danger mr-2">error </span>'
                        })
                    }
                });
    
                if (this.categories_uncategorized.length == 0) {
                    this.categories_uncategorized.push({
                        item: '',
                        message: '<span class="badge badge-success">Successfully </span>'
                    })
                }
            }
        } catch (error) {
            await browser.close();
            object.data = error.message;
            object.sucess = false;

            return object;
        }
        await browser.close();
        object.data = this;
        object.sucess = true;

        return object;
    }
}