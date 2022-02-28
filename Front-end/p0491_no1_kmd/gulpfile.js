// gulpパッケージの読み込み
const requireDir = require('require-dir');

// タスクの読み込み
requireDir('./gulp/task/', {recurse: true});
