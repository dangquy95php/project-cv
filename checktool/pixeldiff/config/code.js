module.exports = {
    status: function(code) {
        if (code == '401')
            throw new Error('The username or password is incorrect');
        if (code == '403')
            throw new Error('You do not have access');
        if (code == '404')
            throw new Error('Page not found!');
        if (code == '500')
            throw new Error('Servers are not working as expected.');
    }
}