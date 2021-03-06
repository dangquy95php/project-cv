const express     = require('express');
const app         = express();
const ejs         = require('ejs');
const path        = require('path');
const bodyParser  = require('body-parser');
const dotenv      = require('dotenv')
const fileUpload  = require('express-fileupload');
const helper      = require('./config/helper');

const mongoose    = require('mongoose');
const session     = require('express-session')
const MongoStore  = require('connect-mongo')(session);
const db          = mongoose.connection;
const flash       = require('connect-flash');

dotenv.config();
global.express     = express;
global.path        = path;
global.helper      = helper;
global.mongoose    = mongoose;

app.use(bodyParser.urlencoded({limit: '10mb', extended: true }));
app.use(bodyParser.json({ limit: '10mb', extended: true }));
app.use(fileUpload({
	createParentPath: true
}));

app.use(session({
    secret: process.env.KEY_SESSION_AUTHENTICATION,
    resave: true,
    saveUninitialized: false,
    store: new MongoStore({
        mongooseConnection: db
    })
}));
  
app.use(function (req, res, next) {
    res.header("Access-Control-Allow-Origin", "*")
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept")
    next()
})

app.use('/', express.static(__dirname + '/public/'));
app.set('views', path.join(__dirname, '/views'));
app.set('view engine', 'ejs');
app.set('port', process.env.PORT || 3000);
app.use(flash());

// include router
const router = require('./routes/router');
app.use((req, res, next) => {
    res.locals.user = req.session.user;
    res.locals.success = req.flash('success');
    res.locals.errors = req.flash('errors');
    res.locals.validate = req.flash('validate');
    
    return next();
});

app.use('/', router);
app.get('*', function(req, res){
    return res.render('404');
});
mongoose.connect(process.env.MONGODB_URI, {
    useFindAndModify: false,
    useCreateIndex: true,
    useNewUrlParser: true,
    useUnifiedTopology: true
}).then(()=> {
    console.log('Database connected');
}).catch((error)=> {
    console.log('Error connecting to database');
});

app.listen(process.env.PORT, () => {
    console.log(`Server running on port ${process.env.DOMAIN}`);
});