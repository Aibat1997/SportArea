<template>
  <div v-if="status">
    <div class="col-md-4 col-sm-4"></div>
    <div class="col-md-8 col-sm-8">
      <add-inventory></add-inventory>
      <form action="#">
        <div class="error-box" v-if="errors">
          <ul>
            <li v-for="(key,error) in errors">{{error}} : {{ key[0] }}</li>
          </ul>
        </div>
        <div class="error-box success-box" v-if="seccsess_msg">{{ seccsess_msg }}</div>
        <div class="new-object">
          <div class="new-object-head d-flex-justify">
            <h3>Объект</h3>
            <button class="btn-plain plus-blue" @click.prevent="submitForm">
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
                  @change="setImage"
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
                    <option v-for="item in type_coverages" :value="item.tc_id">{{ item.tc_name }}</option>
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
                <div class="dropdown">
                  <label class="dropdown-label">Инфраструктура</label>
                  <div class="dropdown-list">
                    <div class="checkbox">
                      <input
                        type="checkbox"
                        name="dropdown-group-all"
                        class="check-all checkbox-custom"
                        id="checkbox-main"
                      />
                      <label for="checkbox-main" class="checkbox-custom-label">
                        Выбрать
                        все
                      </label>
                    </div>
                    <div class="checkbox" v-for="item in infrastructures">
                      <input
                        type="checkbox"
                        v-model="court.infrastructury"
                        class="check checkbox-custom"
                        :id="'infra_' + item.inf_id"
                        :value="item.inf_id"
                      />
                      <label
                        :for="'infra_' + item.inf_id"
                        class="checkbox-custom-label"
                      >{{ item.inf_name }}</label>
                    </div>
                  </div>
                </div>
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
      </form>
      <form action="#">
        <div class="new-object" v-for="court in courts">
          <div class="error-box" v-if="created_errors">
            <ul>
              <li v-for="(key,error) in created_errors">{{error}} : {{ key[0] }}</li>
            </ul>
          </div>
          <div class="error-box success-box" v-if="created_seccsess_msg">{{ created_seccsess_msg }}</div>
          <div class="new-object-head d-flex-justify">
            <h3>{{ court.c_name }}</h3>
            <button class="btn-plain remove-object" @click.prevent="deleteCourt(court.c_id)">
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
                <input type="file" />
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
                <div class="dropdown">
                  <label class="dropdown-label">Инфраструктура</label>
                  <div class="dropdown-list">
                    <div class="checkbox">
                      <input
                        type="checkbox"
                        name="dropdown-group-all"
                        class="check-all checkbox-custom"
                        id="checkbox-main1"
                      />
                      <label for="checkbox-main1" class="checkbox-custom-label">
                        Выбрать
                        все
                      </label>
                    </div>
                    <div class="checkbox" v-for="item in infrastructures">
                      <input
                        type="checkbox"
                        v-model="court.infrastructury"
                        class="check checkbox-custom"
                        :id="'infra_' + item.inf_id"
                        :value="item.inf_id"
                      />
                      <label
                        :for="'infra_' + item.inf_id"
                        class="checkbox-custom-label"
                      >{{ item.inf_name }}</label>
                    </div>
                  </div>
                </div>
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
                <button class="btn-plain btn-blue" type="submit">Разместить</button>
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
    TheMask
  },
  data() {
    return {
      errors: null,
      seccsess_msg: "",
      created_errors: null,
      created_seccsess_msg: "",
      type_coverages: {},
      infrastructures: {},
      images: [],
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
    setImage(e) {
      // for (let i = 0; i < e.target.files.length; i++) {
      this.images = e.target.files;
      // }
    },
    async submitForm() {
      let formData = new FormData();

      _.forEach(
        this.court,
        await function(value, key) {
          formData.append(key, value);
        }
      );

      for (var i = 0; i < this.images.length; i++) {
        let file = this.images[i];
        formData.append("files[" + i + "]", file);
      }

      await axios
        .post("/store-court", formData, {
          headers: { "content-type": "multipart/form-data" }
        })
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
    },
    async deleteCourt(courtId) {
      await axios
        .post("/delete-court", {"id": courtId})
        .then(response => {
          this.setCourts();
        })
        .catch(error => {
          this.created_seccsess_msg = "";
          this.created_errors = error.response.data.errors;
        });
    },
    setCourts() {
      axios.get("/courts").then(response => {
        this.courts = response.data.courts;
      });
    }
  }
};
</script>