<template>
	<div class="row">
		<form>
		  <div class="form-row">
		  	<div class="form-group col-md-3">
		    	<label>Nomina</label>
		    	<input type="text" class="form-control" v-model="nomina"><br>
		    </div>	
		   </div>
		<fieldset disabled class="watch" v-bind:class="{active: isFinded}">
		  <div class="form-row">
		    <div class="form-group col-md-6">
		    	<label>Nombre(s)</label>
		    	<input type="text" class="form-control" v-model="employed.nombre" placeholder="No registrado">
		    </div>
		    <div class="form-group col-md-6">
		    	<label>Apellido Paterno</label>
		    	<input type="text" class="form-control" v-model="employed.ap_materno" placeholder="No registrado">
		    </div>
		  </div>
		  <div class="form-group">
		    <label>Dirección</label>
		    <input type="text" class="form-control" v-model="employed.direccion" placeholder="No registrado">
		  </div>	
		  <div class="form-row">  
		   <div class="form-group col-md-6">
		      <label>Departamento</label>
		      <input class="form-control" v-model="description.nombre" placeholder="No registrado">
		   </div>
		   <div class="form-group col-md-2">
		   	<label>Tipo de empleado</label>
		    <input type="text" class="form-control" v-model="employed.empleado" placeholder="No registrado">
		   </div>
		  </div>
		</fieldset>
		</form>
		<button class="btn btn-primary" v-bind:class="{active: isFinded}" @click="setComida()">Solicitar Pedido</button>
		  
		</form>
	</div>
</template>

<script type="text/javascript">
    export default {
    	mixins:[],

    	computed:{
    		formData(){
    			return{
    				nomina: this.nomina,
    				// id_comida: this.id_comida,
					nomina: this.nomina,		
					comida: this.comida,			
    				isFinded: this.isFinded
    			}
    		}
    	},

    	watch:{
    		nomina:function(newValue){
    			if(this.nomina.length == 6){
    				this.getEmployed()
	    			this.getDescription()
                    // this.getDate()
	    			this.isFinded = false
    			}
    			else{
    				this.isFinded = true
    			}
    			//this.changeState()
    		},
    	},

    	data(){
    		return{
    			employed: [],
    			description: [],
    			nomina: '',
    			// food: [],
    			isFinded: true,
    			// today: '',
    			// id_comida: '1'
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
        	// getDish(){
        	// 	axios.get(`/api/comida/${this.id_comida}`).then(res => {
         //            this.food = res.data.data
         //        }).catch(err => {
         //            console.log(err)
         //        })
        	// },
        	// changeState(){
        	// 	if(this.nomina == ''){
        	// 		this.isFinded = true
        	// 	}
        	// 	else{
        	// 		this.isFinded = false
        	// 	}
        	// },
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
                    swal('Completado',
                         'Se ha registrado el pedido',
                         'success')
                }).catch(err =>{
                    swal({type: 'error',
  						title: 'Oops...',
  						text: '¡Hay algun error en el formulario,revisa los datos!'
  					})
				})
			}
        },

        mounted(){
        	// this.getDish()
        	// this.getDate()
			
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