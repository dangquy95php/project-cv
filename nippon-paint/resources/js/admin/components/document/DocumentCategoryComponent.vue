<template>
    <div class="input-group">
        <select class="form-control" name="product_category_id" v-model="product_category_id" @change="setDocsOptions">
            <option value="">製品カテゴリを選択</option>
            <option v-for="(category, id) in product_category_list" :value="id">{{ category }}</option>
        </select>
        <select class="form-control" name="document_category_id" v-model="document_category_id">
            <option value="">資料カテゴリを選択</option>
            <optgroup v-if="Array.isArray(group.value)" v-for="group in docs_options" :label="group.label">
                <option v-for="option in group.value" :value="option.value">{{ option.label }}</option>
            </optgroup>
            <option v-else :value="group.value">{{ group.label }}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props: {
            product_category_list: Object,
            docs_category_list: Object,
            value: Object,
        },
        data() {
            return {
                docs_options: [],
                product_category_id: this.value.product_category_id,
                document_category_id: '',
            };
        },
        methods: {
            setDocsOptions: function () {
                if(this.product_category_id){
                    this.docs_options = this.docs_category_list[this.product_category_id];
                }else{
                    this.docs_options = [];
                }
                this.document_category_id = '';
            },
        },
        mounted() {
            this.setDocsOptions();
            this.document_category_id = this.value.document_category_id
        }
    }
</script>