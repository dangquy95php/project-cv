<template>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="">表示名</th>
            <th class="">リンク<br><span class="help-message">※http込みで入力してください。入力例: https://example.com/example</span></th>
            <th class="">種類</th>
            <th>
                <button class="btn btn-sm btn-info float-left add-field" type="button" v-on:click='appendKey'>
                    <i class="fas fa-plus"></i>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="(page, index) in pages">
                <input v-if="page.id" type="hidden" :name="'additional_related_pages['+index+'][id]'" :value="page.id">
                <td :class="hasError(errors['additional_related_pages.'+index+'.indication'])">
                    <input class="form-control" type="text" :name="'additional_related_pages['+index+'][indication]'" v-model="page.indication">
                    <span class="error-message" v-if="errors['additional_related_pages.'+index+'.indication']" v-for="error in errors['additional_related_pages.'+index+'.indication']">
                        {{error}}
                    </span>
                </td>
                <td :class="hasError(errors['additional_related_pages.'+index+'.url'])">
                    <input class="form-control" type="text" :name="'additional_related_pages['+index+'][url]'" v-model="page.url">
                    <span class="error-message" v-if="errors['additional_related_pages.'+index+'.url']" v-for="error in errors['additional_related_pages.'+index+'.url']">
                        {{error}}
                    </span>
                </td>
                <td :class="hasError(errors['additional_related_pages.'+index+'.type'])">
                    <select :name="'additional_related_pages['+index+'][type]'"
                          class="form-control"
                          v-model="page.type"
                    >
                        <option v-for="(label, key) in type_list" :value="key">{{ label }}</option>
                    </select>
                    <span class="error-message" v-if="errors['additional_related_pages.'+index+'.type']" v-for="error in errors['additional_related_pages.'+index+'.type']">
                          {{error}}
                    </span>
                </td>
                <td>
                    <button class="btn btn-sm btn-danger float-left remove-form" type="button" v-on:click='deleteKey(index)'>
                        <i class="fas fa-times"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: {
            values: Array,
            type_list: Object,
            errors: Object
        },
        data: function() {
            return {
                pages: (function (values) {
                    if(values.length < 1){
                        return [{indication: '', url: ''}]
                    } else {
                        return values;
                    }
                }(this.values))
            }
        },
        methods: {
            appendKey: function(){
                this.$set(this.pages, this.pages.length, {
                    indication: '', url: ''
                });
            },
            deleteKey: function(index){
                this.pages.splice(index, 1);
            },
            hasError: function (error) {
                if(error){
                    return 'form-group has-error';
                } else{
                    return 'form-group';
                }
            }
        }
    }
</script>
