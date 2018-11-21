<template>
	<div class="row">
		<form>
		  <div class="form-row">
		  	<div class="form-group col-md-3">
		    	<label>Nomina</label>
		    	<input type="text" class="form-control" v-model="nomina"><br>
		    </div>
		   </div>
		<fieldset disabled>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		    	<label>Nombre(s)</label>
		    	<input type="text" class="form-control">
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
		  <button class="btn btn-primary">Solicitar Pedido</button>
		</form>
	</div>
</template>

<script type="text/javascript">
    export default {
    	mixins:[],

    	computed:{
    		formData(){
    			return{
    				nomina: this.nomina
    			}
    		}
    	},

    	watch:{
    		nomina:function(newValue){
    			this.getEmployed()
    			this.getDescription()
    		}
    	},

    	data(){
    		return{
    			employed: [],
    			description: [],
    			nomina: ''
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
</style>