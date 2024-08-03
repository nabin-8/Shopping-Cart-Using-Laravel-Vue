import { createApp } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import  'bootstrap-icons/font/bootstrap-icons.css'
import  'vue-toastification/dist/index.css'
import Toast from  'vue-toastification'
import './style.css'
import App from './App.vue'
import router from "./router/index.js";
import {createPinia} from "pinia";

const pinia=createPinia()
createApp(App)
    .use(router)
    .use(pinia)
    .use(Toast)
    .mount('#app')
