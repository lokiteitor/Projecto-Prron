<template>
	<div class="row">
		<div class="col-md-6">
			<form>
			  <div class="form-row">
			  	<div class="form-group col-md-8">
			    	<label>Nombre del platillo</label>
			    	<input type="text" class="form-control" v-model="nombre">
			    </div>
			   </div>
			  <div class="form-row">
			    <div class="form-group col-md-12">
			    	<label>Descripcion</label>
			    	<textarea class="form-control" v-model="descripcion"></textarea>
			    </div>
			  </div>
			  <div class="form-row">
			  	<div class="form-group col-md-4">
			    	<label>Costo</label>
			    	<input type="text" class="form-control" v-model="costo">
			    </div>
			   </div>
			</form>
		<button class="btn btn-primary" @click="sendDish()">Registrar Platillo</button>
		</div>
		<div class="card" style="width: 30rem;">
		  <img class="card-img-top" src="https://amp.thisisinsider.com/images/5ad792ffbd967146008b45d9-750-562.jpg" alt="Card image cap">
		  <div class="card-body">
		    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
		  </div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
    	mixins:[],

    	computed:{
    		formData:function(){
    			return{
    				nombre: this.nombre,
    				descripcion: this.descripcion,
    				costo: this.costo
    			}
    		}
    	},

    	watch:{
    		
    	},

    	data(){
    		return{
    			nombre: null,
    			descripcion: null,
    			costo:null
    		}
    	},

        methods:{
        	sendDish() {
                axios.post(`/api/comida`, this.formData).then(res =>{
                    swal('Comida registrada')       
                }).catch(err =>{
                    swal({
					  type: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!',
					})
                })
                this.nombre = '',
                this.descripcion = '',
                this.costo = ''
            },
        }

    }
</script>

<style type="text/css" scoped>
	.row{
		padding-top: 20px;
	}
	.col-md-6{
		padding: 0 15px 0 0 !important;
	}
</style>