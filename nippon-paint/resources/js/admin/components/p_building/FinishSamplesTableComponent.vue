<template>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="">タイトル</th>
            <th class="">ファイル</th>
            <th>
                <button class="btn btn-sm btn-info float-left add-field" type="button" v-on:click='appendKey'>
                    <i class="fas fa-plus"></i>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
            <tr v-for="(sample, index) in finish_samples">
                <input v-if="sample.id" type="hidden" :name="'finish_samples['+index+'][id]'" :value="sample.id">
                <td :class="hasError(errors['finish_samples.'+index+'.image_title'])">
                    <input class="form-control" type="text" :name="'finish_samples['+index+'][image_title]'" v-model="sample.image_title">
                    <span class="error-message" v-if="errors['finish_samples.'+index+'.image_title']" v-for="error in errors['finish_samples.'+index+'.image_title']">
                        {{error}}
                    </span>
                </td>
                <td :class="hasError(errors['finish_samples.'+index+'.image'])">
                    <img-upload
                            :name="'finish_samples['+index+'][image]'"
                            :value="sample.image"
                            :path="sample.img_url"
                            dir="product|building|finish_samples"
                            @catchData="updateFinishSamples">
                    </img-upload>
                    <span class="error-message" v-if="errors['finish_samples.'+index+'.image']" v-for="error in errors['finish_samples.'+index+'.image']">
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
            errors: Object
        },
        data: function() {
            return {
                finish_samples: (function (values) {
                    if(values.length < 1){
                        return [{image_title: '', image: '', img_url: ''}]
                    } else {
                        return values;
                    }
                }(this.values))
            }
        },
        methods: {
            appendKey: function(){
                this.$set(this.finish_samples, this.finish_samples.length, {
                    image_title: '',
                    image: '',
                    img_url: ''
                });
            },
            deleteKey: function(index){
                this.finish_samples.splice(index, 1);
            },
            hasError: function (error) {
                if(error){
                    return 'form-group has-error';
                } else{
                    return 'form-group';
                }
            },
            updateFinishSamples: function (data) {
                var key = Number(data.name.substr(15,1));
                this.finish_samples[key].image = data.url;
                this.finish_samples[key].img_url = data.full_path;
            }
        },
    }
</script>
