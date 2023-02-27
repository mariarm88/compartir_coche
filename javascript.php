            }
            $('.input_guardar').each(function() {
                id_campo = $(this).attr('id');
                valor = $(this).val();

                if (valor != '' && valor != null) {
                    query += id_campo + "='" + valor + "',";
                }

            })
            $('.input_guardar_modal').each(function() {
                id_campo_modal = $(this).attr('id');
                id_campo = id_campo_modal.slice(0, -6);

                valor = $(this).val();
                if (valor != '' && valor != null) {
                    query += id_campo + "='" + valor + "',";
                }

            })

        }

        function vaciar_campos_modal() {
            $('.input_guardar_modal').each(function() {
                id_campo = $(this).attr('id');
                valor = $(this).val('');

            })
        }

        function almacenar_dias_seleccionados_modal() {

            $('.weekDays-selector_modal input:checkbox').each(function() {
                id_campo_modal = $(this).attr('id');
                id_campo = id_campo_modal.slice(0, -6);

                if ($(this).prop('checked') == true) {
                    valor = '1';
                }
                if ($(this).prop('checked') == false) {

                    valor = '0';
                }
                query += id_campo + '=' + valor + ',';

            })
            query = query.slice(0, -1);

        }

        function comprobar_hora_entrada() {

            if ($('#entrada').val() == '') {
                alert('Me falta la hora de entrada')
            }

        }

        function comprobar_hora_salida() {

            if ($('#salida').val() == '') {
                alert('Me falta la hora de salida')
            }

        }

        function comprobar_telefono() {
            var check_telefono = $('#telefono').prop('disabled');
            if (check_telefono == false && $('#telefono').val() == '') {
                alert('Introduce tu teléfono')
            }
        }

        // function verificar_hora() {
        //     if ($('#salida').val() <= $('#entrada').val() || $('#salida').val() == '' || $('#entrada').val() == '') {
        //         alert('Parece que hay un error en las horas de entrada y salida')
        //     }
        // }

        function guardar_datos() {
            $.ajax({
                url: '<?= current_pagina() ?>/guardar_datos_',
                type: 'POST',
                data: {
                    'query': query
                },
                beforeSend: function() {
                    // $(".loader_ajax").show();
                },
                success: function(data) {
                    data = JSON.parse(data);
                    alert(data);
                }
            });

            reset_dias();
            vaciar_campos();
            comprobar_usuario();


        }

        function actualizar_datos() {
            id_almacenada = $('#id').val();

            $.ajax({
                url: '<?= current_pagina() ?>/actualizar_datos_',
                type: 'POST',
                data: {
                    'id_almacenada': id_almacenada,
                    'query': query
                },
                beforeSend: function() {
                    // $(".loader_ajax").show();
                },
                success: function(data) {
                    data = JSON.parse(data);
                    alert(data);

                }
            });

        }

        function guardar_datos_modal() {
            $.ajax({
                url: '<?= current_pagina() ?>/guardar_datos_',
                type: 'POST',
                data: {
                    'query': query
                },
                beforeSend: function() {
                    // $(".loader_ajax").show();
                },
                success: function(data) {
                    data = JSON.parse(data);
                    alert(data);
                }
            });

        }

        function cargar_datos() {
            $('#form_alta').hide();
            $('#wrap_id_t1').hide();
            $('#wrap_id_t2').hide();
            $.ajax({
                url: '<?= current_pagina() ?>/cargar_datos_',
                type: 'POST',
                data: {},
                beforeSend: function() {
                    // $(".loader_ajax").show();
                },
                success: function(data) {

                    data = JSON.parse(data);
                   

                    datos_ida = data['ida'][0];
                    datos_vuelta = data['vuelta'][0];

                    if (datos_ida != '') {
                        //CARGO LOS DATOS DEL TRAYECTO DE IDA EN EL PRIMER APARTADO Y LOS DE VUELTA EN EL SEGUNDO
                        for (k in datos_ida) {

                            if (datos_ida[k] != null) {
                                valor = datos_ida[k];
                                id = '#datos_t1_' + k;
                                $(id).val(valor);
                            }
                        }

                        //SI NO HAY TRAYECTO REGISTRADO CAMBIA EL BOTON
                        if ($('#datos_t1_origen').val() == '') {
                            $('#btn_editar_datos_t1').removeClass('btn btn-primary').addClass('btn btn-success');
                            $('#btn_editar_datos_t1').text('Agregar trayecto');


                        } else {
                            $('#btn_editar_datos_t1').removeClass('btn btn-success').addClass('btn btn-primary');
                            $('#btn_editar_datos_t1').text('Editar trayecto');
                            cargar_compatibles_t1(datos_ida);

                        }
                    }

                    if (datos_vuelta != '') {
                        for (k in datos_vuelta) {

                            if (datos_vuelta[k] != null) {
                                valor = datos_vuelta[k];
                                id = '#datos_t2_' + k;
                                $(id).val(valor);
                            }
                        }

                        //SI NO HAY TRAYECTO REGISTRADO CAMBIA EL BOTON

                        if ($('#datos_t2_destino').val() == '') {
                            $('#btn_editar_datos_t2').removeClass('btn btn-primary').addClass('btn btn-success');
                            $('#btn_editar_datos_t2').text('Agregar trayecto');

                        } else {
                            $('#btn_editar_datos_t2').removeClass('btn btn-success').addClass('btn btn-primary');
                            $('#btn_editar_datos_t2').text('Editar trayecto');
                            cargar_compatibles_t2(datos_vuelta);
                        }
                    }
                }

            });

        }

        function editar_datos_t1() {

            for (k in datos_ida) {

                if (datos_ida != null) {
                    valor = datos_ida[k];
                    id = '#' + k;
                    $(id).val(valor);

                    $("#tipo_servicio").prop("disabled", true);
                    $("#tipo_trayecto").prop("disabled", true);
                    $("#wrap_dias_semana").show();


                    $("#origen > option[value='" + valor + "']").prop("selected", true);
                    $("#wrap_entrada").show();
                    $("#wrap_origen").show();
                    $("#wrap_zona_origen").show();

                }
                if (k == 'lunes' && valor == '1' || k == 'martes' && valor == '1' || k == 'miercoles' && valor == '1' || k == 'jueves' && valor == '1' || k == 'viernes' && valor == '1' || k == 'sabado' && valor == '1' || k == 'domingo' && valor == '1') {
                    $(id).prop('checked', true);

                }

            }

            if ($("#punto1_zona").val() != '') {
                $("#wrap_datos_punto1").show();

            }
            if ($("#punto2_zona").val() != '') {
                $("#wrap_datos_punto2").show();

            }
            if ($("#punto3_zona").val() != '') {
                $("#wrap_datos_punto3").show();

            }
            if ($("#punto4_zona").val() != '') {
                $("#wrap_datos_punto4").show();
            }
            if ($("#punto5_zona").val() != '') {
                $("#wrap_datos_punto5").show();
            }


            $("#wrap_origen_y_destino").show();
            $("#wrap_guardar_datos").show();
            $('#myCarousel').hide();
            $('#form_alta').show();
            $('#form_datos').hide();

        }

        function editar_datos_t2() {

            for (k in datos_vuelta) {

                if (datos_vuelta != null) {
                    valor = datos_vuelta[k];
                    id = '#' + k;
                    $(id).val(valor);

                    $("#tipo_servicio").prop("disabled", true);
                    $("#tipo_trayecto").prop("disabled", true);
                    $("#wrap_dias_semana").show();


                    $("#destino > option[value='" + valor + "']").prop("selected", true);
                    $("#wrap_salida").show();
                    $("#wrap_destino").show();
                    $("#wrap_zona_destino").show();

                }
                if (k == 'lunes' && valor == '1' || k == 'martes' && valor == '1' || k == 'miercoles' && valor == '1' || k == 'jueves' && valor == '1' || k == 'viernes' && valor == '1' || k == 'sabado' && valor == '1' || k == 'domingo' && valor == '1') {
                    $(id).prop('checked', true);

                }

            }

            if ($("#punto1_zona").val() != '') {
                $("#wrap_datos_punto1").show();

            }
            if ($("#punto2_zona").val() != '') {
                $("#wrap_datos_punto2").show();

            }
            if ($("#punto3_zona").val() != '') {
                $("#wrap_datos_punto3").show();

            }
            if ($("#punto4_zona").val() != '') {
                $("#wrap_datos_punto4").show();
            }
            if ($("#punto5_zona").val() != '') {
                $("#wrap_datos_punto5").show();
            }


            $("#wrap_origen_y_destino").show();
            $("#wrap_guardar_datos").show();
            $('#myCarousel').hide();
            $('#form_alta').show();
            $('#form_datos').hide();

        }

        function cargar_compatibles_t1(datos_ida) {
            $('#form_alta').hide();
            $('#wrap_id_t1').hide();
            $('#wrap_id_t2').hide();
            // RESETEO EL DATATABLE ANTES DE REESCRIBIRLO
            if ($.fn.dataTable.isDataTable('#tabla_compatibles_t1')) {
                $('#tabla_compatibles_t1').dataTable().fnDestroy();
                $('#tabla_compatibles_t1').html('');
                datatable = '';
            };

            $.ajax({
                url: '<?= current_pagina() ?>/cargar_compatibles_t1_',
                type: 'POST',
                data: {
                    'datos_ida': datos_ida,
                },
                beforeSend: function() {
                    // $(".loader_ajax").show();
                },
                success: function(data) {

                    data = JSON.parse(data);

                    // console.log(data);

                    if (data === '' || data == null || data == 'null') {
                        alert('No hay personas compatibles');
                    } else {

                        // CARGO EL DATATABLE
                        datatable = $('#tabla_compatibles_t1').DataTable({
                            'language': {
                                "decimal": "",
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Entradas",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscar:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Ultimo",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                },
                            },
                            'data': data.datatable_data,
                            'columns': data.datatable_columns,
                            'columnDefs': data.datatable_columns_def,
                            'orderCellsTop': false,
                            'select': false,
                            'dom': 'Blftrip',
                            'pageLength': 10,
                            'order': [2],
                            'buttons': [],
                            'scrollX': false,
                            'rowCallback': function(row, data) {},

                        });

                    }
                    //OCULTAMOS LAS PARTES DEL DATATABLE QUE NO NOS INTERESAN
                    $("#tabla_compatibles_t1_length").hide();
                    $("#tabla_compatibles_t1_filter").hide();
                    $("#tabla_compatibles_t1_info").hide();
                    $("#tabla_compatibles_t1_paginate").hide();
                    $(".loader_ajax").hide();


                }
            });



        }

        function cargar_compatibles_t2(datos_vuelta) {
            $('#form_alta').hide();
            $('#wrap_id_t1').hide();
            $('#wrap_id_t2').hide();
            // RESETEO EL DATATABLE ANTES DE REESCRIBIRLO
            if ($.fn.dataTable.isDataTable('#tabla_compatibles_t2')) {
                $('#tabla_compatibles_t2').dataTable().fnDestroy();
                $('#tabla_compatibles_t2').html('');
                datatable = '';
            };

            $.ajax({
                url: '<?= current_pagina() ?>/cargar_compatibles_t2_',
                type: 'POST',
                data: {
                    'datos_vuelta': datos_vuelta,
                },
                beforeSend: function() {
                    // $(".loader_ajax").show();
                },
                success: function(data) {

                    data = JSON.parse(data);

                    //console.log(data);

                    if (data === '' || data == null || data == 'null') {
                        alert('No hay personas compatibles');
                    } else {

                        // CARGO EL DATATABLE
                        datatable = $('#tabla_compatibles_t2').DataTable({
                            'language': {
                                "decimal": "",
                                "emptyTable": "No hay información",
                                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "lengthMenu": "Mostrar _MENU_ Entradas",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscar:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Ultimo",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                },
                            },
                            'data': data.datatable_data,
                            'columns': data.datatable_columns,
                            'columnDefs': data.datatable_columns_def,
                            'orderCellsTop': false,
                            'select': false,
                            'dom': 'Blftrip',
                            'pageLength': 10,
                            'order': [2],
                            'buttons': [],
                            'scrollX': false,
                            'rowCallback': function(row, data) {},

                        });

                    }
                    //OCULTAMOS LAS PARTES DEL DATATABLE QUE NO NOS INTERESAN
                    $("#tabla_compatibles_t2_length").hide();
                    $("#tabla_compatibles_t2_filter").hide();
                    $("#tabla_compatibles_t2_info").hide();
                    $("#tabla_compatibles_t2_paginate").hide();
                    $(".loader_ajax").hide();


                }
            });



        }

    });
</script>
