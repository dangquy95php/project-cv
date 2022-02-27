<template>
  <div class="c-blocklist__tab">
    <div class="c-filter1">
      <form>
        <div class="c-filter1__wrapper">
          <div class="c-filter1__group">
            <span class="c-filter1__label">年代別</span>
            <div class="c-filter1__select">
              <select v-model="year_local" @change="getTopics()">
                <option v-for="year in unique_years_local" v-bind:value="year">{{ year }}年</option>
              </select>
            </div>
          </div>
          <div class="c-filter1__group">
            <span class="c-filter1__label">カテゴリ</span>
            <div class="c-filter1__select">
              <select v-model="topic_category_local" @change="redirectTo()" class="category">
                <option value="">すべて</option>
                <option v-for="vaild_category_id in csr_availability_topic_categories" v-bind:value="csr_category_url_list[vaild_category_id]">{{ topic_categories[vaild_category_id] }}</option>
              </select>
            </div>
          </div>
        </div>
      </form>
    </div>
    <ul class="c-list__list c-list4__list" v-model="topics_local" v-if="topics_local">
      <li class="c-list4__item" v-for="topic in topics_local">
        <div v-if="topic.content !== '' || topic.redirect_url !== ''">
          <a :href=topic.topic_url>
            <div class="c-list4__item__inner">
              <div class="c-list4__item__img" v-if="topic.thumbnail !== null && topic.thumbnail !== ''">
                <img :src="topic.thumbnail_url_path" alt="">
              </div>
              <div class="c-list4__item__img" v-else>
                <img src="/images/top/top5_img.jpg" alt="">
              </div>
              <div class="c-list4__item__detail">
                <p class="c-list4__label">{{ topic_categories[topic.article_category_id] }}</p>
                <p class="c-list4__date">{{ topic.publication_date | moment }}</p>
                <p class="c-list4__text">{{ topic.title }}</p>
              </div>
            </div>
          </a>
        </div>
        <div v-else>
          <div class="c-list4__item__inner">
            <div class="c-list4__item__img" v-if="topic.thumbnail !== null && topic.thumbnail !== ''">
              <img :src="topic.thumbnail_url_path" alt="">
            </div>
            <div class="c-list4__item__img" v-else>
              <img src="/images/top/top5_img.jpg" alt="">
            </div>
            <div class="c-list4__item__detail">
              <p class="c-list4__label">{{ topic_categories[topic.article_category_id] }}</p>
              <p class="c-list4__date">{{ topic.publication_date | moment }}</p>
              <p class="c-list4__text">{{ topic.title }}</p>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div><!-- / c-blocklist__tab -->
</template>

<script>
  import axios from 'axios'
  import moment from 'moment'

  export default {
    props: {
      topics: Array,
      topic_categories: Object,
      csr_category_url_list: Object,
      csr_availability_topic_categories: Object,
      unique_years: Array,
      topic_category: String,
      year: String,
    },
    data() {
      return {
        topics_local: '',
        topic_categories_local: '',
        unique_years_local: '',
        topic_category_local: '',
        year_local: '',
      }
    },
    mounted() {
      this.topics_local = this.topics
      this.topic_categories_local = this.topic_categories
      this.unique_years_local = this.unique_years
      this.year_local = this.year
      this.topic_category_local = (this.topic_category !== null) ? this.topic_category : ''
    },
    methods: {
      /**
       * トピックスを取得
       */
      getTopics() {
        try {
          axios.get('/api/news/get/csr', {
            params: {
              topic_category: this.topic_category_local,
              year: this.year_local,
            }
          })
          .then((response) => {
            this.topics_local = response.data.topics
          })
        } catch(err) {
          console.log(err)
        }
      },

      redirectTo() {
        location.href="/news/csr/" + this.topic_category_local;
      }
    },
    watch: {
      year_local: function() {
        return this.getTopics()
      },
    },
    filters: {
      /**
       * momentフィルター
       * @param date
       * @returns {string}
       */
      moment(date) {
        return moment(date).format('YYYY.MM.DD')
      }
    }
  }
</script>
