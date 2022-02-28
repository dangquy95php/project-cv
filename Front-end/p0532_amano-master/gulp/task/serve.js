/**
 * ローカルサーバーを立ち上げます
 * ファイル更新を監視します
 */

const gulp = require("gulp");
const config = require("../config");
const setting = config.setting;
const $ = require("gulp-load-plugins")(config.loadPlugins);

gulp.task("serve", () => {
    $.browserSync({
        url: "localhost",
        port: 4000,
        proxy: setting.server.localUrl,
        ui: false,
    });

    // ファイル監視
    gulp.watch(setting.server.base + "/**/*.php", ["php"]);
    gulp.watch(setting.css.src + "**/*.scss", ["scss"]);
    gulp.watch(setting.js.src + "/**/*.js", ["script"]);
});

gulp.task("disconnect", () => {
    $.php.closeServer();
});