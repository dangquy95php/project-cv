/**
 * gulp環境変数
 */

module.exports.setting = {
	html: {
		dest: "root/wp-content/themes/No1_theme01/"
	},
	css: {
		minify: false,
		map: false,
		src: "dev/scss/",
		dest: "root/wp-content/themes/No1_theme01/css/"
	},
	js: {
		webpack: false,
		minify: true,
		babel: true,
		src: "dev/js/",
		dest: "root/wp-content/themes/No1_theme01/js/"
	},
	imagemin: {
		path: "root/wp-content/themes/No1_theme01/img/",
		quality: "80-90"
	},
	server: {
		localUrl: "p0491.cd",
		base: "root",
		watch: "./root"
	}
};

/**
 * ロードモジュールの設定
 */
module.exports.loadPlugins = {
	pattern: [
		"gulp-*",
		"gulp.*",
		"browser-sync",
		"run-sequence",
		"imagemin-pngquant",
		"imagemin-jpegtran",
		"node-sass-package-importer"
	],
	rename: {
		"browser-sync": "browserSync",
		"run-sequence": "sequence",
		"imagemin-pngquant": "pngquant",
		"imagemin-jpegtran": "jpegtran",
		"gulp-connect-php": "php",
		"gulp-clean-css": "cleanCSS",
		"node-sass-package-importer": "sassImporter"
	}
};
