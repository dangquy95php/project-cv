/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('babel-polyfill')
window.Vue = require('vue');

import 'url-search-params-polyfill';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('topics-list-component', require('./components/TopicsListComponent.vue').default);
Vue.component('topics-csr-list-component', require('./components/TopicsCsrListComponent.vue').default);
Vue.component('pagination-pulldown-component', require('./components/PaginationPulldownComponent.vue').default);
Vue.component('change-limit', require('./components/ChangeLimitComponent.vue').default);
Vue.component('change-limit-without-form-component', require('./components/ChangeLimitWithoutFormComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
});

$(function () {
    $('input[type="checkbox"]').change(function () {
        var form = $(this).parents('form');
        var get_param = form.serialize();
        var name = form.data('name')
        if(form.data('parent')){
            get_param = 'parent_category='+form.data('parent')+'&'+get_param;
        }
        $.ajax({
            url: '/api/count/'+name+'?'+get_param,
            type: 'get'
        }).done(function (data) {
            $('#count-'+name).text(data);
        }).fail(function (res) {
            console.log(res);
        });
    });
});
