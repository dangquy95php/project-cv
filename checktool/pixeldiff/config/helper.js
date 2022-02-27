const moment = require('moment');

module.exports = {
    uuid: function() {
        return moment().format('L').split('/').join('_') + '_' + Math.random().toString(36).substr(2, 5);
    },

    validURL: function(str) {
		var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
			'((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
			'((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
			'(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
			'(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
			'(\\#[-a-z\\d_]*)?$','i'); // fragment locator
		return !!pattern.test(str);
	},

	makeid: function(length) {
		var result           = '';
		var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		var charactersLength = characters.length;
		for ( var i = 0; i < length; i++ ) {
		   result += characters.charAt(Math.floor(Math.random() * charactersLength));
		}
		
		return result;
	},

	scrollTop: async function(page) {
        await page.evaluate(() => {
            setInterval(() => {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }, 100)
        });
	},
	
    scrollHeight: async function(page) {
        await page.evaluate(async () => {
            await new Promise((resolve, reject) => {
                var totalHeight = 0;
                var distance = 500;
                var timer = setInterval(async () => {
                    var scrollHeight = document.body.scrollHeight;
                    window.scrollBy(0, distance);
                    totalHeight += distance;
                    if(totalHeight >= scrollHeight){
                        clearInterval(timer);
                        resolve();
                    }
                }, 100);
            });
        });
    },

    // [0, 1, null, 2, "", 3, undefined, 3,,,,,, 4,, 4,, 5,, 6,,,,]
    // [0,1,2,"",3,3,4,4,5,6]

    filterAndRemove(array) {
        return array.filter(function(el) {
            return el != null;
        });
    },

    delay: async function(page, timer = 3000) {
        await page.evaluate(async(timer) => {
            await new Promise(function(resolve) { 
                setTimeout(resolve, timer)
            });
        }, timer);
    },

    escapeRegex: function(string) {
        return string.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
    }
}