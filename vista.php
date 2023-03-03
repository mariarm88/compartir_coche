<div class="row">

    <div class="col-md-12" id="contenido">

        <!-- FORMULARIO ALTA / MODIFICACION USUARIO -->
        <div id="form_alta" class="col-md-12">

            <!--PORTADA CARRUSEL IMAGENES-->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <div class="carousel-inner" role="listbox">
                    <div id="pantalla_1" class="col-md-12 item active portada" style="background-color: #ecf0f5 ">
                        <img src="http://10.228.69.100/viki_dev/paginas/blablaK/img/portada.png"></img>
                    </div>


                    <div id="pantalla_2" class="col-md-12 item portada" style="background-color: #ecf0f5 ">
                        <img src="http://10.228.69.100/viki_dev/paginas/blablaK/img/slide2.png"></img>
                    </div>


                    <div id="pantalla_3" class="col-md-12 item portada" style="background-color: #ecf0f5 ">
                        <img src="http://10.228.69.100/viki_dev/paginas/blablaK/img/portada.png"></img>
                    </div>

                    <div id="pantalla_4" class="col-md-12 item portada" style="background-color: #ecf0f5 ">
                        <img src="http://10.228.69.100/viki_dev/paginas/blablaK/img/slide3.png"></img>
                    </div>
                </div>
            </div>

            <!-- BLOQUE USUARIO LOGADO -->
            <div id="wrap_datos_personales" class="col-md-12">

                <div id="wrap_usuario" class="col-md-3">
                    <div class="form-group">
                        <label for="usuario"><b>Usuario</b></label>
                        <input type="text" id="usuario" class="form-control input_guardar" disabled>
                    </div>
                </div>

                <div id="wrap_meta4" class="col-md-3">
                    <div class="form-group">
                        <label for="meta4"><b>Meta4</b></label>
                        <input type="text" id="meta4" class="form-control input_guardar" disabled>
                    </div>
                </div>

                <div id="wrap_departamento" class="col-md-3">
                    <div class="form-group">
                        <label for="departamento"><b>Departamento</b></label>
                        <input type="text" id="departamento" class="form-control input_guardar" disabled>
                    </div>
                </div>

                <div id="wrap_telefono" class="col-md-3">
                    <div class="form-group">
                        <label id="label_telefono" for="telefono"><b>Telefono</b></label>
                        <input type="text" id="telefono" class="form-control input_guardar" placeholder="Consulta politica de datos" &uarr disabled>
                    </div>
                </div>

                <div id="wrap_consentimiento" class="col-md-3">
                    <div class="form-group">
                        <label id="label_consentimiento" for="consentimiento"><b>Consentimiento</b></label>
                        <input type="text" id="consentimiento" class="form-control input_guardar" disabled>
                    </div>
                </div>
                <div id="wrap_id" class="col-md-3">
                    <div class="form-group">
                        <label id="label_id" for="id"><b>ID</b></label>
                        <input type="text" id="id" class="form-control input_guardar" disabled>
                    </div>
                </div>

            </div>

            <!-- BLOQUE DATOS TRAYECTO -->
            <div id="wrap_datos_trayecto" class="col-md-12">

                <div id="wrap_tipo_servicio" class="col-md-3">
                    <div class="form-group">
                        <label for="tipo_servicio"><b>Quiero...</b></label>
                        <select id="tipo_servicio" class="form-control input_guardar">
                            <option hidden value="">Selecciona una opcion</option>
                            <option value="ofrecer">Ofrecer mi coche</option>
                            <option value="solicitar">Buscar coche</option>
                        </select>
                    </div>
                </div>

                <div id="wrap_tipo_trayecto" class="col-md-3">
                    <div class="form-group">
                        <label for="tipo_trayecto"><b>Trayecto</b></label>
                        <select id="tipo_trayecto" class="form-control input_guardar">
                            <option hidden value="">Selecciona ida o vuelta</option>
                            <option value="ida">Sólo Ida</option>
                            <option value="vuelta">Sólo Vuelta</option>
                            <option>Ida y Vuelta</option>
                        </select>
                    </div>
                </div>

                <div id="wrap_entrada" class="col-md-3">
                    <div class="form-group">
                        <label for="entrada"><b>Hora de entrada</b></label>
                        <input type="time" id="entrada" class="form-control input_guardar">
                    </div>
                </div>

                <div id="wrap_salida" class="col-md-3">
                    <div class="form-group">
                        <label for="salida"><b>Hora de salida</b></label>
                        <input type="time" id="salida" class="form-control input_guardar">
                    </div>
                </div>

                <!-- DIAS DE LA SEMANA -->
                <div id="wrap_dias_semana" class="col-md-12">
                    <label for="dias_semana"><b>Selecciona los dias para compartir:</b></label>
                    <div class="weekDays-selector">
                        <input type="checkbox" id="lunes" class="weekday" />
                        <label for="lunes">Lunes</label>
                        <input type="checkbox" id="martes" class="weekday" />
                        <label for="martes">Martes</label>
                        <input type="checkbox" id="miercoles" class="weekday" />
                        <label for="miercoles">Miércoles</label>
                        <input type="checkbox" id="jueves" class="weekday" />
                        <label for="jueves">Jueves</label>
                        <input type="checkbox" id="viernes" class="weekday" />
                        <label for="viernes">Viernes</label>
                        <input type="checkbox" id="sabado" class="weekday" />
                        <label for="sabado">Sábado</label>
                        <input type="checkbox" id="domingo" class="weekday" />
                        <label for="domingo">Domingo</label>
                    </div>
                </div>
            </div>

            <!-- BLOQUE ORIGEN Y DESTINO -->
            <div id="wrap_origen_y_destino" class="col-md-12">

                <!-- DATOS ORIGEN -->
                <div id="wrap_datos_origen" class="col-md-12">

                    <div id="wrap_origen" class="col-md-3 datos_origen">
                        <div class="form-group">
                            <label for="origen"><b>Origen</b></label>
                            <select id="origen" class="form-control input_guardar menos_letra">
                            </select>
                        </div>
                    </div>


                    <div id="wrap_zona_origen" class="col-md-6 datos_origen">
                        <div class="form-group">
                            <label for="zona_origen"><b>Zona (Barrio, rotonda, esquina...)</b></label>
                            <input type="textarea" id="zona_origen" class="form-control input_guardar" rows="2">
                        </div>
                    </div>

                    <div id="wrap_btn_puntos_parada_origen" class="col-md-3 datos_origen">
                        <div class="form-group">
                            <label for="puntos_parada_ida"><b>Pulsa aqui para añadir puntos donde recoger a otros compis</b></label>
                            <button type="button" id="btn_puntos_parada_ida" class="btn-primary form-control"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>

                </div>

                <!-- DATOS DESTINO -->
                <div id="wrap_datos_destino" class="col-md-12">

                    <div id="wrap_destino" class="col-md-3 datos_destino">
                        <div class="form-group">
                            <label for="destino"><b>Destino</b></label>
                            <select id="destino" class="form-control input_guardar">

                            </select>
                        </div>
                    </div>


                    <div id="wrap_zona_destino" class="col-md-6 datos_destino">
                        <div class="form-group">
                            <label for="zona_destino"><b>Zona (Barrio, rotonda, esquina...)</b></label>
                            <input type="textarea" id="zona_destino" class="form-control input_guardar" rows="2">
                        </div>
                    </div>

                    <div id="wrap_btn_puntos_parada_destino" class="col-md-3 datos_destino">
                        <div class="form-group">
                            <label for="puntos_parada_vuelta"><b>Pulsa aqui para añadir puntos donde dejar a otros compis</b></label>
                            <button type="button" id="btn_puntos_parada_vuelta" class="btn-primary form-control "><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <!-- DATOS PUNTOS DE ENCUENTRO -->
                <div id="puntos_de_encuentro" class="col-md-12">
                    <!-- DATOS PUNTO 1 -->
                    <div id="wrap_datos_punto1" class="col-md-12">
                        <div id="wrap_punto1" class="col-md-3 datos_punto1">
                            <div class="form-group">
                                <label for="punto1_municipio"><b>Punto 1</b></label>
                                <select id="punto1_municipio" class="form-control input_guardar menos_letra">
                                </select>
                            </div>
                        </div>



                        <div id="wrap_zona_punto1" class="col-md-8 datos_punto1">
                            <div class="form-group" id="botonera_punto1">
                                <label for="punto1_zona"><b>Zona (Barrio, rotonda, esquina...)</b></label>
                                <input type="textarea" id="punto1_zona" class="form-control input_guardar" rows="2">
                            </div>
                        </div>


                        <div id="wrap_botonera_1" class="col-md-1 datos_punto1">
                            <div class="form-group col-md-12" id="botonera_punto1">
                                <div id="wrap_annadir_punto2" class="col-md-6 annadir_punto">
                                    <i id="annadir_punto2" class="fa fa-check btn clase_annadir_punto"></i>
                                </div>
                                <div id="wrap_quitar_punto1" class="col-md-6 datos_punto1">
                                    <i class="fa fa-close btn clase_borrar_punto btn-parada"></i>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- DATOS PUNTO 2 -->
                    <div id="wrap_datos_punto2" class="col-md-12">
                        <div id="wrap_punto2" class="col-md-3 datos_punto2">
                            <div class="form-group">
                                <label for="punto2_municipio"><b>Punto 2</b></label>
                                <select id="punto2_municipio" class="form-control input_guardar menos_letra">
                                </select>
                            </div>
                        </div>



                        <div id="wrap_zona_punto2" class="col-md-8 datos_punto2">
                            <div class="form-group">
                                <label for="punto2_zona"><b>Zona (Barrio, rotonda, esquina...)</b></label>
                                <input type="textarea" id="punto2_zona" class="form-control input_guardar" rows="2">
                            </div>
                        </div>

                        <div id="wrap_botonera_2" class="col-md-1 datos_punto2">
                            <div class="form-group col-md-12" id="botonera_punto2 ">
                                <div id="wrap_annadir_punto3" class="col-md-6 annadir_punto">
                                    <i id="annadir_punto3" class="fa fa-check btn clase_annadir_punto"></i>
                                </div>
                                <div id="wrap_quitar_punto2" class="col-md-6 datos_punto2">
                                    <i class="fa fa-close btn clase_borrar_punto btn-parada"></i>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- DATOS PUNTO 3 -->
                    <div id="wrap_datos_punto3" class="col-md-12">
                        <div id="wrap_punto3" class="col-md-3 datos_punto3">
                            <div class="form-group">
                                <label for="punto3_municipio"><b>Punto 3</b></label>
                                <select id="punto3_municipio" class="form-control input_guardar menos_letra">
                                </select>
                            </div>
                        </div>


                        <div id="wrap_zona_punto3" class="col-md-8 datos_punto3">
                            <div class="form-group">
                                <label for="punto3_zona"><b>Zona (Barrio, rotonda, esquina...)</b></label>
                                <input type="textarea" id="punto3_zona" class="form-control input_guardar" rows="2">
                            </div>
                        </div>

                        <div id="wrap_botonera_3" class="col-md-1 datos_punto3">
                            <div class="form-group col-md-12" id="botonera_punto3">
                                <div id="wrap_annadir_punto4" class="col-md-6 annadir_punto">
                                    <i id="annadir_punto4" class="fa fa-check btn clase_annadir_punto"></i>
                                </div>
                                <div id="wrap_quitar_punto3" class="col-md-6 datos_punto3">
                                    <i class="fa fa-close btn clase_borrar_punto btn-parada"></i>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- DATOS PUNTO 4 -->
                    <div id="wrap_datos_punto4" class="col-md-12">
                        <div id="wrap_punto4" class="col-md-3 datos_punto4">
                            <div class="form-group">
                                <label for="punto4_municipio"><b>Punto 4</b></label>
                                <select id="punto4_municipio" class="form-control input_guardar menos_letra">
                                </select>
                            </div>
                        </div>



                        <div id="wrap_zona_punto4" class="col-md-8 datos_punto4">
                            <div class="form-group">
                                <label for="punto4_zona"><b>Zona (Barrio, rotonda, esquina...)</b></label>
                                <input type="textarea" id="punto4_zona" class="form-control input_guardar" rows="2">
                            </div>
                        </div>

                        <div id="wrap_botonera_4" class="col-md-1 datos_punto4">
                            <div class="form-group col-md-12" id="botonera_punto4">
                                <div id="wrap_annadir_punto5" class="col-md-6 annadir_punto">
                                    <i id="annadir_punto5" class="fa fa-check btn clase_annadir_punto"></i>
                                </div>
                                <div id="wrap_quitar_punto4" class="col-md-6 datos_punto4">
                                    <i class="fa fa-close btn clase_borrar_punto btn-parada"></i>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- DATOS PUNTO 5 -->
                    <div id="wrap_datos_punto5" class="col-md-12">
                        <div id="wrap_punto5" class="col-md-3 datos_punto5">
                            <div class="form-group">
                                <label for="punto5_municipio"><b>Punto 5</b></label>
                                <select id="punto5_municipio" class="form-control input_guardar menos_letra">
                                </select>
                            </div>
                        </div>

                        <div id="wrap_zona_punto5" class="col-md-8 datos_punto5">
                            <div class="form-group">
                                <label for="punto5_zona"><b>Zona (Barrio, rotonda, esquina...)</b></label>
                                <input type="textarea" id="punto5_zona" class="form-control input_guardar" rows="2">
                            </div>
                        </div>

                        <div id="wrap_botonera_5" class="col-md-1 datos_punto5">
                            <div class="form-group col-md-12" id="botonera_punto5">

                                <div id="wrap_quitar_punto5" class="col-md-6 datos_punto5">
                                    <i class="fa fa-close btn clase_borrar_punto btn-parada"></i>
                                </div>
                            </div>
                        </div>



                    </div>

                    <div class="col-md-10"></div>

                    <div id="wrap_guardar_datos" class="col-md-2">
                        <div class="form-group">
                            <div id="wrap_guardar">
                                <button class="btn btn-success fa fa-save form-control" id="btn-guardar"> Guardar</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div id="form_datos" class="col-md-12">

            <!-- IDA ALMACENADA -->
            <div id="wrap_datos_t1_horario" class="col-md-12">

                <div id="wrap_datos_t1_entrada" class="col-md-2">
                    <div class="form-group">
                        <label for="datos_t1_entrada"><b>Hora de entrada</b></label>
                        <input type="time" id="datos_t1_entrada" class="form-control" disabled>
                    </div>
                </div>


                <div id="wrap_datos_t1_tipo_trayecto" class="col-md-2">
                    <div class="form-group">
                        <label for="datos_t1_tipo_trayecto"><b>Trayecto de...</b></label>
                        <input type="text" id="datos_t1_tipo_trayecto" class="form-control" disabled>
                    </div>
                </div>

                <div id="wrap_datos_t1_origen" class="col-md-3">
                    <div class="form-group">
                        <label for="datos_t1_origen"><b>Origen</b></label>
                        <input type="text" id="datos_t1_origen" class="form-control menos_letra" disabled>
                    </div>
                </div>

                <div id="wrap_datos_t1_zona_origen" class="col-md-3">
                    <div class="form-group">
                        <label for="_datos_t1_zona_origen"><b>Zona origen</b></label>
                        <input type="text" id="datos_t1_zona_origen" class="form-control" disabled>
                    </div>
                </div>

                <div id="wrap_editar_datos" class="col-md-2">
                    <label for="datos_origen_y_destino" style="color: transparent;"><b>btn</b></label>
                    <button type="button " id="btn_editar_datos_t1" class="btn btn-primary  form-control">
                    </button>
                </div>

            </div>

            <!--VUELTA ALMACENADA -->
            <div id="wrap_datos_t2_horario" class="col-md-12">

                <div id="wrap_datos_t2_salida" class="col-md-2">
                    <div class="form-group">
                        <label for="datos_t2_salida"><b>Hora de salida</b></label>
                        <input type="time" id="datos_t2_salida" class="form-control" disabled>
                    </div>
                </div>

                <div id="wrap_datos_t2_tipo_trayecto" class="col-md-2">
                    <div class="form-group">
                        <label for="datos_t2_tipo_trayecto"><b>Trayecto de...</b></label>
                        <input type="text" id="datos_t2_tipo_trayecto" class="form-control" disabled>
                    </div>
                </div>



                <div id="wrap_datos_t2_destino" class="col-md-3">
                    <div class="form-group">
                        <label for="datos_t2_destino"><b>Destino</b></label>
                        <input type="text" id="datos_t2_destino" class="form-control menos_letra" disabled>
                    </div>
                </div>

                <div id="wrap_datos_t2_zona_destino" class="col-md-3">
                    <div class="form-group">
                        <label for="datos_t2_zona_destino"><b>Zona destino</b></label>
                        <input type="text" id="datos_t2_zona_destino" class="form-control" disabled>
                    </div>
                </div>
                <!-- <div class="col-md-10"></div> -->
                <div id="wrap_editar_datos" class="col-md-2">
                    <label for="datos_origen_y_destino" style="color: transparent;"><b>btn</b></label>
                    <button type="button " id="btn_editar_datos_t2" class="btn btn-primary  form-control">
                     </button>
                </div>
            </div>


            <div id="wrap_compatibles_t1" class="col-md-12">
                <center><label style="font-weight:bold;font-size:16px">Matches Ida</label></center>
                <table id="tabla_compatibles_t1" class="table"></table>
            </div>
            <div id="wrap_compatibles_t2" class="col-md-12" style="overflow-x: scroll;">

                <center><label style="font-weight:bold;font-size:16px">Matches Vuelta</label></center>
                <table id="tabla_compatibles_t2" class="table"></table>
            </div>
        </div>


    </div>

</div>
