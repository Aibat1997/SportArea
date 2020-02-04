<template>
  <div v-if="status">
    <div class="col-md-4 col-sm-4"></div>
    <div class="col-md-8 col-sm-8">
      <add-inventory></add-inventory>
      <form action="#">
        <div class="new-object">
          <div class="new-object-head d-flex-justify">
            <h3>Объект 1</h3>
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
                    <option value="default">Тип площадки</option>
                    <option value="1">Открытый</option>
                    <option value="0">Закрытый</option>
                  </select>
                  <i class="fas fa-chevron-down arrow-select"></i>
                </label>
              </div>
              <div class="sidebar-item">
                <label class="select-label select">
                  <select v-model="court.c_coverage_id">
                    <option value="default">Тип покрытия</option>
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
            <a href="#" class="btn-plain link-dashed">
              <img src="/index/img/icon/pen.svg" alt /> Редактировать
              время, дату, стоимость
            </a>
          </div>
        </div>
      </form>
      <form action="#">
        <div class="new-object">
          <div class="new-object-head d-flex-justify">
            <h3>Объект 1</h3>
            <button class="btn-plain remove-object">
              Удалить объект
              <i class="fas fa-minus"></i>
            </button>
          </div>
          <div class="new-object-body">
            <div class="form-item-half d-flex-justify">
              <label class="f-item">
                <input type="text" placeholder="Название объекта" />
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
                  <select name="#">
                    <option value>Тип площадки</option>
                    <option value>Тип площадки 1</option>
                    <option value>Тип площадки 2</option>
                  </select>
                  <i class="fas fa-chevron-down arrow-select"></i>
                </label>
              </div>
              <div class="sidebar-item">
                <label class="select-label select">
                  <select name="#">
                    <option value>Тип покрытия</option>
                    <option value>Тип покрытия 1</option>
                    <option value>Тип покрытия 2</option>
                  </select>
                  <i class="fas fa-chevron-down arrow-select"></i>
                </label>
              </div>
            </div>
            <div class="form-item-half d-flex-justify">
              <label class="f-item">
                <input type="text" placeholder="Стоимость" />
              </label>
              <label class="f-item f-item-discount">
                <input type="text" placeholder="Предоплата" class="discount-price" />
                <div class="discount-price-cover d-flex">
                  <label class="checkbox-container">
                    <input type="radio" checked="checked" name="radio" />
                    <span class="checkmark">тг</span>
                  </label>

                  <label class="checkbox-container">
                    <input type="radio" name="radio" />
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

                    <div class="checkbox">
                      <input
                        type="checkbox"
                        name="dropdown-group"
                        class="check checkbox-custom"
                        id="checkbox-custom_011"
                      />
                      <label for="checkbox-custom_011" class="checkbox-custom-label">Тренер</label>
                    </div>

                    <div class="checkbox">
                      <input
                        type="checkbox"
                        name="dropdown-group"
                        class="check checkbox-custom"
                        id="checkbox-custom_021"
                      />
                      <label for="checkbox-custom_021" class="checkbox-custom-label">Освещение</label>
                    </div>

                    <div class="checkbox">
                      <input
                        type="checkbox"
                        name="dropdown-group"
                        class="check checkbox-custom"
                        id="checkbox-custom_031"
                      />
                      <label for="checkbox-custom_031" class="checkbox-custom-label">Трибуна</label>
                    </div>

                    <div class="checkbox">
                      <input
                        type="checkbox"
                        name="dropdown-group"
                        class="check checkbox-custom"
                        id="checkbox-custom_041"
                      />
                      <label for="checkbox-custom_041" class="checkbox-custom-label">Освещение</label>
                    </div>
                  </div>
                </div>
              </div>
              <label class="f-item">
                <input type="text" placeholder="Размер объекта" class="size-mask" />
              </label>
            </div>
            <a href="objects-inside.html" class="btn-plain link-dashed">
              <img src="/index/img/icon/pen.svg" alt /> Редактировать
              время, дату, стоимость
            </a>
            <div class="form-item-half d-flex-justify">
              <button class="btn-plain btn-greysub">
                <i class="fas fa-chevron-left"></i> Назад
              </button>
              <div class="btn-box d-flex-justify">
                <button class="btn-plain btn-redsub">Удалить объект</button>
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
      type_coverages: {},
      infrastructures: {},
      images: [],
      court: {
        c_name: "",
        // c_images: [],
        infrastructury: [],
        c_open_field: "default",
        c_coverage_id: "default",
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
      this.complex = response.data.complex;
    });
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
        .then(response => {})
        .catch(error => {
          this.seccsess_msg = "";
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>