<template>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="">液種類</th>
            <th class="">量</th>
            <th class="">単位</th>
            <th>
                <button class="btn btn-sm btn-info float-left add-field" type="button" v-on:click='appendKey'>
                    <i class="fas fa-plus"></i>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="(packing, index) in packings">
                <input v-if="packing.id" type="hidden" :name="'packings['+index+'][id]'" :value="packing.id">
                <td :class="hasError(errors['packings.'+index+'.type'])">
                    <input class="form-control" type="text" :name="'packings['+index+'][type]'" v-model="packing.type">
                    <span class="error-message" v-if="errors['packings.'+index+'.type']" v-for="error in errors['packings.'+index+'.type']">
                        {{error}}
                    </span>
                </td>
                <td :class="hasError(errors['packings.'+index+'.amount'])">
                    <input class="form-control" type="text" :name="'packings['+index+'][amount]'" v-model="packing.amount">
                    <span class="error-message" v-if="errors['packings.'+index+'.amount']" v-for="error in errors['packings.'+index+'.amount']">
                        {{error}}
                    </span>
                </td>
                <td :class="hasError(errors['packings.'+index+'.unit_id'])">
                    <select class="form-control" :name="'packings['+index+'][unit_id]'" v-model="packing.unit_id" options="options">
                        <option v-for="(label, key) in options" v-bind:value="key">
                            {{ label }}
                        </option>
                    </select>
                    <span class="error-message" v-if="errors['packings.'+index+'.unit_id']" v-for="error in errors['packings.'+index+'.unit_id']">
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
                packings: (function (values) {
                    if(values.length < 1){
                        return [{type: '', amount: '', unit_id: ''}]
                    } else {
                        return values;
                    }
                }(this.values))
            }
        },
        methods: {
            appendKey: function(){
                this.$set(this.packings, this.packings.length, {
                    type: '', amount: '', unit_id: ''
                });
            },
            deleteKey: function(index){
                this.packings.splice(index, 1);
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
