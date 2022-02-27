/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('babel-polyfill')
window.Vue = require('vue');

import CKEditor from 'ckeditor4-vue';
Vue.use(CKEditor);
import vMultiselectListbox from 'vue-multiselect-listbox';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('draggable-list-component', require('./components/DraggableListComponent.vue').default);
Vue.component('wysiwyg-form', require('./components/CkeditorComponent.vue').default);
Vue.component('vue-multiselect', require('vue-multiselect').default);
Vue.component('multiselect-search', require('./components/SeachableMultiselectComponent.vue').default);
Vue.component('searchable-select', require('./components/SearchableSelectComponent.vue').default);
Vue.component('term-tags-table', require('./components/TermTagsTableComponent.vue').default);
Vue.component('packings-table', require('./components/p_building/PackingsTableComponent.vue').default);
Vue.component('finish-samples-table', require('./components/p_building/FinishSamplesTableComponent.vue').default);
Vue.component('v-multiselect-listbox', vMultiselectListbox);
Vue.component('sortable-select', require('./components/SortableSelectComponents.vue').default);
Vue.component('img-upload', require('./components/UploadImageComponent.vue').default);
Vue.component('related-pages-table', require('./components/p_building/AdditionalRelatedPagesTableComponent.vue').default);
Vue.component('standard-processes', require('./components/p_large/spec/StandardAndProcessesTableComponent.vue').default);
Vue.component('document-upload', require('./components/UploadDocumentComponent.vue').default);
Vue.component('document-category', require('./components/document/DocumentCategoryComponent.vue').default);
Vue.component('standard-p-larges', require('./components/p_large/standard/StandardPlargesTableComponent.vue').default);
Vue.component('p-searchable-select', require('./components/p_large/spec/ProductSearchableSelect.vue').default);
Vue.component('file-table', require('./components/file/FileTableComponent.vue').default);
Vue.component('general-upload', require('./components/GeneralUploadComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
const list = new Vue({
    el: '#list'
})
