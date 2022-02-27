<template>
    <div>
        <vue-multiselect
            v-model="select_list"
            :options="option_list"
            :multiple="true"
            :close-on-select="false"
            track-by="id"
            label="label"
            placeholder="選択してください"
            @input="onInput">
        </vue-multiselect>
        <input type="hidden" :name="name" :value="getPostData(select_list)">
    </div>
</template>

<script>
    export default {
        props: {
            options: Object, // {id1: value1, id2: value2, ...} 形式で受ける
            name: String,
            values: Array, // [id1, id2, ...] 形式で受ける
        },
        data() {
            return {
                option_list: this.getOptions(this.options),
                select_list: [],
            }
        },
        watch: {
            values: function (new_value) {
                this.select_list = this.getSelected(this.option_list, new_value);
            },
        },
        mounted() {
            this.select_list = this.getSelected(this.option_list, this.values);
        },
        methods: {
            /**
             * options を Object {id: value} => Array [{id: id, label: value}] に型変換
             * @param {Object} obj
             * @return {Array}
             */
            getOptions(obj) {
                const options = [];
                for (const [id, label] of Object.entries(obj)) {
                    options.push({id, label});
                }
                return options;
            },

            /**
             * options [{id, label}, ...} から id が ids [id, ...] であるものをフィルタリング
             * @param {Array} options
             * @param {Array[Any]} ids
             * @return {Array[Object]}
             */
            getSelected(options, ids) {
                return options.filter(option => ids.some(id => String(option.id) === String(id)));
            },

            /**
             * selected [{id, label}, ...] を [id, ...] に変換
             * @param {Array[Object]} selected
             * @return {Array[Any]}
             */
            getPostData(selected){
                return selected.map(item => item.id);
            },
            onInput(value){
                this.$emit('catchData', value);
            },
        }
    }

    const isNumber = function(value) {
        return ((typeof value === 'number') && (isFinite(value)));
    };
</script>
