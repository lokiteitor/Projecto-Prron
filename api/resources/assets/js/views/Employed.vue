<template>
	<div class="row">
		<form>
		  <div class="form-row">
		  	<div class="form-group col-md-3">
		    	<label>Nomina</label>
		    	<input type="text" class="form-control" v-model="nomina">
		    </div>
		   </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		    	<label>Nombre(s)</label>
		    	<input type="text" class="form-control" v-model="nombre">
		    </div>
		    <div class="w-100"></div>
		    <div class="form-group col-md-6">
		    	<label>Apellido Paterno</label>
		    	<input type="text" class="form-control" v-model="ap_paterno">
		    </div>
		    <div class="w-100"></div>
		    <div class="form-group col-md-6">
		    	<label>Apellido Materno</label>
		    	<input type="text" class="form-control" v-model="ap_materno">
		    </div>
		  </div>
		  <div class="form-group">
		    <label>Dirección</label>
		    <input type="text" class="form-control" v-model="direccion">
		  </div>	
		  <div class="form-row">  
		   <div class="form-group col-md-2">
		      <label>Departamento</label>
		      <input type="text" class="form-control" v-model="id_departamento">
		   </div>
		   <div class="form-group col-md-2">
		   	<label>Tipo de empleado</label>
		      <select class="custom-select" v-model="tipo_empleado">
				  <option value="confianza">Confianza</option>
				  <option value="operario">Operario</option>
			  </select>
		   </div>
		   <div class="w-100"></div>
		   <div class="form-group col-md-4">
		      <label>Sueldo</label>
		      <input type="text" class="form-control" v-model="sueldo">
		   </div>
		  </div>
<<<<<<< HEAD
=======
		  
>>>>>>> f59bae723796ca10fd6a5be9facf17c27e791d10
		</form>
		<button class="btn btn-primary" @click="sendEmployed()">Registrar Empleado</button>
	</div>
</template>

<script type="text/javascript">
	export default {
    	mixins:[],

    	computed:{
    		formData:function(){
    			return{
    				nomina: this.nomina,
    				nombre: this.nombre,
    				ap_paterno: this.ap_paterno,
    				ap_materno: this.ap_materno,
    				direccion: this.direccion,
    				id_departamento: this.departamento,
    				tipo_empleado: this.tipo_empleado,
    				sueldo: this.sueldo
    			}
    		}
    	},

    	watch:{
    		
    	},

    	data(){
    		return{
    			nomina: null,
				nombre: null,
				ap_paterno: null,
				ap_materno: null,
				direccion: null,
				id_departamento: null,
				tipo_empleado: null,
				sueldo: null
    		}
    	},

        methods:{
        	sendEmployed() {				
				axios({
				method: 'post',
				url: '/api/empleado',
				responseType: 'json',
				data: {
    				nomina: this.nomina,
    				nombre: this.nombre,
    				ap_paterno: this.ap_paterno,
    				ap_materno: this.ap_materno,
    				direccion: this.direccion,
    				departamento: this.id_departamento,
    				tipo: this.tipo_empleado,
    				sueldo: this.sueldo					
				}
				}).then(res =>{
                    alert("Empleado registrado")
                }).catch(err =>{
                    alert(err)
				})		


                this.nomina = '',
				this.nombre = '',
				this.ap_paterno = '',
				this.ap_materno = '',
				this.direccion = '',
				this.id_departamento = '',
				this.tipo_empleado = '',
				this.sueldo = ''

				return false;
            }
        }

    }
</script>

<style type="text/css" scoped>
	form{
		width: 80vw;
	}
</style>