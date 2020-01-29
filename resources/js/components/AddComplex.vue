<template>
    <form action="#" id="addComplex">
        <div class="col-md-4 col-sm-4">
            <div class="profile-info-img">
                <img :src="form.image" id="blah" class="image-src" style="width: 100%;"/>
                <div class="label-file-cover">
                    <label class="label-file">
                        <i class="icon prof-plus"/>
                        <p>Выбрать обложку</p>
                        <input type="file" id="imgInp" @change="setImage"/>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-8">
            <div class="form-item-half d-flex-justify">
                <div class="sidebar-item">
                    <label class="select-label select">
                        <select v-model="form.city">
                            <option value="default">Выберите город</option>
                            <option v-for="city in cities" :value="city.city_id">{{ city.city_name }}</option>
                        </select>
                        <i class="fas fa-chevron-down arrow-select"/>
                    </label>
                </div>
                <div class="sidebar-item">
                    <label class="select-label select">
                        <select v-model="form.sport_type">
                            <option value="default">Вид спорта</option>
                            <option v-for="type in sport_types" :value="type.st_id">{{ type.st_name }}</option>
                        </select>
                        <i class="fas fa-chevron-down arrow-select"/>
                    </label>
                </div>
            </div>
            <div class="form-item-half d-flex-justify">
                <label class="f-item">
                    <input type="text" placeholder="Название" v-model="form.name"/>
                </label>
                <label class="f-item-icon">
                    <input type="text" placeholder="Адрес" v-model="form.address"/>
                    <i class="icon i-map"/>
                </label>
            </div>
            <div class="form-item-half d-flex-justify">
                <label class="icon-right object-icon-right">
                    <span>Начало работы в будние дни</span>
                    <i class="icon i-time"/>
                    <input
                        type="text"
                        class="single_time"
                        placeholder="Начало работы в будние дни"
                        v-model="form.time_weekday"
                    />
                </label>
                <label class="icon-right object-icon-right">
                    <span>Начало работы в выходние дни</span>
                    <i class="icon i-time"/>
                    <input
                        type="text"
                        class="single_time"
                        placeholder="Начало работы в выходние дни"
                        v-model="form.time_weekend"
                    />
                </label>
            </div>
            <div class="form-item-half d-flex-justify">
                <label class="f-item">
                    <input type="text" placeholder="Телефон" v-model="form.phone"/> <!--class="enter_phone" для маски-->
                </label>
                <div class="checkbox-cover">
                    <input
                        type="checkbox"
                        class="ios8-switch checkbox-attr"
                        id="checkbox-40"
                        v-model="form.show_phone"
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
                        v-model="form.accept_application"
                    />
                    <label for="checkbox-41">Прием заявок</label>
                </div>
                <div class="checkbox-cover">
                    <input
                        type="checkbox"
                        class="ios8-switch checkbox-attr"
                        id="checkbox-42"
                        v-model="form.close_complex"
                    />
                    <label for="checkbox-42">Закрыть комплекс</label>
                </div>
            </div>
            <div class="form-item-half d-flex-justify-end">
                <label class="f-item">
                    <textarea name cols="30" rows="10" placeholder="Описание" v-model="form.description"/>
                </label>
                <label class="date-label">
                    <button class="btn-plain btn-blue" @click.prevent="submitForm">Сохранить</button>
                </label>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        props: ['auth_id'],
        data () {
            return {
                form: {
                    city: 'default',
                    sport_type: 'default',
                    name: '',
                    address: '',
                    time_weekday: '',
                    time_weekend: '',
                    phone: '',
                    show_phone: false,
                    accept_application: false,
                    close_complex: false,
                    description: '',
                    user_id: this.auth_id,
                    sc_id: null,
                    image: '/index/img/default-uploader.png',
                },
                cities: {},
                sport_types: {},
            }
        },
        mounted () {
            axios.get('/api/helpers').then(response => {
                let data = response.data
                if (data.status) {
                    this.cities = data.content.cities
                    this.sport_types = data.content.sport_type
                    this.form.sc_id = data.content.last_id
                } else {
                    alert(data.message)
                }

            })
        },
        methods: {
            setImage (e) {
                this.form.image = e.target.files[0]
            },
            async submitForm () {
                let formData = new FormData()
                _.forEach(this.form, await function (value, key) {
                    formData.append(key, value)
                })
                await axios.post('/store-complex', formData, { headers: { 'content-type': 'multipart/form-data' } }).
                    then(function (response) {
                        console.log(response)
                    }).
                    catch(error => {
                        console.log(error)
                    })
            },
        },
    }
</script>
