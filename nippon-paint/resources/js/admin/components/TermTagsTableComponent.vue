<template>
  <table class="table table-striped table-highlight">
    <thead>
      <tr>
        <th><a :href="sortable_id_link">ID</a> <i class="fa fa-sort"></i></th>
        <th><a :href="sortable_name_link">タグ名</a> <i class="fa fa-sort"></i></th>
        <th><a :href="sortable_slug_link">スラッグ</a> <i class="fa fa-sort"></i></th>
        <th><a :href="sortable_updated_at_link">更新日時</a> <i class="fa fa-sort"></i></th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(tag, index) in tags" :key="index">
        <td>{{ tag.id }}</td>
        <td v-if="editables[index]">
          <div :class="`form-group ${errors.name? 'has-error': ''}`">
            <input type="text" name="name" class="form-control" v-model="tags[index].name" />
            <span class="error-message" v-if="errors.name">{{ errors.name[0] }}</span>
          </div>
        </td>
        <td v-else>
          {{ tag.name }}
        </td>
        <td v-if="editables[index]">
          <div :class="`form-group ${errors.slug? 'has-error': ''}`">
            <input type="text" name="slug" class="form-control" v-model="tags[index].slug" />
            <span class="error-message" v-if="errors.slug">{{ errors.slug[0] }}</span>
          </div>
        </td>
        <td v-else>
          {{ tag.slug }}
        </td>
        <td>{{ tag.updated_at | moment }}</td>
        <td class="d-inline-flex">
          <a class="btn btn-sm btn-primary mr-1 text-white" @click.prevent="updateTag(index)" v-if="editables[index]">
            <i class="fas fa-save"></i> 更新
          </a>
          <a class="btn btn-sm btn-warning mr-1" @click.prevent="editableTag(index, false)" v-if="editables[index]">
            <i class="fas fa-window-close"></i> キャンセル
          </a>
          <a class="btn btn-sm btn-dark mr-1 text-white" @click.prevent="editableTag(index, true)" v-if="!editables[index]">
            <i class="fas fa-pencil-alt"></i> 編集
          </a>
          <a class="btn btn-sm btn-danger text-white" @click.prevent="deleteTag(index)">
            <i class="fas fa-trash"></i> 削除
          </a>
        </td>
      </tr>
    </tbody>
    <!-- vueから DELETE 送信するためのダミーフォーム -->
    <form id="term-tag-form" method="POST" action="">
      <input type="hidden" name="_token" :value="csrf" />
      <input id="term-tag-form-method" type="hidden" name="_method" value="DELETE" />
    </form>
  </table>
</template>

<script>
  import axios from 'axios'
  import moment from 'moment'

  export default {
    props: {
      api: String,
      csrf: String,
      tags: Array, // tags配列データをJSONデータとして取得
    },
    data() {
      return {
        sortable_id_link: '',
        sortable_updated_at_link: '',
        sortable_name_link: '',
        sortable_slug_link: '',
        editables: [],
        errors: {},
      }
    },
    mounted() {
      this.sortable_id_link = document.querySelector('#sortable-id a').href
      this.sortable_updated_at_link = document.querySelector('#sortable-updated_at a').href
      this.sortable_name_link = document.querySelector('#sortable-name a').href
      this.sortable_slug_link = document.querySelector('#sortable-slug a').href
    },
    methods: {
      /**
       * タグの編集可能状態を変更
       * @param {number} index
       * @param {boolean} editabled
       */
      editableTag(index, editabled) {
        this.$set(this.editables, index, editabled)
      },

      /**
       * タグ更新: PUT api/{tag_id}
       * @param {number} index
       */
      async updateTag(index) {
        try {
          const res = await axios.put(`${this.api}/${this.tags[index].id}`, {
            _token: this.csrf,
            id: this.tags[index].id,
            name: this.tags[index].name,
            slug: this.tags[index].slug,
          })
          this.errors = {}
          if (res.data.result) {
            this.editableTag(index, false)
          } else {
            window.alert('タグを更新できませんでした')
          }
        } catch (err) {
          this.errors = err.response.data.errors
        }
      },

      /**
       * タグ削除: DELETE api/{tag_id}
       * @param {number} index
       */
      deleteTag(index) {
        if (window.confirm('本当に削除しますか？')) {
          const form = document.getElementById('term-tag-form')
          // set form value
          form.action = `${this.api}/${this.tags[index].id}`
          // submit form
          form.submit()
        }
      },
    },
    filters: {
      /**
       * momentフィルタ
       * @param {string} data
       * @return {string}
       */
      moment(date) {
        return moment(date).format('YYYY/MM/DD HH:mm:ss')
      }
    }
  }
</script>
