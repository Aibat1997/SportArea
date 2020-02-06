<template>
  <form action="#" @submit.prevent="submitForm">
    <div class="col-md-4 col-sm-4">
      <div class="profile-info-img">
        <img :src="image_url == null ? complex.sc_image : image_url" style="width: 100%;" />
        <div class="label-file-cover">
          <label class="label-file">
            <i class="icon prof-plus"></i>
            <p>Выбрать обложку</p>
            <input type="file" @change="setImage" />
          </label>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-sm-8">
      <div class="error-box" v-if="errors">
        <ul>
          <li v-for="(key,error) in errors">{{error}} : {{ key[0] }}</li>
        </ul>
      </div>
       <div class="error-box success-box" v-if="seccsess_msg">
        {{ seccsess_msg }}
      </div>
      <div class="form-item-half d-flex-justify">
        <div class="sidebar-item">
          <label class="select-label select">
            <select v-model="complex.sc_city_id">
              <option value="default">Выберите город</option>
              <option v-for="city in cities" :value="city.city_id">{{ city.city_name }}</option>
            </select>
            <i class="fas fa-chevron-down arrow-select"></i>
          </label>
        </div>
        <div class="sidebar-item">
          <label class="select-label select">
            <select v-model="complex.sc_sport_type_id">
              <option value="default">Вид спорта</option>
              <option v-for="type in sport_types" :value="type.st_id">{{ type.st_name }}</option>
            </select>
            <i class="fas fa-chevron-down arrow-select"></i>
          </label>
        </div>
      </div>
      <div class="form-item-half d-flex-justify">
        <label class="f-item">
          <input type="text" placeholder="Название" v-model="complex.sc_name" />
        </label>
        <label class="f-item-icon">
          <input type="text" placeholder="Адрес" v-model="complex.sc_addres" />
          <i class="icon i-map"></i>
        </label>
      </div>
      <div class="form-item-half d-flex-justify">
        <label class="icon-right object-icon-right">
          <span>Начало работы в будние дни</span>
          <i class="icon i-time"></i>
          <the-mask
            mask="##:## - ##:##"
            :masked="true"
            type="text"
            class="single_time"
            v-model="complex.sc_work_time_weekday"
            placeholder="Начало работы в будние дни"
          />
        </label>
        <label class="icon-right object-icon-right">
          <span>Начало работы в выходние дни</span>
          <i class="icon i-time"></i>
          <the-mask
            mask="##:## - ##:##"
            :masked="true"
            type="text"
            class="single_time"
            v-model="complex.sc_work_time_weekend"
            placeholder="Начало работы в выходние дни"
          />
        </label>
      </div>
      <div class="form-item-half d-flex-justify">
        <label class="f-item">
          <the-mask
            mask="+7 (###) ###-##-##"
            :masked="true"
            type="text"
            v-model="complex.sc_phone"
            placeholder="Телефон"
          />
        </label>
        <div class="checkbox-cover">
          <input
            type="checkbox"
            class="ios8-switch checkbox-attr"
            id="checkbox-40"
            v-model="complex.sc_show_phone"
          />
          <label for="checkbox-40">Скрыть номер телефона</label>
        </div>
      </div>
      <div class="form-item-half d-flex-justify">
        <div class="checkbox-cover">
          <input
            type="checkbox"
            class="ios8-switch checkbox-attr"
            id="checkbox-41"
            v-model="complex.sc_accept_applications"
          />
          <label for="checkbox-41">Прием заявок</label>
        </div>
        <div class="checkbox-cover">
          <input
            type="checkbox"
            class="ios8-switch checkbox-attr"
            id="checkbox-42"
            v-model="complex.sc_is_closed"
          />
          <label for="checkbox-42">Закрыть комплекс</label>
        </div>
      </div>
      <div class="form-item-half d-flex-justify-end">
        <label class="f-item">
          <textarea name cols="30" rows="10" placeholder="Описание" v-model="complex.sc_description"></textarea>
        </label>
        <label class="date-label">
          <button class="btn-plain btn-blue">Сохранить</button>
        </label>
      </div>
    </div>
  </form>
</template>

<script>
import { TheMask } from "vue-the-mask";

export default {
  components: { TheMask },
  data() {
    return {
      cities: {},
      sport_types: {},
      seccsess_msg: '',
      image_url: null,
      errors: null,
      complex:{},
    };
  },
  created() {
    axios.get("/helpers").then(response => {
      this.cities = response.data.cities;
      this.sport_types = response.data.sport_type;
      this.$store.commit('changeStatus', response.data.status);
      this.complex = response.data.complex;
    });
  },
  methods: {
    setImage(e) {
      this.complex.sc_image = e.target.files[0];
      this.image_url = URL.createObjectURL(this.complex.sc_image);
    },
    async submitForm() {
      let formData = new FormData();

      _.forEach(
        this.complex,
        await function(value, key) {
          formData.append(key, value);
        }
      );

      await axios
        .post("/store-complex", formData, {headers: {"content-type": "multipart/form-data"}})
        .then(response => {
          console.log(response);
          this.$store.commit('changeStatus', response.data.status);
          this.seccsess_msg = response.data.message;
          this.errors = null;
        })
        .catch(error => {
          this.seccsess_msg = '';
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>
<style>
.error-box{
  background-color: #E43027;
  color: white;
  padding: 15px;
  border-radius: 5px;
  margin-bottom: 20px;
}
.error-box ul li{
  color: white;
  font-size: 14px;
  margin-bottom: 3px;
}
.success-box{
    background-color: #dff0d8!important;
     color: #3c763d!important;
}
.success-box ul li{
  color: #3c763d!important;
}
</style>   