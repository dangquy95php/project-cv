<template>
    <div>
        <vue-multiselect
            v-model="selected"
            :options="option_list"
            :close-on-select="true"
            :clear-on-select="false"
            track-by="id"
            label="label"
            placeholder="選択してください"
            @select="onSelect">
        </vue-multiselect>
        <input type="hidden" :name="name" :value="selected.id">
    </div>
</template>

<script>

export default {
    props: {
        options: Object,
        name: String,
        value: Number,
    },
    data() {
        return {
            option_list: this.getOptions(this.options),
            selected: {id:'', value:''}
        }
    },
    watch: {
        value: function (new_value) {
            this.selected = this.option_list.filter(option => String(option.id) === String(new_value))[0];
        },
    },
    mounted() {
        this.selected = this.getSelected(this.option_list, this.value);
    },
    methods: {
        /**
         * object型をからArray型へ変換
         * @param obj
         * @returns {[]}
         */
        getOptions(obj) {
            const options = [];
            for (const [id, label] of Object.entries(obj)) {
                options.push({id, label});
            }
            return options;
        },
        /**
         * optionsからidが一致するものをフィルタリング
         * @param options
         * @param id
         */
        getSelected(options, id) {
            var selected = options.filter(option => String(option.id) === String(id));
            if(selected.length === 1){
                return  selected[0];
            }
            return {id:'', value:''};
        },
        onSelect(value){
            this.$emit('catchData', value.id);
        },
    }
}
</script>
