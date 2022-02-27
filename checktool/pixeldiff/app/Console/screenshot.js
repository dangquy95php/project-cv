const playwright = require('playwright');
const path = require('path');

(async () => {
    for (const browserType of ['chromium']) {
        const browser = await playwright[browserType].launch({
            ignoreHTTPSErrors: true,
            headless: false});
        const context = await browser.newContext();

        const page = await context.newPage();
        
        const auth = Buffer.from(`test:test_open0364`).toString('base64');
        await page.setExtraHTTPHeaders({
            'Authorization': `Basic ${auth}`                    
        });

        await page.setViewportSize({ width: 1200, height: 720 });
        await page.goto('http://open0364.test20008.work/wp-login.php', { waitUntil: 'networkidle' });

        await page.type('#user_login', 'p0506_admin');
        await page.type('#user_pass', 'admin');

        await Promise.all([
            page.click('#wp-submit'),
            page.waitForNavigation({ waitUntil: 'networkidle' }),
        ]);

        await Promise.all([
            page.click('#menu-pages'),
            page.waitForNavigation({ waitUntil: 'networkidle' }),
        ]);

        const tagTr = await page.evaluate(() => {
            const trs = Array.from(document.querySelectorAll('#the-list tr'))
            return trs.map(tr => tr.outerHTML)
        });

        // 7. Trong các page tĩnh có nội dung html chưa?
        let content = [];
        let template_url = [];

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

                content.push({
                    title: title,
                    message: contentDetail  ? '<span class="badge badge-success">Successfully </span>' : '<span class="badge badge-danger mr-2">error </span>'
                });

                let img_and_a = contentDetail.match(/<img.*src=".*?">|<a.*?href=".*?"\/>/gm) || [];
                img_and_a.forEach(element => {
                    if (/<img.*src="\[template_url]\/|<img.*src="\[url]\//gm.exec(element)) {
                        template_url.push({
                            item: element,
                            message: '<span class="badge badge-success">Successfully </span>'
                        });
                    } else {
                        template_url.push({
                            item: element,
                            message: '<span class="badge badge-danger mr-2">error </span>'
                        });
                    }
                });

                await page.goBack();
            }
        }

        // 10. tên công ty trong phần message của contactform và link có khớp với nhau chưa?
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
        let fromCompany = {};
        let textFrom = regexFrom.exec(from);
        if (textFrom[1]) {
            let mailBody = await page.$eval('#wpcf7-mail-2-body', item => {
                return item.textContent;
            });
    
            if (mailBody.search(textFrom[1].trim()) == -1) {
                fromCompany.message = `<span class="badge badge-danger mr-2">error </span>Can"t get seach ${textFrom[1].trim()} in content`;
                fromCompany.item = from;
            } else {
                fromCompany.message = `<span class="badge badge-success">Successfully </span>${textFrom[1].trim()}`;
                fromCompany.item = from;
            }
        } else {
            fromCompany.message = `<span class="badge badge-danger mr-2">error</span>Can't get from mail`;
            fromCompany.item = from;
        }
        
        // message của contactform là tiếng Nhật chưa?
        // Thỉnh thoảng vẫn để tiếng Anh nên hãy chú ý."
        await page.click('#messages-panel-tab');
        const messageJapan = await page.evaluate(() => {
            const list = Array.from(document.querySelectorAll('#messages-panel .description input'));
            return list.map(data => data.value);
        });

        let message_jp_and_en = [];
        messageJapan.forEach(element => {
            if (!element.match(/[ぁ-んァ-ン一-龥]/g)) {
                message_jp_and_en.push({
                    item: element,
                    message: '<span class="badge badge-danger mr-2">error </span>'
                });
            } else {
                message_jp_and_en.push({
                    item: element,
                    message: '<span class="badge badge-success">Successfully </span>'
                });
            }
        });

        // 12.Tích hợp contactform có "reCAPTCHA" không?
        await Promise.all([
            page.click(`#toplevel_page_wpcf7 ul li:nth-child(4)`),
            page.waitForNavigation({ waitUntil: 'networkidle' }),
        ]);

        let recaptcha = await page.$eval('#recaptcha', item => {
            return item.textContent || 'not found recapchar';
        });
        
        let recapchaData = [];
        if (recaptcha.search(/reCAPTCHA/gm)) {
            recapchaData.push({
                message: '<span class="badge badge-success">Successfully </span> reCAPTCHA'
            });
        } else {
            recapchaData.push({
                message: '<span class="badge badge-danger mr-2">error </span>'
            });
        }
        
        // 9. Không hiển thị các tag chưa đc phân loại trong nội dung bài viết.
        await Promise.all([
            page.click(`#menu-posts`),
            page.waitForNavigation({ waitUntil: 'networkidle' }),
        ]);
        
        await Promise.all([
            page.click(`#menu-posts ul li:nth-child(4)`),
            page.waitForNavigation({ waitUntil: 'networkidle' }),
        ]);

        let categories_uncategorized = [];
        const tagTrCategories = await page.evaluate(() => {
            const trs = Array.from(document.querySelectorAll('#the-list tr'))
            return trs.map(tr => tr.textContent)
        });
        
        tagTrCategories.forEach(element => {
            if (element.toLowerCase().search('uncategorized')) {
                categories_uncategorized.push({
                    item: element,
                    message: '<span class="badge badge-danger mr-2">error </span>'
                })
            }
        });

        if (categories_uncategorized.length == 0) {
            categories_uncategorized.push({
                item: element,
                message: '<span class="badge badge-success">Successfully </span>'
            })
        }
    }
})();