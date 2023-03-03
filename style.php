<style>
	/* --------------------------------------------------------------------------------------------------------------
	-----------------------------------------------------------------------------------------------------------------
	    ESTILOS MAURI
	-----------------------------------------------------------------------------------------------------------------
	-------------------------------------------------------------------------------------------------------------- */
	.loader_ajax {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9998;
		background: url('<?= base_url() ?>assets/images/loader_ajax.gif') 50% 50% no-repeat rgba(0, 0, 0, 0.50);
	}


	#form_alta,
	#form_datos,
	#modal_iyv {
		background: url('http://10.228.69.100/viki_dev/paginas/blablaK/img/mapa_boll.png');
		border-radius: 15px;
		padding: 15px;
		box-shadow: 0px 3px 2px 2px;
		min-height: 80vh;
		border: 1px solid #00000038;
		background-color: #eff6ff;
	}

	/* IMAGEN PORTADA */
	.portada {
		margin-bottom: 3em;
		border: 3px solid;
		border-radius: 15px;
		padding: 0px;
	}

	.portada img {
		width: 100%;
		border-radius: 10px;
	}

	/* FORMULARIOS */
	#wrap_datos_personales,
	#wrap_datos_trayecto,
	#wrap_datos_dias_semana,
	#wrap_origen_y_destino,
	#wrap_datos_t1_horario,
	#wrap_datos_t2_horario,
	#wrap_datos_puntos_de_encuentro,
	#wrap_datos_origen_y_destino,
	#wrap_compatibles_t1,
	#wrap_compatibles_t2,
	#wrap_entrada_modal,
	#wrap_salida_modal,
	#wrap_origen_y_destino_modal,
	#wrap_dias_semana_modal {
		margin-bottom: 3em;
		border: 2px solid;
		border-radius: 15px;
		padding: 15px;
		background-color: #deeeff;
		box-shadow: 0px 3px 2px 2px;
	}

	/* ESTILO DATATABLE */
	table.dataTable {
		text-align-last: center;
	}

	.busqueda_datatable {
		text-align: center !important;
		font-family: FontAwesome, 'Gill Sans', Calibri, sans-serif;
	}

	.dataTables_wrapper {
		margin-top: -10px;
	}

	/* ANIMACION ANCHURA COL-MD */
	#puntos_de_encuentro [class*='col-md-'] {
		transition: all 0.5s ease-in-out !important;
	}

	/* PUNTOS DE ENCUENTRO */
	#puntos_de_encuentro,
	#puntos_de_encuentro_modal {
		padding-left: 0px !important;
		padding-right: 0px !important;
	}



	/* CHECKS DIAS SEMANA */
	.weekDays-selector {
		padding-left: 2rem;
		padding-right: 2rem;
	}

	.weekDays-selector input {
		display: none !important;
	}

	.weekDays-selector input[type=checkbox]+label {
		display: inline-block;
		border-radius: 6px;
		background: #dddddd;
		height: 3.5rem;
		width: 20rem;
		margin-right: 1rem;
		line-height: 40px;
		text-align: center;
		cursor: pointer;
	}

	.weekDays-selector input[type=checkbox]:checked+label {
		background: #337ab7;
		color: #eeeeee;
	}




	/* TITULO DEL MODAL */
	#titulo {
		font-size: 25px;
	}


	/* CHECKS DIAS SEMANA MODAL */
	.weekDays-selector_modal {
		padding-left: 2rem;
		padding-right: 2rem;
	}

	.weekDays-selector_modal input {
		display: none !important;
	}

	.weekDays-selector_modal input[type=checkbox]+label {
		display: inline-block;
		border-radius: 6px;
		background: #dddddd;
		height: 3.5rem;
		width: 20rem;
		margin-right: 1rem;
		line-height: 40px;
		text-align: center;
		cursor: pointer;
	}

	.weekDays-selector_modal input[type=checkbox]:checked+label {
		background: #337ab7;
		color: #eeeeee;
	}



	/*BOTON GUARDAR DATOS*/
	#wrap_guardar_datos {
		display: block;
		margin-right: 14px;
		float: right;
		font-size: 15px;

	}

	#wrap_botonera_1,
	#wrap_botonera_2,
	#wrap_botonera_3,
	#wrap_botonera_4,
	#wrap_botonera_5,
	#wrap_botonera_1_modal,
	#wrap_botonera_2_modal,
	#wrap_botonera_3_modal,
	#wrap_botonera_4_modal,
	#wrap_botonera_5_modal {
		font-size: 18px;
		float: left;
		margin-top: 15px;
		border: hidden;
		background: none;
	}


	.clase_annadir_punto {
		color: green;
	}

	.clase_annadir_punto_modal {
		color: green;
	}

	.clase_borrar_punto {
		color: red;
	}

	.clase_borrar_punto_modal {
		color: red;
	}
	.menos_letra{
		font-size: 10px;

	}
</style>
