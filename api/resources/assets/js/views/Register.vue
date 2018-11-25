<template>
	<div class="row">
		<form>
		  <div class="form-row">
		  	<div class="form-group col-md-3">
		    	<label>Nomina</label>
		    	<input type="text" class="form-control" v-model="nomina"><br>
		    </div>
<<<<<<< HEAD
		    <!-- <div class="form-group col-md-3">
		    	<label>Platillo del día</label>
		    	<input type="text" class="form-control" readonly v-model="food.nombre" id="DATE"><br>
		    </div> -->
=======
		  	<div class="form-group col-md-3">
		    	<label>Comida</label>
		    	<input type="text" class="form-control" v-model="comida"><br>
		    </div>			

>>>>>>> f59bae723796ca10fd6a5be9facf17c27e791d10
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
<<<<<<< HEAD
		</form>
		<button class="btn btn-primary" v-bind:class="{active: isFinded}">Solicitar Pedido</button>
=======
		  
		</form>
		<button class="btn btn-primary" @click="setComida()">Solicitar Pedido</button>
>>>>>>> f59bae723796ca10fd6a5be9facf17c27e791d10
	</div>
</template>

<script type="text/javascript">
    export default {
    	mixins:[],

    	computed:{
    		formData(){
    			return{
<<<<<<< HEAD
    				nomina: this.nomina,
    				// id_comida: this.id_comida,
=======
					nomina: this.nomina,		
					comida: this.comida,			
>>>>>>> f59bae723796ca10fd6a5be9facf17c27e791d10
    				isFinded: this.isFinded
    			}
    		}
    	},

    	watch:{
    		nomina:function(newValue){
    			this.getEmployed()
<<<<<<< HEAD
    			this.getDescription()
    			this.changeState()
=======
				this.getDescription()
    			//this.changeState()
>>>>>>> f59bae723796ca10fd6a5be9facf17c27e791d10
    		},
    	},

    	data(){
    		return{
    			employed: [],
    			description: [],
<<<<<<< HEAD
    			nomina: '',
    			// food: [],
    			isFinded: true,
    			// today: '',
    			// id_comida: '1'
=======
				nomina: '',
				comida: '',
    			isFinded: false
>>>>>>> f59bae723796ca10fd6a5be9facf17c27e791d10
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
        	// getDate(){
        	// 	this.today = new Date().toJSON().slice(0,10)
        	// 	document.getElementById("DATE").value = this.today
        	// },
        	changeState(){
<<<<<<< HEAD
        		if(this.nomina == ''){
        			this.isFinded = true
        		}
        		else{
        			this.isFinded = false
        		}
        	}
        },

        mounted(){
        	// this.getDish()
        	// this.getDate()
=======
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
>>>>>>> f59bae723796ca10fd6a5be9facf17c27e791d10
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