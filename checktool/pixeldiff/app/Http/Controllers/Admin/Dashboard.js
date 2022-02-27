const User = require('../../Models/User');

module.exports = {

    index: async function(request, response) {
        const countUsers = await User.find({role: 'user'}).countDocuments({});
        
        return response.render('admin/index', {count_user: countUsers});
    },
}