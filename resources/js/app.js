require('./bootstrap')
window.Vue = require('vue')

import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Shared components
let layout = Vue.component('shops-app', require('./components/ShopsComponent.vue').default)
let navbar = Vue.component('navbar-component', require('./components/shared/NavbarComponent.vue').default)
// Pages
let HomePage = Vue.component('all-shops-page', require('./components/pages/AllShopsComponent.vue').default)
let prefredPage = Vue.component('preferred-shops-page', require('./components/pages/PreferredShopsComponent.vue').default)

// Routes
const routes = [{
        path: '/',
        component: HomePage
    },
    {
        path: '/preferred-shops',
        component: prefredPage
    }
]

const router = new VueRouter({
    routes
})

const app = new Vue({
    el: '#app',
    router
});