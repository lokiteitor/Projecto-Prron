<template>
    <div class="container">
    <div class="row" v-if="isLoggedIn">
        <div class="col col-lg-2">
            <img src="http://pluspng.com/img-png/png-logo-design-fancy-png-logo-design-91-on-professional-logo-design-with-png-logo-design-734.png" class="resize" />
        </div>
        <div class="col-md">
            <h1 class="title">Nombre de la empresa</h1>
        </div>
    </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" v-if="isLoggedIn">
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item" v-if="isLoggedIn">
                <router-link :to="{ name: 'register' }" class="nav-link">Consumo</router-link> 
              </li>
              <li class="nav-item dropdown" v-if="isLoggedIn">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Registro
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" v-if="isLoggedIn">
                  <router-link :to="{ name: 'employed' }" class="dropdown-item">
                  Empleado</router-link>
                  <div class="dropdown-divider"></div>
                  <router-link :to="{ name: 'menu' }" class="dropdown-item">Comida</router-link>
                </div>
              </li>
              <li class="nav-item" v-if="isLoggedIn">
                <router-link :to="{ name: 'reportes' }" class="nav-link">Reportes</router-link> 
              </li>
            </ul>
            <ul class="nav justify-content-end">
                <li class="nav-item" v-if="isLoggedIn" >
                    <a class="nav-link" @click="logout">Logout</a>
                </li>
            </ul>
          </div>
        </nav>

        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {
        computed: {
            isLoggedIn : function(){ return this.$store.getters.isLoggedIn}
        },
        methods: {
        logout: function () {
            this.$store.dispatch('logout')
            .then(() => {
            this.$router.push('/Ingresar')
            }).catch(err => {
                console.log(err)
            })
        }
        },        
        
    }
</script>

<style type="text/css" scoped>
    .nav-link{
        color:white !important;
        border-radius: 5px;
        height: 50px;
        width: 100px;
        padding-top: 12px;
        text-align: center;
    }
    .nav-link:hover{
        background-color:black;
    }
    .navbar{
        height: 50px;
        border: 2px;
        border-radius: 5px;
        padding: 0;
    }
    .resize{
        width: 10vw;
        height: 20vh;
    }
    .title{
        padding: 30px 0 0 0;
    }
    .row{
        padding: 20px;
    }
    .dropdown-menu{
        background-color: white;
    }
    .dropdown-item{
        color: black;
    }
    .dropdown-item:hover{
        color: #008CEE;
    }
    .dropdown-item:active{
        color: white;
    }
</style>