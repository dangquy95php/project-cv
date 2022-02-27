<template>
    <div>
    <table class="table no-border">
        <tr>
            <td style="width: 10%">適</td>
            <td>
                <vue-multiselect
                    v-model="taggingSelectedSu"
                    :options="taggingOptions"
                    :multiple="true"
                    :taggable="true"
                    label="name"
                    track-by="id"
                    @tag="addTagToSu"
                    tag-placeholder="Add this as new tag"
                    placeholder="選択してください">
                </vue-multiselect>
                <input type="hidden" name="painting_methods_suitable" :value="JSON.stringify(taggingSelectedSu)">
            </td>
        </tr>
        <tr>
            <td>可</td>
            <td>
                <vue-multiselect
                    v-model="taggingSelectedUs"
                    :options="taggingOptions"
                    :multiple="true"
                    :taggable="true"
                    label="name"
                    track-by="id"
                    @tag="addTagToUs"
                    tag-placeholder="Add this as new tag"
                    placeholder="選択してください">
                </vue-multiselect>
                <input type="hidden" name="painting_methods_usable" :value="JSON.stringify(taggingSelectedUs)">
            </td>
        </tr>
        <tr>
            <td>不可</td>
            <td>
                <vue-multiselect
                    v-model="taggingSelectedNa"
                    :options="taggingOptions"
                    :multiple="true"
                    :taggable="true"
                    label="name"
                    track-by="id"
                    @tag="addTagToNa"
                    tag-placeholder="Add this as new tag"
                    placeholder="選択してください">
                </vue-multiselect>
                <input type="hidden" name="painting_methods_na" :value="JSON.stringify(taggingSelectedNa)">
            </td>
        </tr>
    </table>
    </div>
</template>

<script>
    export default {
        props: {
            options: Object,
            values_suitable: Array,
            values_usable: Array,
            values_na: Array,
        },
        data() {
            return {
                taggingOptions: this.getOptions(this.options),
                taggingSelectedSu: [],
                taggingSelectedUs: [],
                taggingSelectedNa: [],
            }
        },
        mounted() {
            this.taggingSelectedSu = this.getSelected(this.taggingOptions, this.values_suitable);
            this.taggingSelectedUs = this.getSelected(this.taggingOptions, this.values_usable);
            this.taggingSelectedNa = this.getSelected(this.taggingOptions, this.values_na);
        },
        methods: {
            addTagToSu: function(newTag) {
                const tag = {
                    id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000)),
                    name: newTag,
                };
                this.taggingOptions.push(tag);
                this.taggingSelectedSu.push(tag);
            },
            addTagToUs: function(newTag) {
                const tag = {
                    id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000)),
                    name: newTag,
                };
                this.taggingOptions.push(tag);
                this.taggingSelectedUs.push(tag);
            },
            addTagToNa: function(newTag) {
                const tag = {
                    id: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000)),
                    name: newTag,
                };
                this.taggingOptions.push(tag);
                this.taggingSelectedNa.push(tag);
            },
            getOptions(obj) {
                const options = [];
                for (const [id, name] of Object.entries(obj)) {
                    options.push({id, name});
                }
                return options;
            },
            getSelected(options, ids) {
                return options.filter(option => ids.some(id => String(option.id) === String(id)));
            }
        }
    }
</script>
