<template>
	<div class="row">
		<form>
		  <div class="form-row">
		  	<div class="form-group col-md-3">
		    	<label>Nomina</label>
		    	<input type="text" class="form-control" v-model="nomina"><br>
		    </div>
		  	<div class="form-group col-md-3">
		    	<label>Comida</label>
		    	<input type="text" class="form-control" v-model="comida"><br>
		    </div>			

		   </div>
		<fieldset disabled class="watch" v-bind:class="{active: isFinded}">
		  <div class="form-row">
		    <div class="form-group col-md-6">
		    	<label>Nombre(s)</label>
		    	<input type="text" class="form-control" v-model="employed.nombre">
		    </div>
		    <div class="form-group col-md-6">
		    	<label>Apellido Paterno</label>
		    	<input type="text" class="form-control" v-model="employed.ap_materno">
		    </div>
		  </div>
		  <div class="form-group">
		    <label>Dirección</label>
		    <input type="text" class="form-control" v-model="employed.direccion">
		  </div>	
		  <div class="form-row">  
		   <div class="form-group col-md-6">
		      <label>Departamento</label>
		      <input class="form-control" v-model="description.nombre" >
		   </div>
		   <div class="form-group col-md-2">
		   	<label>Tipo de empleado</label>
		    <input type="text" class="form-control" v-model="employed.empleado">
		   </div>
		  </div>
		</fieldset>
		  
		</form>
		<button class="btn btn-primary" @click="setComida()">Solicitar Pedido</button>
	</div>
</template>

<script type="text/javascript">
    export default {
    	mixins:[],

    	computed:{
    		formData(){
    			return{
					nomina: this.nomina,		
					comida: this.comida,			
    				isFinded: this.isFinded
    			}
    		}
    	},

    	watch:{
    		nomina:function(newValue){
    			this.getEmployed()
				this.getDescription()
    			//this.changeState()
    		},
    	},

    	data(){
    		return{
    			employed: [],
    			description: [],
				nomina: '',
				comida: '',
    			isFinded: false
    		}
    	},

        methods:{
        	getEmployed(){
           		axios.get(`/api/empleado/${this.nomina}`).then(res => {
                    this.employed = res.data.data
                }).catch(err => {
                    console.log(err)
                })
        	},
        	getDescription(){
           		axios.get(`/api/empleado/${this.nomina}`).then(res => {
                    this.description = res.data.data.departamento
                }).catch(err => {
                    console.log(err)
                })
        	},
        	changeState(){
        		this.isFinded =! this.isFinded
			},
			setComida(){
				axios({
				method: 'post',
				url: '/api/registro',
				responseType: 'json',
				data: {
					comida: this.comida,
					nomina: this.nomina
				}
				}).then(res =>{
                    alert("Comida registrado")
                }).catch(err =>{
                    alert(err)
				})
			}
        }

    }


</script>

<style type="text/css" scoped>
	.row{
		padding-top: 20px;
	}
	form{
		width: 80vw;
	}
	.active{
		display: none !important;
	}
	.watch{
		display: block;
	}
</style>