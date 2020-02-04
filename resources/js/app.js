require('./bootstrap');

window.Vue = require('vue');
window.Vuex = require('vuex');
import StoreData from './store';

Vue.use(Vuex);
const store = new Vuex.Store(StoreData);

Vue.component('add-complex', require('./components/AddComplex.vue').default);
Vue.component('complex-information', require('./components/ComplexInfo.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
});
