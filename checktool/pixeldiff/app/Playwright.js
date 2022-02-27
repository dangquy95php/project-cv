const playwright = require('playwright');
const code       = require('../config/code');
const fs         = require('fs');

module.exports = class Playwright {
    constructor(user, width = 1200, browserType = ['chromium', 'firefox', 'webkit']) {
        this.browsers = browserType;
        this.width = width;
        this.user = user;
    }

    basicAuth(username = '', password = '') {
        this.username = username;
        this.password = password;
    }

    // call asynchronous browser chrome, firefox, webkit
    async newSomeBrowserAndScreenshoot(url = '') {
        let that = this;
        var promise = this.browsers.map(async function(browserType) {
            const browser = await playwright[browserType].launch({
                ignoreHTTPSErrors: true,
                headless: false,
                args: [
                    '--no-sandbox',
                    '--disable-gpu',
                    '--disable-dev-shm-usage',
                    '--headless',
                    '--hide-scrollbars',
                    '--mute-audio'
            ]});

            const context =  await browser.newContext();
            const page = await context.newPage();
            
            if (that.username && that.password) {
                const auth = Buffer.from(`${that.username}:${that.password}`).toString('base64');
                await page.setExtraHTTPHeaders({
                    'Authorization': `Basic ${auth}`                    
                });
            }

            let override = Object.assign(page.viewportSize(), {width: parseInt(that.width)});
            if (browserType == 'webkit')
                override = Object.assign(page.viewportSize(), {width: parseInt(that.width) + 17});
            
            await page.setViewportSize(override);
            let response = await page.goto(url, { waitUntil: 'networkidle', timeout: 60000 });
            code.status(response.status());

            let dir = `${path.join(__dirname, '../public/images/screenshot/'+ that.user.email)}/`;
            if (!fs.existsSync(dir)){
                fs.mkdirSync(dir);
            }

            await helper.scrollHeight(page);
            await helper.scrollTop(page);
            await helper.delay(page, 2000);

            const file_name = `${helper.uuid()}_screenshot-${browserType}.png`;
            const file = `${dir}${file_name}`;
            await page.screenshot({ path: file, fullPage: true});
            await browser.close();

            console.log(that.user.email + ' Screenshot '+ browserType);

            return {
                [browserType]: {
                    image: file_name,
                }
            }
        });

        return Promise.all(promise);
    }
}