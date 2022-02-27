<template>
  <div class="row pl-2 pr-2 pt-2">
    <input type="hidden" :name="name">
    <label class="col-sm-2 col-form-label">ファイルをアップロード</label>
    <div class="col-sm-10 vue-file">
      <input type="file" :name="'_file-'+name" class="vue-file-input" @change="upload">
      <label class="vue-file-label" :for="'_file-'+name" data-browse="ファイルを選択">{{ org_name }}</label>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    name: String,
    dir: String
  },
  data: function(){
    return {
      org_name: ''
    }
  },
  methods: {
    upload: function (e) {
      e.preventDefault();
      let files = e.target.files;
      this.org_name = files[0].name;
      let formData = new FormData();
      formData.append('upload', files[0]);
      formData.append('dir', this.dir);
      axios({
        url: '/api/general-upload',
        method: 'POST',
        data: formData,
        headers: {
          'Content-Type': 'multipart/form-data;',
        },
        withCredentials: false
      }).then(response => {
        if (response.data.result === 'success') {
          this.$emit('catchData', response.data.files);
        } else {
          alert(response.data.message);
        }
        this.org_name = '';
      }).catch(error => {
        console.log(error.response.status, error.response.data.message);
      });
    },
  }
}
</script>
