const router   = express.Router();

function requiresLogout(req, res, next){
    if (req.session && req.session.user) {
        return res.redirect('/');
    } else {
        return next();
    }
}

function requiresLogin(req, res, next) {
    if (req.session && req.session.user) {
        return next();
    } else {
        return res.redirect('/login');
    }
}

const isAdmin = function(req, res, next){
    if (req.session && req.session.user && req.session.user.role === 'admin') {
        return next();
    } else {
        return res.redirect('/login');
    }
}

// Request
const validateCheckHtml = require('../app/Http/Requests/HtmlCheckRequest');
const validateUser = require('../app/Http/Requests/UserRequest');

const Pickdiff =  require('../app/Http/Controllers/PickdiffController');
const HtmlCheck =  require('../app/Http/Controllers/HtmlCheckController');
const WordpressCheck =  require('../app/Http/Controllers/WordpressCheckController');
const UserController = require('../app/Http/Controllers/UserController');

// Required file admin

const DashboardController = require('../app/Http/Controllers/Admin/Dashboard');
const UserControler = require('../app/Http/Controllers/Admin/UserControler');
const PickdiffController = require('../app/Http/Controllers/Admin/PickdiffController');
const validateUserAdmin = require('../app/Http/Requests/Admin/UserRequest');

router.get('/', requiresLogin, Pickdiff.index);
router.get('/pixel-diff', requiresLogin, Pickdiff.pixelDiff);
router.get('/show-screntshot', requiresLogin, Pickdiff.showScreenShot);
router.post('/api/screenshot', requiresLogin, Pickdiff.postIndex);

// html check
router.get('/html-check', requiresLogin, HtmlCheck.index);
router.get('/show-html-check', requiresLogin, HtmlCheck.showHtmlCheck);
router.get('/show-check-wordpress-admin', requiresLogin, WordpressCheck.showCheckWordpressAdmin);
router.post('/api/check-tool-html', requiresLogin, HtmlCheck.checkToolHtml);
router.post('/api/check-tool-wordpress-admin', requiresLogin, WordpressCheck.checkToolWordpressAdmin);
router.get('/api/validate-html', requiresLogin, validateCheckHtml.validateCheckHTML() , HtmlCheck.validateHtml);

// REGISTER USER
router.get('/user/register', requiresLogout, UserController.register);
router.get('/user/active-account', requiresLogout, validateUser.activeAccount(), UserController.activeAccount);
router.post('/user/register', requiresLogout, validateUser.userRegiser(), UserController.submitRegister);
router.get('/user/forgot-password', requiresLogout, UserController.forgotPassword);
router.post('/user/forgot-password', requiresLogout, validateUser.forgotPassword(), UserController.postForgotPassword);
router.get('/user/profile', requiresLogin, UserController.proflie);
router.post('/user/profile', requiresLogin, validateUser.updatedPassword(), UserController.postProflie);

router.get('/login', requiresLogout, UserController.login);
router.post('/login', requiresLogout, UserController.postLogin);
router.get('/api/logout', requiresLogin, UserController.logout);


// --------------- ROUTER ADMIN ----------------

require('express-router-group');
router.group("/admin/", isAdmin, (router) => {
    router.get('/', DashboardController.index);
    router.get('/pixel-diff', PickdiffController.index);
    router.get('/users', UserControler.index);
    router.get('/user/change-password/:id', UserControler.changePassword);
    router.post('/user/change-password/:id', validateUserAdmin.changePassword(), UserControler.postChangePassword);
    router.get('/user/delete/:id', UserControler.deleteUser);
    router.get('/pixel-diff/delete/:id', PickdiffController.deletePixelDiff);
});

module.exports = router;