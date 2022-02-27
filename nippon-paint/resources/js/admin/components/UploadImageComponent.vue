<template>
    <div>
        <input type="hidden" :name="name" :value="img_name">
        <div class="vue-file">
            <input type="file" :name="'_file-'+name" accept="image/png,image/jpeg,image/gif" class="vue-file-input" @change="upload">
            <label class="vue-file-label" :for="'_file-'+name" data-browse="画像を選択">{{ org_name }}</label>
        </div>
        <div class="thumbnail-area mt-2" v-if="checkExtension(path_data)">
            <img :src="path_data" class="img-thumbnail">
            <button type="button" class="btn btn-xs btn-default img-delete" v-on:click="deleteImg(img_name)"><i class="fas fa-times"></i></button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            name: String,
            value: String,
            path: String,
            dir: String
        },
        data: function(){
            return {
                path_data: this.path,
                img_name: this.value,
                org_name: ''
            }
        },
        watch: {
            value: function (new_value) {
                this.img_name = new_value;
            },
            path: function (new_path) {
                this.path_data = new_path;
            }
        },
        methods: {
            checkExtension(path){
                return path.endsWith('.jpeg') || path.endsWith('.png') || path.endsWith('.gif')
            },
            upload: function (e) {
                e.preventDefault();
                let files = e.target.files;
                this.org_name = files[0].name;
                let formData = new FormData();
                formData.append('upload', files[0]);
                formData.append('dir', this.dir);
                if(this.value !== this.img_name){
                    formData.append('delete_path', this.dir+'|'+this.img_name);
                }
                axios({
                    url: '/api/file-upload',
                    method: 'POST',
                    data: formData,
                    headers: {
                        'Content-Type': 'multipart/form-data;',
                    },
                    withCredentials: false
                }).then(response => {
                    if (response.data.result === 'success') {
                        this.path_data = response.data.full_path;
                        this.img_name = response.data.url;
                        response.data.name = this.name;
                        this.org_name = '';
                        this.$emit('catchData', response.data);
                    } else {
                        alert(response.data.message);
                    }
                    e.target.value = '';
                    this.org_name = '';
                }).catch(error => {
                    console.log(error.response.status, error.response.data.message);
                });
            },
            deleteImg() {
                if(confirm('画像を削除します。よろしいですか？')){
                    if(this.value === this.img_name){
                        this.path_data = '';
                        this.img_name = '';
                        return;
                    }
                    let formData = new FormData();
                    formData.append('path', this.dir+'|'+this.img_name);
                    axios({
                        url: '/api/file-delete',
                        method: 'POST',
                        data: formData,
                        headers: {
                            'Content-Type': 'multipart/form-data;',
                        },
                        withCredentials: false
                    }).then(response => {
                        if (response.data.result === 'success') {
                            this.path_data = '';
                            this.img_name = '';
                        } else {
                            console.log(response.data.result);
                        }
                    }).catch(error => {
                        console.log(error.response.status, error.response.data.message);
                    });
                }
            }
        }
    }
</script>
