<div class="row">

    <div class="col-md-12">

        <div id="wrap_informes" class="col-md-12">

            <!-- ELECCION DE DESARROLLO -->
            <div class="col-md-12" style="margin-bottom: 10px;">

                <h1 class="text-center lead">¿Quieres crear una nueva herramienta? ¿Vas a solicitar una modificacion?¿Has detectado un error? ¿O sólo quieres ver el estado del desarrollo?</h1>

                <div class="col-md-12 text-center">
                    <div class="btn-group" role="group">
                        <?php if (usuario_logado('usuario') == 'LCORNEJ5' || tiene_rol('desarrollo_operativo')) : ?>

                            <button type="button" id="btn_desarrollos_actuales" class="btn btn-primary">Desarrollos actuales</button>

                        <?php endif; ?>

                        <button type="button" id="btn_nueva_herramienta" class="btn btn-success">Nueva herramienta</button>
                        <button type="button" id="btn_modificar_herramienta" class="btn btn-warning">Modificar herramienta</button>
                        <button type="button" id="btn_ver_estado_desarrollo" class="btn btn-info">Ver estado desarrollo</button>
                        <button type="button" id="btn_notificar_error" class="btn btn-danger">Notificar errores</button>
                        <?php if (usuario_logado('usuario') == 'LCORNEJ5' || tiene_rol('desarrollo_operativo')) : ?>

                            <button type="button" id="btn_desarrollos_inactivos" class="btn btn-primary">Desarrollos inactivos</button>

                        <?php endif; ?>

                    </div>
                    <a target="_blank" href="http://10.228.69.100/viki/paginas/tareas_desarrollo/Manuales/Manual_Solicitudes_Desarrollo.pdf"><img class="imagen_manual" src="http://10.228.69.100/viki/paginas/tareas_desarrollo/img/icono_pdf.png" /></a>

                </div>
            </div>

            <!-- VACIO PARA CENTRAR   -->
            <div class="col-md-1">
                <div class="form-group"></div>
            </div>

            <!-- WRAP ELECCION -->
            <div id="wrap_elecion" class="col-md-10">
                <?php if (usuario_logado('usuario') == 'LCORNEJ5' || tiene_rol('desarrollo_operativo')) : ?>
                    <!-- DESARROLLOS ACTUALES -->
                    <div id="desarrollos_actuales" class="col-md-12">

                        <h1 class="text-center">Desarrollos actuales en los que se está trabajando</h1>

                        <div class="col-md-3">
                            <label for="desarrollos_actuales_asignadas">Herramientas asignadas</label>
                            <div id="desarrollos_actuales_asignadas" class="list-group"></div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desarrollos_actuales_notas">Info del desarrollo</label>

                                <div id="desarrollos_actuales_notas" class="form-control" disabled>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="desarrollos_actuales_en_cola">Herramientas en cola</label>
                            <div id="desarrollos_actuales_en_cola" class="list-group"></div>

                            <div class="form-group float:right">
                                <button type="button" id="actual_asignar" class="btn btn-block btn-primary">Asignar</button>
                            </div>
                            <div class="form-group">
                                <button type="button" id="parte_trabajo" data-toggle="modal" data-target="#parte_modal" class="btn btn-block btn-primary" data-to><i class="fa fa-fw fa-book"></i> Diario de trabajo</button>

                            </div>

                        </div>

                        <div class="col-md-9">
                            <div class="form-group">
                            </div>

                        </div>

                    </div>
                    <!-- DESARROLLOS INACTIVOS -->
                    <div id="desarrollos_inactivos" class="col-md-12">

                        <h1 class="text-center">Histórico de tareas realizadas por el equipo de Desarrollo</h1>

                        <div class="col-md-12">
                            <table id='tabla_historico_trabajo' class="table table-striped table-hover table-responsive"></table>
                        </div>

                    </div>


                <?php endif; ?>

                <!-- NUEVA HERRAMIENTA -->
                <div id="nueva_herramienta" class="col-md-12">

                    <h1 class="text-center">Formulario para crear una nueva herramienta</h1>

                    <div class="col-md-6">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nueva_herramienta_nombre">Nombre de la herramienta <span class="text-danger">(<b>Ejemplo:</b> modulo_nuevo_fcr)</span></label>
                                <input type="text" id="nueva_herramienta_nombre" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nueva_herramienta_menu">Menu donde añadir</label>
                                <select id="nueva_herramienta_menu" name="filtro_ubicacion" class="form-control input-guardar"></select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nueva_herramienta_submenu">Submenu donde añadir</label>
                                <select id="nueva_herramienta_submenu" name="filtro_ubicacion" class="form-control input-guardar">
                                    <option value="" hidden> Selecciona un submenú</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <p class="text-center"><b>Info del formulario</b></p>
                                <p><b>Nombre herramienta: </b> Define el nombre que quieres ponerle a la herramienta</p>
                                <p><b>Menu donde añadir: </b> En que menu quieres que se aloje la herramienta, ADMINISTRACION, BAJAS, FONDOS, APP.SALA, JUEGOS...</p>
                                <p><b>Submenu donde añadir: </b> En que submenu quieres que se aloje la herramienta, Juegos sala, APP´s, Auditorias...</p>
                                <p><b>Explicacion del desarrollo: </b> Cuentanos que quieres desarrollar, asi como todo lo que tenemos que tener en cuenta.</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nueva_herramienta_notas">Explicacion del desarrollo</label>
                            <textarea id="nueva_herramienta_notas" class="form-control area"></textarea>
                        </div>
                    </div>

                    <!-- VACIO PARA CUADRAR -->
                    <div class="col-md-9">
                        <div class="form-group">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="button" id="nueva_herramienta_guardar" class="btn btn-block btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
                        </div>
                    </div>

                </div>

                <!-- MODIFICAR HERRAMIENTA -->
                <div id="modificar_herramienta" class="col-md-12">

                    <h1 class="text-center">Formulario para solicitar una modificacion</h1>

                    <div class="col-md-6">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="modificar_herramienta_nombre">URL de la herramienta</label>
                                <input type="text" id="modificar_herramienta_nombre" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <img src="<?= base_url() . 'paginas/tareas_desarrollo/img/nombre_herramienta.png' ?>" alt="" class="responsive" id="img">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <p class="text-center"><b>Info del formulario</b></p>
                                <p><b>URL de la herramienta: </b>Coloca la dirección de la herramienta que quieres comprobar, solo lo que aparece enmarcado en la imagen superior.</p>
                                <p><b>Explicacion de la modificacion: </b> Explicacion de las modificaciones a realizar, si vas a complementar con un email, dejalo anotado.</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="modificar_herramienta_notas">Explicacion de las modificaciones</label>
                            <textarea id="modificar_herramienta_notas" class="form-control area"></textarea>
                        </div>
                    </div>

                    <!-- VACIO PARA CUADRAR -->
                    <div class="col-md-9">
                        <div class="form-group">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="button" id="modificar_herramienta_guardar" class="btn btn-block btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
                        </div>
                    </div>

                </div>

                <!-- VER ESTADO DESARROLLO -->
                <div id="ver_estado_desarrollo" class="col-md-12">

                    <h1 class="text-center">Ver el estado del desarrollo y los avances realizados</h1>

                    <div class="col-md-6">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ver_estado_desarrollo_nombre">URL de la herramienta</label>

                                <div class="input-group">
                                    <input type="text" id="ver_estado_desarrollo_nombre" class="form-control">
                                    <div class="input-group-btn">
                                        <button id="btn_estado_bucar" class="btn btn-default btn-info" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <img src="<?= base_url() . 'paginas/tareas_desarrollo/img/nombre_herramienta.png' ?>" alt="" class="responsive" id="img">
                            </div>
                        </div>

                        <div class="col-md-12">



                            <div class="col-md-6" id='historico_solicitado'>
                                <div class="form-group">
                                    <label for="historico_solicitado">Herramientas solicitadas en el último mes</label>
                                    <textarea id="ver_historico_solicitado" class="form-control" disabled></textarea>

                                </div>
                            </div>




                            <div class="col-md-6" id='notas_nuevas'>
                                <div class="form-group">
                                    <label for="ver_estado_desarrollo_notas_nuevas">Dejar una nota</label>
                                    <textarea id="ver_estado_desarrollo_notas_nuevas" class="form-control"></textarea>
                                    <br />

                                    <button type="button" id="agregar_nota" class="btn btn-block btn-primary boton_nota"><i class="fa fa-pencil"></i> Agregar nota</button>


                                </div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            </br>
                            <div class="alert alert-danger">
                                <p class="text-center"><b>Info del formulario</b></p>
                                <p><b>URL de la herramienta: </b>Coloca la dirección de la herramienta que quieres comprobar, solo lo que aparece enmarcado en la imagen superior.</p>
                                <p><b>Herramientas solicitadas en el último mes: </b>Aquí puedes ver el historico de lo que tu nos has solicitado.</p>
                                <p><b>Deja una nota: </b> Si quieres que el equipo de desarrollo lo tenga en cuenta.</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ver_estado_desarrollo_notas_anteriores">Estado del desarrollo</label>
                            <textarea id="ver_estado_desarrollo_notas_anteriores" class="form-control .estado_anterior area" disabled></textarea>
                        </div>
                    </div>


                    <!-- VACIO PARA CUADRAR -->
                    <div class="col-md-9">
                        <div class="form-group">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="button" id="ver_estado_desarrollo_guardar" class="btn btn-block btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
                        </div>
                    </div>

                </div>

                <!-- NOTIFICAR ERROR -->
                <div id="notificar_error" class="col-md-12">

                    <h1 class="text-center">Formulario para notificar un error en una herramienta</h1>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <br>
                                <label for="agregar_nombre_error">URL de la herramienta</label>
                                <input name="archivoSubir" type="text" id="agregar_nombre_error" class="form-control input-app-error">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <img src="<?= base_url() . 'paginas/tareas_desarrollo/img/nombre_herramienta.png' ?>" alt="" class="responsive" id="img">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="agregar_nota_error">Describe el error</label>
                                <textarea name="archivoSubir" id="agregar_nota_error" class="form-control input-app-error"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <p class="text-center"><b>Info del formulario</b></p>
                                <p><b>URL de la herramienta: </b> Coloca la dirección de la herramienta que quieres notificar , solo lo que aparece enmarcado en la imagen superior.</p>
                                <p><b>Explicacion del error: </b> Explicacion del error que aparece.</p>
                                <p><b>Pantallazo: </b> Pasanos un pantallazo para que podamos comprobarlo.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label for="inp_fichero">¿Tienes un pantallazo del error?</label>
                        <form role="form" class="formulario_fichero file__droparea" enctype="multipart/form-data">
                            <span class="file__droparea-fileText sombra"></span>
                            <i class="fa fa-cloud-upload file__droparea-icon sombra"></i>
                            <span class="file__droparea-msg sombra"> Arrastra y suelta aqu&iacute; </span>
                            <div id="cargar_imagen" style="float:left"></div>
                            <button class="btn btn-primary file__droparea-btn" id="file__droparea-btn"> archivo </button>
                            <input type="file" name="archivo" id="inp_fichero" class="file__droparea-input">
                        </form>

                    </div>


                    <!-- VACIO PARA CUADRAR -->
                    <div class="col-md-9">
                        <div class="form-group">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="button" id="inp_cargar" class="btn btn-block btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
                        </div>
                    </div>



                </div>

                <!-- VACIO PARA CENTRAR   -->
                <div class="col-md-1">
                    <div class="form-group">
                    </div>
                </div>



            </div>

        </div>


        <!-- MODAL COMENTARIO HERRAMIENTA CAMBIO DE ESTADO -->

        <div class="modal fade" id="comentario_modal" role="dialog" aria-labelledby="comentario_modal_label" aria-hidden="true">
            <div class="modal-dialog" role="document" style="width: 50%;">
                <div class="modal-content" style="min-height: 40vh;">

                    <div class="modal-header">

                        <label>
                            <h1>Notas y cambios de estado del equipo de desarrollo</h1>
                        </label><i class="fa fa-close fa-lg pull-right cerrar_modal" data-dismiss="modal" aria-label="Close" id="cruz_cerrar"></i>
                    </div>

                    <div class="modal-body informe">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="herramienta_notas">Deja un comentario</label>

                                    <textarea id="herramienta_notas" class="form-control"></textarea>
                                    <br />
                                    <label>Estado al que cambiar </label><span class="text-danger"> (<b>Si no lo cambias permanecerá en desarrollo</b>)</span></label>
                                    <select id="filtro_estado" name="filtro_estado" class="form-control input-guardar">
                                        <option value="DESARROLLO" hidden> DESARROLLO</option>
                                        <option value="PENDIENTE">PENDIENTE</option>
                                        <option value="PARALIZADA">PARALIZADA</option>
                                        <option value="FINALIZADA">FINALIZADA</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-9"></div>
                            <div class="col-md-3">

                                <button type="button" id="guardar_nota" class="btn btn-block btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>


                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>


        <!-- MODAL DIARIO DE TRABAJO -->
        <div class="modal fade" id="parte_modal" role="dialog" aria-labelledby="parte_modal_label" aria-hidden="true">
            <div class="modal-dialog" role="document" style="width: 80%;">
                <div class="modal-content" style="min-height: 80vh;">

                    <div class="modal-header">

                        <label>
                            <h1>Diario de trabajo del equipo de desarrollo</h1>
                        </label><i class="fa fa-close fa-lg pull-right cerrar_modal" data-dismiss="modal" aria-label="Close" id="cruz_cerrar"></i>
                    </div>

                    <div class="modal-body informe">

                        <div class="row">
                            <div class="col-md-12">
                                <table id='tabla_parte_trabajo' class="table table-striped table-hover table-responsive"></table>
                            </div>

                            <div class="col-md-12" id="wrap_botonera_exportacion">
                                <div class="col-md-4"></div>
                                <div class="col-md-4" id="botonera_exportacion">
                                    <button id="exportar_informe" class="col-md-12 btn btn-success"><i class="fa fa-file-excel-o"></i> Exportar a Excel</button>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <!-- MENSAJE DE CARGA -->
    <div class="loader_ajax" style="display: none;"></div>
</div>
