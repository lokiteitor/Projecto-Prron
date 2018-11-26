
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//Importación de los componentes de Vue 

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Mensual from './views/Mensual'
import App from './views/App'
import Register from './views/Register'
import Menu from './views/FoodDescription'
import Employed from './views/Employed'
import Login from './views/Login'

import store from './store'
import Axios from 'axios'

Vue.prototype.$http = Axios;
Vue.prototype.$store = store;
const token = localStorage.getItem('token')
if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = token
}

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'register',
            component: Register,
            meta: {
                title: 'Enterprise Name',
                requiresAuth: true
            }
        },
        {
            path: '/Platillo',
            name: 'menu',
            component: Menu,
            meta: {
                title: 'Registro | Platillo',
                requiresAuth: true
            }
        },
        {
            path: '/Registrar-Empleado',
            name: 'employed',
            component: Employed,
            meta: {
                title: 'Registro | Empleado',
                requiresAuth: true
            }
        },
        {
            path: '/Reportes',
            name: 'reportes',
            component: Mensual,
            meta: {
                title: 'Reportes | Enterprise',
                requiresAuth: true
            }
        },
        {
            path: '/Ingresar',
            name: 'login',
            component: Login,
            meta: {
                title: 'Ingresar | Enterprise'
            }
        }
    ],
});


//Condicion para colocar el titulo de cada pagina
router.beforeEach((to, from, next) => {
    document.title = _.defaultTo(to.meta.title, '');
    if(to.matched.some(record => record.meta.requiresAuth)){
        if(store.getters.isLoggedIn){
            next()            
        }
        else{
            next('/Ingresar')
            
        }
    }
    else{
        next()
    }
});

//Creacion del componente app
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

Vue.prototype.$router = router