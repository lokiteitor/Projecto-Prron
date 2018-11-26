<template>
	<div>
		<div class="row">
			<form>
				<div class="form-row">
					<div class="form-group col-md-3">
			    		<label>Nomina</label>
			    		<input type="text" class="form-control" v-model="nomina"><br>
			    	</div>
					<div class="form-group">
					<label>Reporte por:</label>
						<select class="custom-select" v-model="rango">
							<option value="quincena">Quincena</option>
							<option value="mes">Mes</option>
							<option value="anio">Año</option>
						</select>
					</div>
				</div>
			</form>
		</div>
		<table class="table">
            <th>Fecha</th>
            <th>Costo de la comida</th>
            <th>Diferencia</th>
            <tbody>
                <tr v-for="date in dates">
                	<td>{{date.fecha}}</td>
                	<td>{{date.id_comida.costo}}$</td>
                	<td>{{date.id_comida.costo - 20.00}}$</td>
                </tr>               
            </tbody>
        </table>
        <table class="table">
            <th>Total de costo por comidas</th>
            <th>Diferencia que paga la empresa</th>
            <th>Descuento de nomina</th>
            <tbody>
                <tr>
                	<td>{{totalComida}}</td>
                	<td>{{total}}$</td>
                	<td>{{descuento}}$</td>
                </tr>               
            </tbody>
        </table>
	</div>
</template>

<script type="text/javascript">

	import moment from 'moment'

    export default {
    	mixins:[],

    	computed:{
    		formData:function(){
    			return{
    				rango: this.rango,
    				nomina: this.nomina
    			}
    		}
    	},

    	watch:{
    		rango:function(newValue){
    			if(this.rango == 'quincena'){
    				this.inicio=moment('2018-11-15').format('YY-MM-DD')
    				this.fin=moment('2018-11-30').format('YY-MM-DD')
    			}
    			else if(this.rango == 'mes'){
    				this.inicio=moment('2018-11-01').format('YY-MM-DD')
    				this.fin=moment('2018-11-30').format('YY-MM-DD')
    			}
    			else if(this.rango == 'anio'){
    				this.inicio=moment('2018-01-01').format('YY-MM-DD')
    				this.fin=moment('2018-12-31').format('YY-MM-DD')
    			}
    			this.getDate()
    		},
    	},

    	data(){
    		return{
                dates:[],
                // range: [],
                nomina: '',
                rango:  '',
                inicio: '',
                fin: '',
                descuento: 0.0,
                total:0.0,
                totalComida: 0.0
    		}
    	},

        methods:{
        	getDate(){
                axios.get(`/api/empleado/${this.nomina}/reporte`,{
				params:{
					finicio:this.inicio,
					ffin: this.fin
				}
				}).then(res =>{
                    this.dates = res.data.data
                    this.getCosto()
    				this.getDescuento()
                }).catch(err =>{
                    alert(err)
				})
        	},
        	getCosto(){
        		for(var i=0; i < this.dates.length; i++){
        			this.total += this.dates[i].id_comida.costo - 20.00
        			this.totalComida += this.dates[i].id_comida.costo
        		}
        	},
        	getDescuento(){
        		this.descuento = 20.00 * this.dates.length
        	}
        },

        mounted(){
        	
        }

    }


</script>

<style type="text/css">
	
</style>