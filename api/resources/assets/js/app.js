
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

import Login from './views/Login'
import App from './views/App'
import Register from './views/Register'
import Menu from './views/FoodDescription'
import Employed from './views/Employed'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'register',
            component: Register,
            meta: {
                title: 'Enterprise Name'
            }
        },
        {
            path: '/Platillo',
            name: 'menu',
            component: Menu,
            meta: {
                title: 'Registro | Platillo'
            }
        },
        {
            path: '/Registrar-Empleado',
            name: 'employed',
            component: Employed,
            meta: {
                title: 'Registro | Empleado'
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
    next();
});

//Creacion del componente app
const app = new Vue({
    el: '#app',
    components: { App },
    router,
});