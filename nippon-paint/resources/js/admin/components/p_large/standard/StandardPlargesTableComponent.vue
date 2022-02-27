<template>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="">一般名称</th>
            <th class="">製品</th>
            <th class="">規格番号</th>
            <th>
                <button class="btn btn-sm btn-info float-left add-field" type="button" v-on:click='appendKey'>
                    <i class="fas fa-plus"></i>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="(product, index) in products">
                <input v-if="product.id" type="hidden" :name="'products['+index+'][id]'" :value="product.id">
                <td :class="hasError(errors['products.'+index+'.general_name'])">
                    <input class="form-control" type="text" :name="'products['+index+'][general_name]'" v-model="product.general_name">
                    <span class="error-message" v-if="errors['products.'+index+'.general_name']" v-for="error in errors['products.'+index+'.general_name']">
                        {{error}}
                    </span>
                </td>
                <td :class="hasError(errors['products.'+index+'.p_large_id'])">
                    <searchable-select
                        :name="'products['+index+'][p_large_id]'"
                        :options="options"
                        :value="product.p_large_id"
                        @catchData="updateProducts($event, index)"
                    ></searchable-select>
                    <span class="error-message" v-if="errors['products.'+index+'.p_large_id']" v-for="error in errors['products.'+index+'.p_large_id']">
                        {{error}}
                    </span>
                </td>
                <td :class="hasError(errors['products.'+index+'.general_standard_number'])">
                    <input class="form-control" type="text" :name="'products['+index+'][general_standard_number]'" v-model="product.general_standard_number">
                    <span class="error-message" v-if="errors['products.'+index+'.general_standard_number']" v-for="error in errors['products.'+index+'.general_standard_number']">
                        {{error}}
                    </span>
                </td>
                <td>
                    <button class="btn btn-sm btn-danger float-left remove-form" type="button" style="" v-on:click='deleteKey(index)'>
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
            options: Object,
            errors: Object
        },
        data: function() {
            return {
                products: (function (values) {
                    if(values.length < 1){
                        return [{general_name: '', general_standard_number: '', p_large_id: ''}]
                    } else {
                        return values;
                    }
                }(this.values))
            }
        },
        methods: {
            appendKey: function(){
                this.$set(this.products, this.products.length, {
                    general_name: '', general_standard_number: '', p_large_id: ''
                });
            },
            deleteKey: function(index){
                this.products.splice(index, 1);
            },
            hasError: function (error) {
                if(error){
                    return 'form-group has-error';
                } else{
                    return 'form-group';
                }
            },
            updateProducts: function (data, index) {
                this.products[index].p_large_id = Number(data);
            }
        }
    }
</script>
