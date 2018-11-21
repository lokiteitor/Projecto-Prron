<template>
	<div class="row">
		<form>
		  <div class="form-row">
		  	<div class="form-group col-md-3">
		    	<label>Nomina</label>
		    	<input type="text" class="form-control">
		    </div>
		   </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		    	<label>Nombre(s)</label>
		    	<input type="text" class="form-control">
		    </div>
		    <div class="form-group col-md-6">
		    	<label>Apellido Paterno</label>
		    	<input type="text" class="form-control">
		    </div>
		  </div>
		  <div class="form-group">
		    <label>Dirección</label>
		    <input type="text" class="form-control">
		  </div>	
		  <div class="form-row">  
		   <div class="form-group col-md-2">
		      <label>Departamento</label>
		      <input type="text" class="form-control">
		   </div>
		   <div class="form-group col-md-2">
		   	<label>Tipo de empleado</label>
		      <select class="custom-select">
				  <option value="1">One</option>
				  <option value="2">Two</option>
			  </select>
		   </div>
		  </div>
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

    	data(){
    		return{
    			employed: [],
    			nomina: '998921'
    		}
    	},

        methods:{
        	getEmployed(){
        		 axios.get('/api/empleado/${this.nomina}/registros').then(res => {
                    this.employed = res.data
                }).catch(err => {
                    console.log(err)
                })
        	}
        },

        created(){
        	this.getEmployed()
        },

        mounted(){
        	this.getEmployed()
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