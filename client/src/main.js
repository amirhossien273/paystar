import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store/store.js';


import './assets/main.css'

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"


fetch("../public/config.json")
.then((response) => response.json())
.then((config) => {
    window.config = config
    const app = createApp(App)
    app.use(router)
    app.use(store)
    app.mount('#app')
})
