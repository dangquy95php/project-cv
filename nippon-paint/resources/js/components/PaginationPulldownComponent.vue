<template>
    <select v-model="per_page_local" @change="transitionIndex()">
      <option v-for="_page in per_pages" v-bind:value="_page">{{ _page }}件</option>
    </select>
</template>

<script>
export default {
  props: {
    terms_count: Number,
    per_page: Number,
  },
  data() {
    return {
      terms_count_local:'',
      per_page_local: '',
      per_pages: [],
      url: '',
      params: '',
    }
  },
  mounted() {
    this.terms_count_local = this.terms_count
    this.per_page_local = this.per_page

    const pages_list = ['30', '60', '90', '120']
    pages_list.forEach((_page) => {
      if (_page <= this.terms_count_local) {
        this.per_pages.push(_page)
      }
    })
  },
  methods: {
    transitionIndex() {
      this.url = new URL(document.location)
      this.params = new URLSearchParams(this.url.search)
      this.params.set('per_page', this.per_page_local)
      this.url.search = this.params
      document.location.href = this.url
    }
  }
}
</script>
