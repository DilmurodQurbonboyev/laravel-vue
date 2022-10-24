require('./bootstrap');

import { createApp } from "vue";
import App from './App.vue';
import router from '../js/routes/index'
import i18n from '../js/i18n'

createApp(App)
    .use(i18n)
    .use(router)
    .mount('#app');
