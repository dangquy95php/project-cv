<template>
  <select name="limit" v-model="limit_local" @change="changeLimit()">
    <option :value="10">10件</option>
    <option :value="20">20件</option>
    <option :value="30">30件</option>
    <option :value="50">50件</option>
  </select>
</template>

<script>
  export default {
    props: {
      limit: Number,
    },
    data() {
      return {
        limit_local: '',
      }
    },
    mounted() {
      this.limit_local = this.limit;
    },
    methods: {
      changeLimit() {
        location.href = location.pathname + '?limit=' + this.limit_local;
      },
    },
  }
</script>
