const Playwright = require('../../Playwright');
const PixelDiff = require('../Models/PixelDiff');

module.exports = {
    index: function(req, res) {
        return res.render('index');
    },

    pixelDiff: function(req, res) {
        return res.render('pickdiff', { errors: {} });
    },

    postIndex: function(req, res) {
        const pixelDiff = new PixelDiff(req.body);
        let upload_choose = '';
        let upload_choose_ie = '';
        let url = req.body.url;
        let width = req.body.width;
        
        if(req.files && req.files.file) {
            let design = req.files.file;
            let id = helper.uuid();
            pixelDiff.design = id + design.name;
            design.mv(process.env.UPLOAD_IMAGE + id + design.name, function(err) {
                if (err) return res.status(500).json({ message: err});
                upload_choose = id + design.name;
                console.log('Uploaded file '+ upload_choose);
            });
        }

        if(req.files && req.files.file_ie) {
            let screenshot_ie = req.files.file_ie;
            let id = helper.uuid();
            pixelDiff.screenshot_ie = id + screenshot_ie.name;
            screenshot_ie.mv(process.env.UPLOAD_IMAGE + id + screenshot_ie.name, function(err) {
                if (err) return res.status(500).json({ message: err});
                upload_choose_ie = id + screenshot_ie.name;
                console.log('Uploaded IE file '+ upload_choose_ie);
            });
        }

        const playwright = new Playwright(req.session.user, width);
        playwright.basicAuth(req.body.username, req.body.password);
        var list_file = () => playwright.newSomeBrowserAndScreenshoot(url);

        list_file().then((data) => {
            pixelDiff.data = JSON.stringify(data);
            pixelDiff.user_id = req.session.user._id;
            pixelDiff.success = true;
            return pixelDiff.save(function (err, result) {
                if (err) return res.status(500).json({ message: err.message});
                
                return res.status(200).json({ message: 'Screenshot successfully', data: data, file: upload_choose, file_ie: upload_choose_ie});
            });
        }).catch((error) => {
            pixelDiff.data = JSON.stringify(error.message);
            pixelDiff.user_id = req.session.user._id;
            return pixelDiff.save(function (err, data) {
                if (err) return res.status(500).json({ message: err.message});
                
                return res.status(422).json({ message: error.message});
            });
        });
    },

    showScreenShot: function(req, res) {
        try {
            var content = decodeURIComponent(req.query.screen_shot);
            content = JSON.parse(content);
    
            let file = req.query.file;
            let file_ie = req.query.file_ie;
            if (file) {
                content.unshift({upload: {
                    image: file
                }});
            }

            if (file_ie) {
                content.push({upload_ie: {
                    image: file_ie
                }});
            }
        } catch(exception) {
            return res.redirect('/');
        }
        console.log(content);
        
        return res.render('screen-shot', { content: content });
    }
}
