const mix = require('laravel-mix');
const glob = require("glob");
const HardSourceWebpackPlugin = require('hard-source-webpack-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

/*
css
各style.scssで配下層のscssをimportする運用
*/
//FRONT
//※front側のcssはpublic/assets格納でGit管理しています。//

//ADMIN
//※admin系のページは汎用を読み込まない運用
mix.sass('resources/sass/admin/style.scss', 'public/css/admin').version();


/*
js
各app.jsファイル内で配下層のjsをimportする運用
*/
// //FRONT
// mix.babel(['resources/js/front/app.js'], 'public/js/front/app.js').version();
// //ADMIN
// // ※admin系のページは汎用を読み込まない運用
// mix.babel(['resources/js/admin/app.js'], 'public/js/admin/app.js').version();
// mix.babel(['resources/js/admin/bootstrap.js'], 'public/js/admin/bootstrap.js').version();

//FRONT
mix.js('resources/js/front/app.js', 'public/js/front/app.js').version();
//ADMIN
// ※admin系のページは汎用を読み込まない運用
mix.js('resources/js/admin/app.js', 'public/js/admin/app.js').version();
mix.js('resources/js/admin/bootstrap.js', 'public/js/admin/bootstrap.js').version();
mix.js('resources/js/admin/template.js', 'public/js/admin/template.js').version();

mix
    .options({
        processCssUrls: false,
        polyfills: [
            'Promise'
        ]
    })

    .webpackConfig({
        plugins: [
            new HardSourceWebpackPlugin()
        ],
        module: {
            rules: [
                { // scssでワイルドカードでのimportを可能にする。
                    test: /\.scss$/,
                    loader: 'import-glob-loader'
                },
                { // jsでワイルドカードでのimportを可能にする。//require()では使えないので注意。import()のみ。
                    test: /\.js$/,
                    loader: 'import-glob-loader'
                },
                {
                    test: /\.js$/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env']
                        }
                    }
                }
            ]
        }
    });
