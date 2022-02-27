const PixelDiff = require('../../Models/PixelDiff');

module.exports = {

    index: async function(request, response) {
        const page = parseInt(request.query.page) || 1;
        const perPage = parseInt(request.query.per_page) || 10;
        const searchQuery = request.query.text_seach || '';
        regex = new RegExp(helper.escapeRegex(searchQuery), 'gi');
        const numOfPixelDiff = await PixelDiff.find({}).countDocuments({});

        return PixelDiff.find({url: regex}).sort({ url: 'desc' }).skip((perPage * page) - perPage).limit(perPage).populate('user_id').exec((err, data) => {
            return response.render('admin/pixel-diff', {
                search_query: searchQuery,
                histories: data,
                per_page: perPage,
                current: page,
                pages: Math.ceil(numOfPixelDiff / perPage),
                flash: request.flash()});
        });
    },

    deletePixelDiff: function(request, response) {
        let id = request.params.id;
        return PixelDiff.deleteOne({_id: id}).exec((err, result) => {
            if (err) {
                request.flash('errors', `Delete pixel diff ${id} failed.`);
            } else {
                request.flash('success', `Deleted pixel diff ${id} successfully.`)
            }
            
            return response.redirect('/admin/pixel-diff');
        });
    }
}