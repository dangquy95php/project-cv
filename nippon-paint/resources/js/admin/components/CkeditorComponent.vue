<template>
    <div>
    <ckeditor v-model="editorData" :config="editorConfig"></ckeditor>
        <input type="hidden" :name="name" :value="editorData">
    </div>
</template>

<script>
    export default {
        props: {
            name: String,
            dir: String,
            value: String,
        },
        data() {
            return {
                editorData: this.value,
                editorConfig: {
                    allowedContent: true,
                    filebrowserUploadUrl: '/api/ckeditor-upload/'+this.dir,
                    filebrowserUploadMethod: 'form',
                    image_previewText: 'ここにプレビューを表示します',
                    extraPlugins: 'templates',
                    templates_files: ['/js/admin/template.js'],
                },
            }
        }
    }
</script>
