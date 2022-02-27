<template>
    <div>
        <input type="hidden" :name="name" :value="document_name">
        <div class="vue-file">
            <input type="file" :name="'_file-'+name" accept="application/pdf" class="vue-file-input" @change="upload">
            <label class="vue-file-label" :for="'_file-'+name" data-browse="ファイルを選択">{{ org_name }}</label>
        </div>
        <div class="thumbnail-area mt-2" v-if="document_name">
            <a :href="path_data" target="_blank">{{ document_name }}</a>
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
                document_name: this.value,
                org_name: ''
            }
        },
        watch: {
            value: function (new_value) {
                this.document_name = new_value;
            },
            path: function (new_path) {
                this.path_data = new_path;
            }
        },
        methods: {
            upload: function (e) {
                e.preventDefault();
                let files = e.target.files;
                this.org_name = files[0].name;
                let formData = new FormData();
                formData.append('upload', files[0]);
                formData.append('dir', this.dir);
                axios({
                    url: '/api/document-upload',
                    method: 'POST',
                    data: formData,
                    headers: {
                        'Content-Type': 'multipart/form-data;',
                    },
                    withCredentials: false
                }).then(response => {
                    if (response.data.result === 'success') {
                        this.path_data = response.data.full_path;
                        this.document_name = response.data.url;
                        response.data.name = this.name;
                        this.org_name = '';
                    } else {
                        alert(response.data.message);
                    }
                    e.target.value = '';
                    this.org_name = '';
                }).catch(error => {
                    console.log(error.response.status, error.response.data.message);
                });
            },
        }
    }
</script>
