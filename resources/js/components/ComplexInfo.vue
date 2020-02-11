<template>
  <div v-if="status">
    <div class="row">
      <div class="col-md-4 col-sm-4"></div>
      <div class="col-md-8 col-sm-8">
        <add-inventory></add-inventory>
      </div>
    </div>
    <div class="row">
      <form action="#">
        <div class="error-box" v-if="errors">
          <ul>
            <li v-for="(key,error) in errors">{{error}} : {{ key[0] }}</li>
          </ul>
        </div>
        <div class="error-box success-box" v-if="seccsess_msg">{{ seccsess_msg }}</div>
        <div class="col-md-4 col-sm-4">
          <div class="images-cover">
            <div class="images-item" v-for="(file, index) in court.c_images">
              <img :src="file" />
              <button class="btn-plain delete-img" @click.prevent="removeImage(index)">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="new-object">
            <div class="new-object-head d-flex-justify">
              <h3>Объект</h3>
              <button class="btn-plain plus-blue" @click.prevent="submitForm(court)">
                Добавить объект
                <i class="fas fa-plus"></i>
              </button>
            </div>
            <div class="new-object-body">
              <div class="form-item-half d-flex-justify">
                <label class="f-item">
                  <input type="text" v-model="court.c_name" placeholder="Название объекта" />
                </label>
                <label class="file-cover">
                  <img src="/index/img/icon/upload.svg" alt />
                  Загрузить фотографии объекта
                  <input
                    type="file"
                    multiple
                    ref="files"
                    @change="setImage"
                    accept="image/*"
                  />
                </label>
              </div>
              <div class="form-item-half d-flex-justify">
                <div class="sidebar-item">
                  <label class="select-label select">
                    <select v-model="court.c_open_field">
                      <option value>Тип площадки</option>
                      <option value="1">Открытый</option>
                      <option value="0">Закрытый</option>
                    </select>
                    <i class="fas fa-chevron-down arrow-select"></i>
                  </label>
                </div>
                <div class="sidebar-item">
                  <label class="select-label select">
                    <select v-model="court.c_coverage_id">
                      <option value>Тип покрытия</option>
                      <option v-for="item in type_coverages" :value="item.tc_id">
                        {{ item.tc_name
                        }}
                      </option>
                    </select>
                    <i class="fas fa-chevron-down arrow-select"></i>
                  </label>
                </div>
              </div>
              <div class="form-item-half d-flex-justify">
                <label class="f-item">
                  <input type="number" v-model="court.c_cost" placeholder="Стоимость" />
                </label>
                <label class="f-item f-item-discount">
                  <input
                    type="number"
                    placeholder="Предоплата"
                    v-model="court.c_prepayment"
                    class="discount-price"
                  />
                  <div class="discount-price-cover d-flex">
                    <label class="checkbox-container">
                      <input type="radio" v-model="court.c_prepayment_type" value="1" />
                      <span class="checkmark">тг</span>
                    </label>
                    <label class="checkbox-container">
                      <input type="radio" v-model="court.c_prepayment_type" value="0" />
                      <span class="checkmark">%</span>
                    </label>
                  </div>
                </label>
              </div>
              <div class="form-item-half d-flex-justify">
                <div class="dropdown-checkbox">
                  <multiselect
                    v-model="court.infrastructury"
                    :options="infrastructures"
                    :multiple="true"
                    :close-on-select="false"
                    :clear-on-select="false"
                    :preserve-search="true"
                    placeholder="Выберите"
                    label="inf_name"
                    track-by="inf_name"
                    :preselect-first="false"
                  ></multiselect>
                </div>
                <label class="f-item">
                  <the-mask
                    mask="##x##"
                    :masked="true"
                    type="text"
                    v-model="court.c_area"
                    placeholder="Размер объекта"
                  />
                </label>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="row">
      <form action="#" v-for="(court,court_index) in courts">
        <div class="error-box" v-if="created_errors">
          <ul>
            <li v-for="(key,error) in created_errors">{{error}} : {{ key[0] }}</li>
          </ul>
        </div>
        <div class="error-box success-box" v-if="created_seccsess_msg">{{ created_seccsess_msg }}</div>
        <div class="col-md-4 col-sm-4">
          <div class="images-cover">
            <div class="images-item" v-for="(file, index) in court.c_images">
              <img :src="file" />
              <button class="btn-plain delete-img" @click.prevent="removeImage(index, court_index)">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-8">
          <div class="new-object">
            <div class="new-object-head d-flex-justify">
              <h3>{{ court.c_name }}</h3>
              <button class="btn-plain remove-object" @click.prevent="deleteCourt(court)">
                Удалить объект
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <div class="new-object-body">
              <div class="form-item-half d-flex-justify">
                <label class="f-item">
                  <input type="text" v-model="court.c_name" placeholder="Название объекта" />
                </label>
                <label class="file-cover">
                  <img src="/index/img/icon/upload.svg" alt />
                  Загрузить фотографии объекта
                  <input
                    type="file"
                    multiple
                    ref="files"
                    @change="setImage($event, court_index)"
                    accept="image/*"
                  />
                </label>
              </div>
              <div class="form-item-half d-flex-justify">
                <div class="sidebar-item">
                  <label class="select-label select">
                    <select v-model="court.c_open_field">
                      <option value="1">Открытый</option>
                      <option value="0">Закрытый</option>
                    </select>
                    <i class="fas fa-chevron-down arrow-select"></i>
                  </label>
                </div>
                <div class="sidebar-item">
                  <label class="select-label select">
                    <select v-model="court.c_coverage_id">
                      <option v-for="item in type_coverages" :value="item.tc_id">{{ item.tc_name }}</option>
                    </select>
                    <i class="fas fa-chevron-down arrow-select"></i>
                  </label>
                </div>
              </div>
              <div class="form-item-half d-flex-justify">
                <label class="f-item">
                  <input type="text" v-model="court.c_cost" placeholder="Стоимость" />
                </label>
                <label class="f-item f-item-discount">
                  <input
                    type="text"
                    v-model="court.c_prepayment"
                    placeholder="Предоплата"
                    class="discount-price"
                  />
                  <div class="discount-price-cover d-flex">
                    <label class="checkbox-container">
                      <input type="radio" v-model="court.c_prepayment_type" value="1" />
                      <span class="checkmark">тг</span>
                    </label>
                    <label class="checkbox-container">
                      <input type="radio" v-model="court.c_prepayment_type" value="0" />
                      <span class="checkmark">%</span>
                    </label>
                  </div>
                </label>
              </div>
              <div class="form-item-half d-flex-justify">
                <div class="dropdown-checkbox">
                  <multiselect
                    v-model="court.infrastructury"
                    :options="infrastructures"
                    :multiple="true"
                    :close-on-select="false"
                    :clear-on-select="false"
                    :preserve-search="true"
                    placeholder="Выберите"
                    label="inf_name"
                    track-by="inf_name"
                    :preselect-first="false"
                  ></multiselect>
                </div>
                <label class="f-item">
                  <the-mask
                    mask="##x##"
                    :masked="true"
                    type="text"
                    v-model="court.c_area"
                    placeholder="Размер объекта"
                  />
                </label>
              </div>
              <a href="objects-inside.html" class="btn-plain link-dashed">
                <img src="/index/img/icon/pen.svg" alt /> Редактировать
                время, дату, стоимость
              </a>
              <div class="form-item-half">
                <div class="btn-box">
                  <button class="btn-plain btn-blue" @click.prevent="editForm(court)">Разместить</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import AddInventoryVue from "./AddInventory.vue";
