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

  p {
    font-size: 16px;
  }

  h1 {
    font-size: 18px;
    font-weight: bold;
    margin: 5px !important;
  }

  .alert-danger {
    background-color: #f2dede !important;
    border-color: #e0b1b8 !important;
    color: #b94a48 !important;
  }

  #imagen_cargada {
    margin: 3vh;
  }

  .file__droparea {
    position: relative;
    display: flex;
    align-items: center;
    flex-direction: column;
    width: 100%;
    margin-top: 10px;
    padding: 30px 4px 4px 4px;
    border: 2px dashed #CCC;
    border-radius: 3px;
    transition: 0.2s;
    border-radius: 10px;
  }

  .file__droparea:hover {
    border: 2px dashed #2196f3;
  }


  .file__droparea-icon {
    font-size: 40px;
    color: #CCC;
  }

  .file__droparea-btn {
    border-radius: 8px;
    text-transform: uppercase;
    width: 100%;
  }

  .file__droparea-msg {
    font-size: 20px;
    font-weight: 300;
    line-height: 1.4;
    text-transform: uppercase;
    white-space: nowrap;
    overflow: hidden;
    color: #CCC;
    margin: 5px 0;
  }

  .file__droparea-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    cursor: pointer;
    opacity: 0;
  }

  .file__droparea-input:hover {
    outline: none;
  }

  .file__droparea-fileText {
    display: none;
    position: absolute;
    top: 4px;
    right: 4px;
    background: #DDD;
    border-radius: 50px;
    padding: 2px 10px;
  }

  #wrap_informes {
    min-height: 85vh;
    background-color: #fff;
    border: 1px solid #ccc;
  }

  /* DESARROLLOS ACTUALES */
  #desarrollos_actuales {
    display: block;
    padding: 10px;
    border: 1px solid #cccccc;
    background-color: #fafafa;
    min-height: 64vh;

  }

  .texto_anterior {
    font-size: 14px;
    font-weight: bold;
  }

  .estado_anterior {
    font-size: 12px;
    font-weight: bold;
    overflow-y: scroll;
  }

  .herramienta {
    font-size: 15px;
    font-family: Arial Narrow;
    font-weight: bold;

  }


  .subherramienta {
    font-size: 10px;
  }

  .prioritario {
    font-size: 18px;
    float: right;
    color: red;
  }

  .normal {
    font-size: 18px;
    float: right;
    color: #CCC;
  }

  .comentar_herramienta {
    font-size: 25px;
    float: right;
    margin-top: 7px;
    color: orange;
    border: hidden;
    background: none;

  }

  .pendiente_herramienta {
    font-size: 20px;
    float: right;
    color: orange;
    align-self: top;
  }

  .finalizar_herramienta {
    font-size: 20px;
    float: right;
    color: red;
    align-self: top;
  }

  .informe {
    padding: 2vh !important;
    margin-left: 30px;
    margin-right: 30px;
  }

  .header_nota {
    background-color: #CCC;
    border-radius: 5px;

  }

  .cuerpo_nota {
    font-size: 12px;

  }

  .enlace {
    font-weight: bold;
  }

  .imagen_manual {
    width: 35px;
    margin-left: 20px;
    border-radius: 10px 10px;
    margin-top: 1px;
    float: right;
  }

  #desarrollos_actuales_notas {
    min-height: 62vh;
    resize: none;
    font-size: 14px;
    font-family: Arial;
    overflow-y: scroll;

  }


  #desarrollos_actuales_en_cola {
    min-height: 51vh;
  }

  #img {
    width: 100%;
  }

  #herramienta_notas {
    min-height: 25vh;
    resize: none;
  }

  .guardar_nota{
    float: right;
   
  }

  /* MODAL PARTE TRABAJO */
  #tabla_tareas>tbody>tr>td {
    vertical-align: middle;
    padding: 0px 0px 0px 8px;
    border-top: none;
    border-bottom: 1px solid #ddd;
  }

  .clase_annadir_trabajo {
    float: right;
    background-color: transparent;
    border-color: transparent;
    color: darkgreen;
  }

  .clase_annadir_trabajo:hover,
  .clase_annadir_trabajo:focus {
    float: right;
    background-color: transparent;
    border-color: transparent;
    color: green;
  }

  .clase_borrar_tarea,
  .clase_borrar_trabajo {
    float: right;
    background-color: transparent;
    border-color: transparent;
    color: #dd0202;
  }

  .clase_borrar_tarea:hover,
  .clase_borrar_trabajo:hover {
    float: right;
    background-color: transparent;
    border-color: transparent;
    color: #ff0000;
  }

  .clase_borrar_tarea:focus,
  .clase_borrar_trabajo:focus {
    float: right;
    background-color: transparent;
    border-color: transparent;
    color: #ff0000;
  }

  #cruz_cerrar {
    color: #a21212;
    cursor: pointer;
    font-size: 20px;

  }



  /* NUEVA HERRAMIENTA */
  #nueva_herramienta {
    display: none;
    padding: 10px;
    border: 1px solid #cccccc;
    background-color: #fafafa;
    min-height: 64vh;
  }
  #nueva_herramienta_notas {
    min-height: 58.5vh;
    resize: none;
  }

  /* MODFICAR HERRAMIENTA */
  #modificar_herramienta {
    display: none;
    padding: 11px;
    border: 1px solid #cccccc;
    background-color: #fafafa;
    min-height: 64vh;

  }

  #modificar_herramienta_notas {
    min-height: 58.2vh;
    resize: none;


  }

  /* VES ESTADO DESARROLLO */
  #ver_estado_desarrollo {
    display: none;
    padding: 12px;
    border: 1px solid #cccccc;
    background-color: #fafafa;
    min-height: 64vh;
  }

  #ver_estado_desarrollo_notas_nuevas {
    min-height: 19vh;
    resize: none;
  }

  #ver_estado_desarrollo_notas_anteriores {
    min-height: 58vh;
    resize: none;
    overflow-y: scroll;
  }

  #ver_historico_solicitado {
    font-size: 11px;
    font-weight: bold;
    overflow-y: scroll;
    min-height: 24vh;
    resize: none;

  }

  .boton_nota{
   float: right;
  }



  /* NOTIFICAR ERROR */
  #notificar_error {
    display: none;
    padding: 10px;
    border: 1px solid #cccccc;
    background-color: #fafafa;
    min-height: 64vh;
  }

  #agregar_nota_error {
    min-height: 26.4vh;
    resize: none;
  }

    /* DESARROLLOS INACTIVOS */
    #desarrollos_inactivos{
    display: block;
    padding: 10px;
    border: 1px solid #cccccc;
    background-color: #fafafa;
    min-height: 64vh;

  }
</style>
