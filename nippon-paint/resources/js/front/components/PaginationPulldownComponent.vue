<template>
  <div>
    <select v-model="per_page_local" @change="transitionIndex()">
      <option v-for="_page in per_pages" v-bind:value="_page">{{ _page }}件</option>
    </select>
  </div>
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
      per_pages: [30],

      url: '',
      params: '',
    }
  },
  mounted() {
    this.terms_count_local = this.terms_count
    this.per_page_local = this.per_page
    const pages_list = [30, 60, 90, 120]

    /**
     * Dang Quy - 27/10/2020
     * Handler url. If user enter per_pages != [30, 60, 90, 120]
     */
    if (pages_list.indexOf(this.per_page_local) == -1)
        this.per_page_local = 30;

    for (let i = 1; i < pages_list.length; i++) {
      if (pages_list[i] <= this.terms_count_local) {
        this.per_pages.push(pages_list[i])
      }
    }
  },
  methods: {
    transitionIndex() {
      this.url = new URL(document.location)
      this.params = new URLSearchParams(this.url.search)
      this.params.delete('page')
      this.params.set('per_page', this.per_page_local)
      this.url.search = this.params
      document.location.href = this.url
    }
  }
}
</script>
