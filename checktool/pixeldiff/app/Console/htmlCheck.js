const playwright = require('playwright');
const invalid = [];
const notfound = [];

(async () => {
    for (const browserType of ['chromium']) {//, 'firefox', 'webkit'
        const browser = await playwright[browserType].launch({
            ignoreHTTPSErrors: true,
            headless: false,
        });

        const context =  await browser.newContext();
        const page = await context.newPage();

        page.on("pageerror", error => {
            invalid.push(error);
        });

        page.on("response", response => {
            if (300 > response.status() && 200 <= response.status()) return;
            if (302 == response.status()) return;
            if (304 == response.status()) return;
            notfound.push(response.status() + ' '+ response.url());
        });

        let response = await page.goto('http://test36.com/checktest/', { waitUntil: 'networkidle', timeout: 40000 });

        console.log(invalid, notfound);
    }
})();