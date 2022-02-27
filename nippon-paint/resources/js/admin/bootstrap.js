window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import moment from 'moment';
window.moment = moment;
require('tempusdominus-bootstrap-4');

import bsCustomFileInput from "bs-custom-file-input";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

$(function () {
    bsCustomFileInput.init();

    $('.datetimepicker').datetimepicker({
        icons: {
            time: 'far fa-clock'
        },
        locale: 'ja',
        dayViewHeaderFormat: 'YYYY年MM月',
        buttons: {
            showClose: true
        }
    });

    $('.delete').on('click', function () {
        // disabledがついてるときはクリックできないようにする
        if ($(this).hasClass('disabled')) {
            return false;
        }
        if (!confirm('削除します。よろしいですか？')) {
            return false;
        }
    });

    $('.edit').on('click', function () {
        // disabledがついてるときはクリックできないようにする
        if ($(this).hasClass('disabled')) {
            return false;
        }
    });

    /**
     * フォーム編集・削除ボタンに鍵をつける
     */
    $('.lock-button').on('click', function (event) {
        $(this).toggleClass('btn-dark btn-default');
        $(this).children().toggleClass('fa-unlock fa-lock');
        $(this).parent().find('.edit').toggleClass('disabled');
        $(this).parent().find('.delete').toggleClass('disabled');
        event.preventDefault();
    });
});

/**
 * 必須ラベルを隠す
 * @param arr 除外するフォーム名の配列
 */
window.hideRequiredLabel = function (arr) {
    $('.form-group > label').each(function () {
        const label = $(this).attr('for');
        if (arr.indexOf(label) == -1) {
            $(this).children('span.badge').addClass('hide');
        }
    })
}

/**
 * 必須ラベルを表示する
 * @param arr 除外するフォーム名の配列
 */
window.showRequiredLabel = function (arr) {
    $('.form-group > label').each(function () {
        const label = $(this).attr('for');
        if (arr.indexOf(label) == -1) {
            $(this).children('span.badge').removeClass('hide');
        }
    })
}
