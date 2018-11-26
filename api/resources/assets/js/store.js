import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

// aqui guardamos y manipulamos los tokens
export default new Vuex.Store({
    state:{
        status: '',
        token: localStorage.getItem('token') || '',
        usuario: {}
    },
    mutations:{
        auth_request(state){
            state.status = 'cargando'
        },
        auth_success(state,token,usuario){
            state.status = 'Autorizado'
            state.token = token
            state.usuario = usuario
        },
        auth_error(state){
            state.store = 'error'
        },
        logout(state){
            state.status = ''
            state.token = ''
        }

    },
    actions: {
        // esta accion nos loguea
        login({commit},usrdata) {
            return new Promise((resolve,reject) => {
                // cambiamos el estado
                commit('auth_request')
                axios.get('/api/login',{params:usrdata}).then(res => {
                    // actualizar
                    const token = res.data.token
                    const user = usrdata.usuario
                    localStorage.setItem('token',token)
                    // TODO : usar este header en vez del request
                    axios.defaults.headers.common['Authorization'] = token
                    commit('auth_success',token,user)
                    /// esto que hace ?
                    resolve(res)
        
                }).catch(err => {
                    commit('auth_error')
                    localStorage.removeItem('token')
                    reject(err)
                })
            })
        },
        // esta accion nos saca
        logout({commit}){
            return new Promise((resolve,reject) => {
                localStorage.removeItem('token')
                delete axios.defaults.headers.common('Authorization')
                resolve()
            })
        }                
    },
    getters: {
        isLoggedIn: state => !!state.token,
        authStatus: state => state.status
    }
});




