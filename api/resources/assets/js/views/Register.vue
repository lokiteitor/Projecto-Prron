<template>
	<div class="row">
		<form>
		  <div class="form-row">
		  	<div class="form-group col-md-3">
		    	<label>Nomina</label>
		    	<input type="text" class="form-control" v-model="nomina"><br>
		    </div>
		    <!-- <div class="form-group col-md-3">
		    	<label>Platillo del día</label>
		    	<input type="text" class="form-control" readonly v-model="food.nombre" id="DATE"><br>
		    </div> -->
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
		      <textarea class="form-control" v-model="description.descripcion"></textarea>
		   </div>
		   <div class="form-group col-md-2">
		   	<label>Tipo de empleado</label>
		    <input type="text" class="form-control" v-model="employed.empleado">
		   </div>
		  </div>
		</fieldset>
		</form>
		<button class="btn btn-primary" v-bind:class="{active: isFinded}">Solicitar Pedido</button>
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
    				isFinded: this.isFinded
    			}
    		}
    	},

    	watch:{
    		nomina:function(newValue){
    			this.getEmployed()
    			this.getDescription()
    			this.changeState()
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
        	// getDate(){
        	// 	this.today = new Date().toJSON().slice(0,10)
        	// 	document.getElementById("DATE").value = this.today
        	// },
        	changeState(){
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