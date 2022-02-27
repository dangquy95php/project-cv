<template>
    <table class="table table-borderless table-documents">
        <tr>
            <td style="width: 50%;">一覧</td>
            <td style="width: 50%;">選択済み</td>
        </tr>
        <tr>
            <td colspan="2" class="p-0">
                <v-multiselect-listbox
                        :options="options"
                        v-model="selectedItems"
                        :reduce-display-property="(option) => option.name"
                        :reduce-value-property="(option) => option.id"
                        :no-options-found-text="placeholders.no_options"
                        :no-selected-options-found-text="placeholders.no_selected_options"
                        :search-options-placeholder="placeholders.search_options"
                        :selected-options-placeholder="placeholders.selected_options">
                </v-multiselect-listbox>
                <input type="hidden" :name="name" :value="JSON.stringify(getPostValue(selectedItems))">
            </td>
        </tr>
    </table>
</template>

<script>
    export default {
        props: {
            name: String,
            values: Array,
            options: Array,
            placeholders: Object
        },
        data: function() {
            return {
                selectedItems: []
            }
        },
        methods: {
            getPostValue(selectedItems){
                return selectedItems.map(function (val, index) {
                    return {id: val.id, sort: index+1};
                });
            },
            getSelectedDocsArr(values){
                var options = this.options;
                return values.map(function (val) {
                    var vals = options.filter(function (item) {
                        return item.id === val.id;
                    });
                    return vals[0];
                });
            }
        },
        mounted() {
            this.selectedItems = this.getSelectedDocsArr(this.values);
        }
    }
</script>
