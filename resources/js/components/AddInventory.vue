<template>
  <div>
    <!-- Showed -->
    <form>
      <div class="form-item-half d-flex-justify-start">
        <div class="edit-cover">
          <a
            href="#tab-4"
            data-toggle="tab"
            class="btn-plain add-call invent-add"
            @click="clearInventory"
          >
            <img src="/index/img/icon/plus-grey.png" />Добавить инвентар
          </a>
        </div>
        <label class="date-label" v-if="inventories">
          <div class="new-invent" v-for="inventory in inventories">
            <div class="checkbox-cover d-flex-justify">
              <input
                type="checkbox"
                class="ios8-switch checkbox-attr"
                :id="inventory.inv_id"
                v-model="inventory.inv_is_active"
                @change="activateInventory(inventory)"
              />
              <label :for="inventory.inv_id"></label>
              <p>
                {{ inventory.inv_name }} -
                <span>{{ inventory.inv_cost }}</span>
              </p>
              <button class="btn-plain invent-edit" @click="editInventory(inventory)">
                <i class="icon book-edit"></i>
              </button>
            </div>
          </div>
        </label>
      </div>
    </form>

    <!-- Don't showed -->
    <div class="question-popup add-invent-modal">
      <div class="question-popup-head d-flex-justify">
        <h3>Добавить инвентар</h3>
        <button class="btn-plain close-popup">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <form>
        <div class="error-box" v-if="errors">
          <ul>
            <li v-for="(key,error) in errors">{{error}} : {{ key[0] }}</li>
          </ul>
        </div>
        <div class="error-box success-box" v-if="seccsess_msg">{{ seccsess_msg }}</div>
        <div class="inventar-label d-flex">
          <input
            type="text"
            placeholder="Название"
            v-model="inventory.inv_name"
            class="input-attr invent-text"
          />
          <label class="price-current">
            <input type="number" placeholder="Цена" v-model="inventory.inv_cost" class="input-attr" />
            <i class="icon i-tg"></i>
          </label>
        </div>
        <button class="btn-plain btn-blue" @click.prevent="sendNew">Сохранить</button>
      </form>
    </div>
    <div class="question-popup edit-invent-modal">
      <div class="question-popup-head d-flex-justify">
        <h3>Редактировать инвентар</h3>
        <button class="btn-plain close-popup">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <form>
        <div class="error-box" v-if="errors">
          <ul>
            <li v-for="(key,error) in errors">{{error}} : {{ key[0] }}</li>
          </ul>
        </div>
        <div class="error-box success-box" v-if="seccsess_msg">{{ seccsess_msg }}</div>
        <div class="inventar-label d-flex">
          <div class="checkbox-cover">
            <input
              type="checkbox"
              class="ios8-switch checkbox-attr"
              v-model="inventory.inv_is_active"
              id="checkbox-106"
            />
            <label for="checkbox-106"></label>
            <input
              type="text"
              placeholder="Инвентар"
              v-model="inventory.inv_name"
              class="input-attr"
            />
          </div>
          <label class="price-current">
            <input type="text" placeholder="Цена" v-model="inventory.inv_cost" class="input-attr" />
            <i class="icon i-tg"></i>
          </label>
        </div>
        <div class="inventar-label d-flex">
          <button class="btn-plain btn-blue" @click.prevent="updateCurrentInventory">Сохранить</button>
        </div>
      </form>
    </div>
    <div class="overlay"></div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      inventories: [],
      errors: null,
      seccsess_msg: "",
      inventory: {
        inv_id: null,
        inv_name: "",
        inv_cost: 0,
        inv_is_active: false
      }
    };
  },
  created() {
    axios.get("/inventory").then(response => {
      this.inventories = response.data;
    });
  },
  methods: {
    clearInventory() {
      this.inventory = {};
      this.seccsess_msg = "";
      this.errors = null;
    },
    editInventory(element) {
      this.inventory = element;
      this.seccsess_msg = "";
      this.errors = null;
    },
    sendNew() {
      this.postInventory("/store-inventory", this.inventory);
    },
    activateInventory(inventory) {
      this.postInventory("/update-inventory", inventory);
    },
    updateCurrentInventory() {
      this.postInventory("/update-inventory", this.inventory);
    },
    postInventory(url, value) {
      axios
        .post(url, value)
        .then(response => {
          this.inventories = response.data.content;
          this.seccsess_msg = response.data.message;
          this.errors = null;
        })
        .catch(error => {
          this.seccsess_msg = "";
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>
<style>
.error-box {
  background-color: #e43027;
  color: white;
  padding: 15px;
  border-radius: 5px;
  margin-bottom: 20px;
}
.error-box ul li {
  color: white;
  font-size: 14px;
  margin-bottom: 3px;
}
.edit-invent-modal {
  left: 0;
}
.edit-invent-modal .checkbox-cover {
  background: #ffffff;
  border: none;
  -webkit-border-radius: 3px;
  border-radius: 3px;
  margin-bottom: 0;
  padding: 0;
  width: 49%;
}
</style>   