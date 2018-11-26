<template>
    <div class="container">
        <div class="row">
            <!-- Tabs Titles -->
            <!-- Icon -->
            <div class="col-md-12 ">
                <img src="http://pluspng.com/img-png/png-logo-design-fancy-png-logo-design-91-on-professional-logo-design-with-png-logo-design-734.png"
                    class="center resize" />
            </div>
        </div>
        <div class="row">
            <class class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="card-title">Login</h4>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="email" class="form-control" placeholder="Usuario" aria-describedby="helpId" v-model="usuario">
                        </div>

                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Constraseña" v-model="password">
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn center btn-primary" @click="login()">Ingresar</button>
                        </div>
                    </div>
                </div>
            </class>
        </div>
        <br>
    </div>
</template>

<script>
    export default {
	computed:{
		formData: function(){
			return {
				usuario: this.usuario,
				password: this.password
			}
		}
	},
	data(){
		return{
			password:null,
			usuario:null
		}
	},
	methods:{
		login(){

            this.$store.dispatch('login',this.formData).then(res => {
                if(this.$store.getters.isLoggedIn){
                    swal({
                        text:'Bienvenido',
                    onAfterClose:this.redirigir                     
                    }
                    )
                    console.log(this.$store.getters.authUser)                    
                }else{
                   swal({type: 'error',
  						title: 'Oops...',
                          text: '¡Hay algun error en el formulario,revisa los datos!'
  					})                     
                }
            }).catch(err => {
                   swal({type: 'error',
  						title: 'Oops...',
  						text: '¡Hay algun error en el formulario,revisa los datos!'
  					}) 
            })
        },
        redirigir(){
            // redirigir
            this.$router.push('/')
        }        
	}
}
</script>



<style type="text/css">
    .center {
        display: block;
        margin: 20px auto 20px auto;
    }

    .resize {
        width: 10vw;
        height: 20vh;
    }

</style>
