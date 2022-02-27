<template>
    <select name="limit" id="" v-model="selected" @change="changeLimit()">
      <option :value="10">10件</option>
      <option :value="20">20件</option>
      <option :value="30">30件</option>
      <option :value="50">50件</option>
    </select>
</template>

<script>
  export default {
    props: {
      limit: Number
    },
    data() {
      return {
        selected: '',
      }
    },
    mounted() {
      this.selected = this.limit;
    },
    methods: {
      changeLimit() {
        var form = document.getElementById('search-form');
        form.addEventListener("formdata", eve => {
          eve.formData.append('limit', this.selected);
        });
        form.submit();
      },
    },
  }
</script>
