<template>
  <div class="card">
    <div class="card-header">
      <input type="text" name="keyword" v-model="keyword" @input="onInput" class="form-control" placeholder="ファイル名で検索">
      <general-upload
        :name="'upload'"
        :dir="'files'"
        @catchData="updateTables">
      </general-upload>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-striped table-highlight">
        <thead>
        <tr>
          <th>種類</th>
          <th>ファイル名</th>
          <th>更新日</th>
          <th>パスをコピー</th>
          <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(filtered_file) in filtered_files">
          <td class="p-0" v-if="checkType(filtered_file.name) === 'img'">
            <a :href="filtered_file.full_path" target="_blank">
              <img :src="filtered_file.full_path" style="height: 55px">
            </a>
          </td>
          <td v-else>
            <a :href="filtered_file.full_path" target="_blank">
              <i v-if="checkType(filtered_file.name) === 'pdf'" class="fa fa-file-pdf fa-2x" style="color: #dc3545;"></i>
              <i v-else class="fa fa-file fa-2x"></i>
            </a>
          </td>
          <td>{{ filtered_file.name }}</td>
          <td>{{ filtered_file.modified }}</td>
          <td>
            <button class="btn btn-sm btn-light" @click="copyTextToClipboard(filtered_file.full_path)"><i class="fas fa-copy">クリップボードにコピー</i></button>
          </td>
          <td>
            <button class="btn btn-sm btn-danger" @click="deleteImg(filtered_file.path)"><i class="fas fa-trash">削除</i></button>
          </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    files: Array,
  },
  data: function(){
    return {
      all_files: [],
      filtered_files: [],
      keyword: ''
    }
  },
  methods: {
    onInput: function (){
      var keyword = this.keyword;
      this.filtered_files = this.all_files.filter(function (item) {
        return item.name.search(keyword) !== -1;
      });
    },
    updateTables: function (data) {
      this.all_files = data.sort(function(a,b) {
        return (a.modified < b.modified ? 1 : -1);
      });
      this.filtered_files = this.all_files;
      this.keyword = '';
    },
    deleteImg: function (path){
      if(confirm('ファイルを削除します。よろしいですか？')){
        let formData = new FormData();
        formData.append('path', path.replace('/', '|'));
        axios({
          url: '/api/file-delete',
          method: 'POST',
          data: formData,
          headers: {
            'Content-Type': 'multipart/form-data;',
          },
          withCredentials: false
        }).then(response => {
          if (response.data.result === 'success') {
            this.all_files = this.all_files.filter(function (item) {
              return item.path !== path;
            }).sort(function(a,b) {
              return (a.modified < b.modified ? 1 : -1);
            });
            this.filtered_files = this.filtered_files.filter(function (item) {
              return item.path !== path;
            }).sort(function(a,b) {
              return (a.modified < b.modified ? 1 : -1);
            });
          } else {
            console.log(response.data.result);
          }
        }).catch(error => {
          console.log(error.response.status, error.response.data.message);
        });
      }
    },
    copyTextToClipboard: function (str) {
      var copyFrom = document.createElement("textarea");
      copyFrom.textContent = str;
      var bodyElm = document.getElementsByTagName("body")[0];
      bodyElm.appendChild(copyFrom);
      copyFrom.select();
      var retVal = document.execCommand('copy');
      bodyElm.removeChild(copyFrom);
      return retVal;
    },
    checkType: function (name){
      if(name.endsWith('.jpeg') || name.endsWith('.jpg') || name.endsWith('.png') || name.endsWith('.gif')){
        return 'img';
      } else if(name.endsWith('.pdf')){
        return  'pdf';
      }else{
        return 'other';
      }
    }
  },
  mounted() {
    this.all_files = this.files.sort(function(a,b) {
      return (a.modified < b.modified ? 1 : -1);
    });
    this.filtered_files = this.all_files;
  }
}
</script>

<style scoped>

</style>