import { TheMask } from "vue-the-mask";

export default {
  components: {
    AddInventory: AddInventoryVue,
    TheMask,
    Multiselect: window.VueMultiselect.default
  },
  data() {
    return {
      errors: null,
      seccsess_msg: "",
      created_errors: null,
      created_seccsess_msg: "",
      type_coverages: {},
      infrastructures: [],
      courts: {},
      court: {
        c_name: "",
        infrastructury: [],
        c_images: [],
        c_open_field: "",
        c_coverage_id: "",
        c_cost: "",
        c_prepayment: 0,
        c_prepayment_type: 1,
        c_area: null
      }
    };
  },
  created() {
    axios.get("/helpers").then(response => {
      this.type_coverages = response.data.type_coverages;
      this.infrastructures = response.data.infrastructures;
    });
    this.setCourts();
  },
  computed: {
    status() {
      return this.$store.getters.status;
    }
  },
  methods: {
    async setImage(e, court_key = null) {
      let fileList = await Array.prototype.slice.call(e.target.files);
      await fileList.forEach(f => {
        if (!f.type.match("image.*")) {
          return;
        }
        let reader = new FileReader();
        let that = this;
        reader.onload = async function(e) {
          if (court_key != null) {
            await that.courts[court_key].c_images.push(e.target.result);
          } else {
            await that.court.c_images.push(e.target.result);
          }
        };
        reader.readAsDataURL(f);
      });
      this.$refs.files.value = "";
    },
    async removeImage(index, court_key = null) {
      if (court_key != null) {
        this.courts[court_key].c_images.splice(index, 1);
      } else {
        this.court.c_images.splice(index, 1);
      }
    },
    setCourts() {
      axios.get("/courts").then(response => {
        this.courts = response.data;
      });
    },
    submitForm(court) {
      this.sendForm("post", "/store-court", court);
    },
    editForm(court) {
      this.sendForm("put", "/update-court", court);
    },
    async deleteCourt(court) {
      this.sendForm("post", "/delete-court", court);
    },
    async sendForm(method, url, data) {
      await axios[method](url, data)
        .then(response => {
          this.seccsess_msg = response.data.message;
          this.errors = null;
          this.court = {};
          this.setCourts();
        })
        .catch(error => {
          this.seccsess_msg = "";
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>
