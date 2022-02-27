<template>
  <div>
    <div :class="standard_id_class">
      <label class="col-sm-2 col-form-label">
        仕様規格
        <span class="badge badge-danger float-right">必須</span>
      </label>
      <div class="col-sm-10">
        <searchable-select
          :name="'p_large_standard_id'"
          :options="standard_options"
          :value="standard_id"
          @catchData="fetchProductList">
        </searchable-select>
        <span class="error-message" v-if="errors_standard_id"
              v-for="error in errors_standard_id">{{ error }}</span>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">塗装工程</label>
      <div class="col-sm-10 table-responsive">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>No.</th>
            <th style="min-width: 200px;">塗装場所</th>
            <th style="min-width: 200px">塗装工程</th>
            <th style="min-width: 250px">製品名（一般塗料名称）</th>
            <th style="min-width: 100px">使用量（kg/㎡/回）</th>
            <th style="min-width: 150px;">膜厚</th>
            <th style="min-width: 200px">塗装方法</th>
            <th style="min-width: 200px">希釈剤</th>
            <th style="min-width: 100px">希釈率</th>
            <th style="min-width: 150px">塗装間隔（23℃）</th>
            <th>操作</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="(process, index) in processes">
            <input v-if="process.id" type="hidden" :name="'processes['+index+'][id]'" :value="process.id">
            <input type="hidden" :name="'processes['+index+'][sort]'" :value="index+1">
            <input type="hidden" :name="'processes['+index+'][field_type]'" :value="process.field_type">
            <td>{{ index+1 }}</td>
            <!-- 塗装場所 -->
            <td :class="hasError(errors_processes['processes.'+index+'.p_large_spec_place_ids'])">
              <multiselect-search
                :options="place_list"
                :values="process.p_large_spec_place_ids"
                :name="'processes['+index+'][p_large_spec_place_ids]'"
                @catchData="updatePlaces($event, index)"
              ></multiselect-search>
              <span class="error-message" v-if="errors_processes['processes.'+index+'.p_large_spec_place_ids']"
                    v-for="error in errors_processes['processes.'+index+'.p_large_spec_place_ids']">{{ error }}</span>
            </td>
            <!-- 塗装工程 -->
            <td :class="hasError(errors_processes['processes.'+index+'.process_name'])">
              <input type="text" class="form-control" v-model="process.process_name"
                     :name="'processes['+index+'][process_name]'">
              <span class="error-message" v-if="errors_processes['processes.'+index+'.process_name']"
                    v-for="error in errors_processes['processes.'+index+'.process_name']">{{ error }}</span>
            </td>
            <!-- 製品名（一般塗料名称）セレクトボックス-->
            <td v-if="process.field_type == 1" :class="hasError(errors_processes['processes.'+index+'.p_large_id'])">
              <p-searchable-select
                :name="'processes['+index+'][p_large_id]'"
                :options="p_large_list"
                :value="Number(process.p_large_id)"
                @catchData="updateProcesses($event, index)"
              ></p-searchable-select>
              <input type="hidden" :name="'processes['+index+'][p_large_id]'" :value="Number(process.p_large_id)">
              <span class="error-message" v-if="errors_processes['processes.'+index+'.p_large_id']"
                    v-for="error in errors_processes['processes.'+index+'.p_large_id']">{{ error }}</span>
            </td>
            <!-- 使用量 テキストボックス-->
            <td v-if="process.field_type == 1" :class="hasError(errors_processes['processes.'+index+'.usage'])">
              <input type="text" class="form-control"
                     v-model="process.usage"
                     :name="'processes['+index+'][usage]'">
              <span class="error-message" v-if="errors_processes['processes.'+index+'.usage']"
                    v-for="error in errors_processes['processes.'+index+'.usage']">{{ error }}</span>
            </td>
            <!-- 膜厚 自由入力+単位セレクトボックス-->
            <td v-if="process.field_type == 1"
                :class="hasErrors([errors_processes['processes.'+index+'.film_thickness'], errors_processes['processes.'+index+'.film_thickness_unit']])">
              <div class="form-row">
                <div class="col">
                  <input type="text" class="form-control" :name="'processes['+index+'][film_thickness]'"
                         v-model="process.film_thickness">
                </div>
                <div class="col">
                  <select :name="'processes['+index+'][film_thickness_unit]'" class="form-control"
                          v-model="process.film_thickness_unit">
                    <option v-for="(label, key) in film_thickness_unit_list" :value="key">{{ label }}
                    </option>
                  </select>
                </div>
              </div>
              <span class="error-message" v-if="errors_processes['processes.'+index+'.film_thickness']"
                    v-for="error in errors_processes['processes.'+index+'.film_thickness']">{{ error }}</span>
              <span class="error-message" v-if="errors_processes['processes.'+index+'.film_thickness_unit']"
                    v-for="error in errors_processes['processes.'+index+'.film_thickness_unit']">{{ error }}</span>
            </td>
            <td v-if="process.field_type == 1" :class="hasError(errors_processes['processes.'+index+'.p_large_spec_painting_method_ids'])">
              <multiselect-search
                :options="method_list"
                :values="process.p_large_spec_painting_method_ids"
                :name="'processes['+index+'][p_large_spec_painting_method_ids]'"
                @catchData="updateMethods($event, index)"
              ></multiselect-search>
              <span class="error-message" v-if="errors_processes['processes.'+index+'.p_large_spec_painting_method_ids']"
                    v-for="error in errors_processes['processes.'+index+'.p_large_spec_painting_method_ids']">{{ error }}</span>
            </td>
            <!-- 希釈剤 セレクトボックス-->
            <td v-if="process.field_type == 1"
                :class="hasError(errors_processes['processes.'+index+'.p_large_spec_diluent_id'])">
              <select :name="'processes['+index+'][p_large_spec_diluent_id]'"
                      v-model="process.p_large_spec_diluent_id"
                      class="form-control">
                <option v-for="(label, key) in diluent_list" :value="key">{{ label }}</option>
              </select>
              <span class="error-message" v-if="errors_processes['processes.'+index+'.p_large_spec_diluent_id']"
                    v-for="error in errors_processes['processes.'+index+'.p_large_spec_diluent_id']">{{ error }}</span>
            </td>
            <!-- 希釈率 テキストボックス-->
            <td v-if="process.field_type == 1" :class="hasError(errors_processes['processes.'+index+'.dilution_rate'])">
              <input type="text" class="form-control"
                     v-model="process.dilution_rate"
                     :name="'processes['+index+'][dilution_rate]'">
              <span class="error-message" v-if="errors_processes['processes.'+index+'.dilution_rate']"
                    v-for="error in errors_processes['processes.'+index+'.dilution_rate']">{{ error }}</span>
            </td>
            <!-- 工程内容-->
            <td v-if="process.field_type == 2" colspan="6" :class="hasError(errors_processes['processes.'+index+'.detail'])">
                                <textarea class="form-control"
                                          :name="'processes['+index+'][detail]'"
                                          rows="1">{{ process.detail }}</textarea>
              <span class="error-message" v-if="errors_processes['processes.'+index+'.detail']"
                    v-for="error in errors_processes['processes.'+index+'.detail']">{{ error }}</span>
            </td>
            <!-- 塗装間隔（23℃） テキストボックス-->
            <td :class="hasError(errors_processes['processes.'+index+'.dried_time'])">
              <input type="text" class="form-control"
                     v-model="process.dried_time"
                     :name="'processes['+index+'][dried_time]'">
              <span class="error-message" v-if="errors_processes['processes.'+index+'.dried_time']"
                    v-for="error in errors_processes['processes.'+index+'.dried_time']">{{ error }}</span>
            </td>
            <!-- button-->
            <td>
              <button class="btn btn-sm btn-danger float-left remove-form" type="button"
                      v-on:click="deleteKey(index)">
                <i class="fas fa-times"></i>
              </button>
            </td>
          </tr>
          </tbody>
        </table>

        <div>
          <button class="btn btn-sm btn-info" type="button" v-on:click="separatorFieldAppend">
            <i class="fas fa-plus"></i> 区切りフィールド追加
          </button>
          <button class="btn btn-sm btn-success" type="button" v-on:click="lineFieldAppend">
            <i class="fas fa-plus"></i> 1行フィールド追加
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    values: Array,
    diluent_list: Object,
    method_list: Object,
    place_list: Object,
    film_thickness_unit_list: Object,
    errors_processes: Object,
    standard_options: Object,
    standard_value: Number,
    errors_standard_id: Object
  },
  data: function () {
    return {
      processes: (function (values) {
        if (values.length < 1) {
          return []
        } else {
          return values;
        }
      }(this.values)),
      p_large_list: [],
      standard_id: Number(this.standard_value),
      standard_id_class: (function (error) {
        if(error.length>0){
          return 'form-group row has-error';
        }
        return 'form-group row';
      }(this.errors_standard_id)),
    }
  },
  mounted() {
    this.fetchProductList(this.standard_value);
  },
  methods: {
    separatorFieldAppend: function () {
      this.$set(this.processes, this.processes.length, {
        field_type: 1,
        p_large_id: '',
        usage: '',
        dried_time: '',
        p_large_spec_diluent_id: '',
        dilution_rate: '',
        film_thickness: '',
        film_thickness_unit: '',
      })
    },
    lineFieldAppend: function () {
      this.$set(this.processes, this.processes.length, {
        field_type: 2,
        detail: ''
      })
    },
    deleteKey: function (index) {
      this.processes.splice(index, 1);
    },
    hasError: function (error) {
      if (error) {
        return 'form-group has-error';
      } else {
        return 'form-group';
      }
    },
    hasErrors: function (errors) {
      let result = errors.filter(function (error) {
        return error !== undefined;
      });
      if (result.length > 0) {
        return 'form-group has-error';
      }
      return 'form-group';
    },
    fetchProductList: function (standard_id) {
      axios.get('/api/fetch-product', {
        params: {
          standard_id: standard_id,
        }
      }).then((response) => {
        this.p_large_list = response.data;
      });
    },
    updateProcesses: function (data, index) {
      this.processes[index].p_large_id = Number(data);
    },
    updatePlaces: function (data, index) {
      this.processes[index].p_large_spec_place_ids = data.map(item => Number(item.id));
    },
    updateMethods: function (data, index) {
      this.processes[index].p_large_spec_painting_method_ids = data.map(item => Number(item.id));
    },
    getSelected(options, id) {
      var selected = options.filter(option => String(option.id) === String(id));
      if(selected.length === 1){
        return  selected[0];
      }
      return {id:'', value:''};
    },
    getOptions(obj) {
      const options = [];
      for (const [id, label] of Object.entries(obj)) {
        options.push({id, label});
      }
      return options;
    },
  }
}

</script>

<style scoped>
table th {
  font-size: 90%;
  vertical-align: middle;
}
</style>
