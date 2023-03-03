<?php

// PROTECCION DE ACCESO A ARCHIVOS
include '../../bloqueo_pagina.php';

/* --------------------------------------------------------------------------------------------------------------
    METODO PRINCIPAL DONDE SE CARGA LOS ELEMENTOS (STYLE, VISTA, MODAL_1, JAVASCRIPT)
    -------------------------------------------------------------------------------------------------------------- */
function index()
{
    // INCLUYO LOS ELEMENTOS
    titulo('Bla-Bla K');
    subtitulo('... Comparte tu coche!!');

    include "style.php";
    include "vista.php";
    include "javascript.php";
}

// CARGAR DATOS
function comprobar_usuario_()
{
    $modelo = new ClaseDatos();
    $usuario = usuario_logado('usuario');

    // COMPRUEBO SI EL USUARIO ESTA DADO DE ALTA EN LA BASE DE DATOS
    $sql = "SELECT COUNT(UPPER(usuario)) AS EXISTE FROM compartir_coche WHERE usuario = UPPER('{$usuario}');";
    $datos = $modelo->query($sql, 'default', 'assoc');
    $check_usuario = $datos[0]['EXISTE'];
    ($check_usuario != 0 ? $mensaje = "Si" : $mensaje = "No");

    // DEVUELVO EL MENSAJE
    echo json_encode($mensaje);
}

function consultar_municipios_()
{
    $modelo = new ClaseDatos();

    // OBTENGO TODOS LOS MUNICIPIOS DIFERENTES DE LA BASE DE DATOS ORDENADOS ALFABETICAMENTE
    $sql = "SELECT DISTINCT UPPER(municipio) AS MUNICIPIO FROM municipios_compartir_coche ORDER BY 1 ASC;";
    $datos = $modelo->query($sql, 'default', 'assoc');

    // DEVUELVO LOS MUNICIPIOS
    echo json_encode($datos);
}

function guardar_datos_($query)
{
    $modelo = new ClaseDatos();

    $query = '';

    // RECUPERO LOS DATOS
    if (isset($_REQUEST['query'])) {
        $query = $_REQUEST['query'];
    }

    $sql =
        "INSERT INTO compartir_coche
        set " . $query . "";



    $insert = $modelo->query($sql, 'default', 'assoc');
    if (gettype($insert) == 'string') {
        echo json_encode('error_sql');
    } else {

        echo json_encode('Trayecto de registrado.');
    }
}

function actualizar_datos_($id_almacenada, $query)
{
    $modelo = new ClaseDatos();

    $id_almacenada = '';
    $query = '';

    // RECUPERO LOS DATOS
    if (isset($_REQUEST['id_almacenada'])) {
        $id_almacenada = $_REQUEST['id_almacenada'];
    }
    if (isset($_REQUEST['query'])) {
        $query = $_REQUEST['query'];
    }

    $sql =
        "UPDATE compartir_coche SET " . $query . " WHERE id='" . $id_almacenada . "';";
       
    $update = $modelo->query($sql, 'default', 'assoc');

    if (gettype($update) == 'string') {
       // ver_error($update);
        echo json_encode('error_sql');
    } else {

        echo json_encode('Datos actualizados.');
    }
    
   
}

function actualizar_punto_()
{
    $modelo = new ClaseDatos();

    $id_almacenada = '';
    $punto_municipio = '';
    $zona_municipio = '';
 

    // RECUPERO LOS DATOS
    if (isset($_REQUEST['id_almacenada'])) {
        $id_almacenada = $_REQUEST['id_almacenada'];
    }
    if (isset($_REQUEST['punto_municipio'])) {
        $punto_municipio = $_REQUEST['punto_municipio'];
    }
    if (isset($_REQUEST['zona_municipio'])) {
        $zona_municipio = $_REQUEST['zona_municipio'];
    }
  

   $sql =
        "UPDATE compartir_coche SET " . $punto_municipio . "='', ". $zona_municipio ."='' WHERE id='" . $id_almacenada . "'";
        ver_array($sql);
    $update = $modelo->query($sql, 'default', 'assoc');

    if (gettype($update) == 'string') {
       // ver_error($update);
        echo json_encode('error_sql');
    } else {

        echo json_encode('Datos actualizados.');
    }
    
   
}


////CARGA LOS DATOS DEL FORMULARIO DE DATOS
function cargar_datos_()
{

    $modelo = new ClaseDatos();
    $usuario = usuario_logado('usuario');

    $sql =
        "SELECT * FROM compartir_coche WHERE usuario = UPPER('{$usuario}') and tipo_trayecto='ida'";

    $ida = $modelo->query($sql, 'default', 'assoc');

    $sql =
        "SELECT * FROM compartir_coche WHERE usuario = UPPER('{$usuario}') and tipo_trayecto='vuelta'";

    $vuelta = $modelo->query($sql, 'default', 'assoc');


    $datos_trayectos = array(
        'ida' => $ida,
        'vuelta' => $vuelta
    );

    echo json_encode($datos_trayectos);
}
////CARGAR USUSARIOS COMPATIBLES DEL TRAYECTO DE IDA
function cargar_compatibles_t1_($datos_ida)
{
    $modelo = new ClaseDatos();

    $usuario = usuario_logado('usuario');
    $datos_ida = '';

    // RECUPERO LOS DATOS
    if (isset($_REQUEST['datos_ida'])) {
        $datos_ida = $_REQUEST['datos_ida'];
    }

    $hora_entrada = $datos_ida['entrada'];

    //  CREO EL WHERE SEGUN SI SE SOLICITA O SE OFRECE COCHE
    if ($datos_ida['tipo_servicio'] == 'solicitar') {
        $where_trayecto = " AND tipo_servicio='ofrecer' AND tipo_trayecto ='ida' AND (origen = '{$datos_ida['origen']}'
            or punto1_municipio = '{$datos_ida['origen']}'
            or punto2_municipio = '{$datos_ida['origen']}'
           or punto3_municipio = '{$datos_ida['origen']}'
           or punto4_municipio = '{$datos_ida['origen']}'
            or punto5_municipio = '{$datos_ida['origen']}');";
    } else {
        $where_trayecto = " AND tipo_servicio='solicitar' AND tipo_trayecto ='ida'AND origen = '{$datos_ida['origen']}'
         ;";
    }

    $dias_semana = ['lunes' => "-", 'martes' => "-", 'miercoles' => "-", 'jueves' => "-", 'viernes' => "-", 'sabado' => "-", 'domingo' => "-"];

    //CREO UN ARRAY CON LOS DIAS DE LA SEMANA QUE HAY SELECCIONADOS PARA EL TRAYECTO DE IDA
    $mis_dias = array();
    foreach ($datos_ida as $key => $value) {
        foreach ($dias_semana as $key1 => $value1) {
            if ($key == $key1) {
                if ($datos_ida[$key1] == 1) {
                    $mis_dias[$key] = $hora_entrada;
                }
            }
        }
    }

    $misdias_concat = "";
    $contador_dias = 0;
    foreach ($mis_dias as $key => $value) {
        $contador_dias++;
        $misdias_concat .= $key . ",";
    }

    $misdias_concat = substr($misdias_concat, 0, -1);

    $sql = " SELECT usuario, departamento,entrada
                FROM compartir_coche
                WHERE usuario <> UPPER('{$usuario}')
                 {$where_trayecto}";


    $usuarios = $modelo->query($sql, 'default', 'assoc');
    $usuarios_index = array_por_id($usuarios, 'usuario');


    $lista_usuarios = '(';
    foreach ($usuarios_index as $key => $value) {
        $lista_usuarios .= "'" . $key . "',";
    }
    $lista_usuarios = substr($lista_usuarios, 0, -1) . ")";


    //COMPRUEBO LOS USUARIOS QUE TIENEN LOS MISMOS DIAS Y EL MISMO ORIGEN QUE YO
    $sql = "SELECT usuario, entrada,{$misdias_concat}
           FROM	compartir_coche
           WHERE usuario in {$lista_usuarios}
           AND tipo_trayecto ='ida' ";



    $dias_semana = $modelo->query($sql, 'default', 'assoc');

    $dias_semana_index = array_por_id($dias_semana, 'usuario');

    foreach ($dias_semana_index as $key => $value) {
        foreach ($value as $key1 => $value1) {
            $usuarios_index[$key][$key1] = $dias_semana_index[$key][$key1];

            if ($dias_semana_index[$key][$key1] == 1) {
                $usuarios_index[$key][$key1] = $usuarios_index[$key]['entrada'];
            }
        }

        unset($usuarios_index[$key]['-30']);
    }


    $datos = array_values($usuarios_index);

    // MODIFICO LOS QUE NO COINCIDEN CON UN '-' PARA CUANDO SE PINTE EN LE DATATABLE
    //PARA QUE EN EL MOMENTO EN QUE HAY EL MISMO NUMERO DE 0 QUE DE DIAS EN MI SOLICITUD ME ELIMINE LA KEY YA QUE SIGNIFICA QUE NO CONINCIDEN NINGUN DÍA
    $contador_sin_coincidencia = 0;
    foreach ($datos  as $key => $value) {
        foreach ($value  as $key1 => $value1) {
            if ($datos[$key][$key1] == '0') {
                $datos[$key][$key1] = "-";
                $contador_sin_coincidencia += 1;
            } else if ($datos[$key][$key1] == '1') {
                $datos[$key][$key1] = "-";
            }
        }
        if ($contador_dias == $contador_sin_coincidencia) {
            unset($datos[$key]);
        }
    }




    $resultado_ida = array();


    //ALMACENO LOS DATOS EN EL ARRAY RESULTADO SEGUN LAS REGLAS ESPECIFICADAS Y EL VALOR DEL TRAYECTO IDA

    $hora_entrada = date('H:i:s', strtotime($hora_entrada));
    $entrada_menos = date('H:i:s', strtotime($hora_entrada . "- 30 minutes"));




    if ($datos_ida['entrada'] != '') {
        foreach ($datos as $key => $value) {
            if ($datos[$key]['departamento'] == $datos_ida['departamento'] && $datos[$key]['entrada'] == $datos_ida['entrada']) {
                array_push($resultado_ida, $datos[$key]);
            }
        }

        foreach ($datos as $key => $value) {
            if ($datos[$key]['departamento'] != $datos_ida['departamento'] && $datos[$key]['entrada'] == $datos_ida['entrada']) {
                array_push($resultado_ida, $datos[$key]);
            }
        }

        foreach ($datos as $key => $value) {
            $hora_entrada_compi = date('H:i:s', strtotime($datos[$key]['entrada']));

            if (($datos[$key]['departamento'] == $datos_ida['departamento']) && $entrada_menos == $hora_entrada_compi) {
                array_push($resultado_ida, $datos[$key]);
            }
        }


        foreach ($datos as $key => $value) {
            $hora_entrada_compi = date('H:i:s', strtotime($datos[$key]['entrada']));
            if ($datos[$key]['departamento'] != $datos_ida['departamento'] &&  $entrada_menos == $hora_entrada_compi) {
                array_push($resultado_ida, $datos[$key]);
            }
        }
    }

    //PASAMOS A FORMATO DATATABLE
    $columns = array_keys($resultado_ida[0]);

    // INDICE PARA EL TARGET
    $i = 0;

    foreach ($columns as $key => $value) {
        $columns_def[] = array('title' => $value, 'targets' => $i);
        $columns[$key] = array('data' => $value);
        $i++;
    }

    $array_final = array(
        'datatable_data' => $resultado_ida,
        'datatable_columns' => $columns,
        'datatable_columns_def' => $columns_def
    );

    //VALIDAMOS
    if (gettype($array_final) != 'array') {
        return 'ERROR_SQL';
    } else if (sizeof($array_final) == 0) {
        return 'SIN_DATOS';
    } else {
        $datos =  $array_final;
    }

    // DEVUELVO LA PETICION AJAX
    echo json_encode($datos);
}
////CARGAR USUSARIOS COMPATIBLES DEL TRAYECTO DE VUELTA
function cargar_compatibles_t2_($datos_vuelta)
{
    $modelo = new ClaseDatos();

    $usuario = usuario_logado('usuario');
    $datos_ida = '';

    // RECUPERO LOS DATOS
    if (isset($_REQUEST['datos_vuelta'])) {
        $datos_vuelta = $_REQUEST['datos_vuelta'];
    }

    $hora_salida = $datos_vuelta['salida'];

    //  CREO EL WHERE SEGUN SI SE SOLICITA O SE OFRECE COCHE
    if ($datos_vuelta['tipo_servicio'] == 'solicitar') {
        $where_trayecto = " AND tipo_servicio='ofrecer'  AND tipo_trayecto ='vuelta' AND (destino = '{$datos_vuelta['destino']}'
        or punto1_municipio = '{$datos_vuelta['destino']}'
        or punto2_municipio = '{$datos_vuelta['destino']}'
        or punto3_municipio = '{$datos_vuelta['destino']}'
        or punto4_municipio = '{$datos_vuelta['destino']}'
        or punto5_municipio = '{$datos_vuelta['destino']}');";
    } else {
        $where_trayecto = " AND tipo_servicio='solicitar' AND tipo_trayecto ='vuelta' AND destino = '{$datos_vuelta['destino']}'
        ;";
    }

    $dias_semana = ['lunes' => "-", 'martes' => "-", 'miercoles' => "-", 'jueves' => "-", 'viernes' => "-", 'sabado' => "-", 'domingo' => "-"];

    //CREO UN ARRAY CON LOS DIAS DE LA SEMANA QUE HAY SELECCIONADOS PARA EL TRAYECTO DE VUELTA
    $mis_dias = array();
    foreach ($datos_vuelta as $key => $value) {
        foreach ($dias_semana as $key1 => $value1) {
            if ($key == $key1) {
                if ($datos_vuelta[$key1] == 1) {
                    $mis_dias[$key] = $hora_salida;
                }
            }
        }
    }

    $misdias_concat = "";
    $contador_dias = 0;
    foreach ($mis_dias as $key => $value) {
        $contador_dias++;
        $misdias_concat .= $key . ",";
    }

    $misdias_concat = substr($misdias_concat, 0, -1);



    $sql = " SELECT usuario, departamento
                FROM compartir_coche
                WHERE usuario <> UPPER('{$usuario}')
                {$where_trayecto}";


    $usuarios = $modelo->query($sql, 'default', 'assoc');
    $usuarios_index = array_por_id($usuarios, 'usuario');

    $lista_usuarios = '(';
    foreach ($usuarios_index as $key => $value) {
        $lista_usuarios .= "'" . $key . "',";
    }

    $lista_usuarios = substr($lista_usuarios, 0, -1) . ")";



    //COMPRUEBO LOS USUARIOS QUE TIENEN LOS MISMOS DIAS Y EL MISMO DESTINO QUE YO
    $sql = "SELECT usuario,salida,{$misdias_concat}
           FROM	compartir_coche
           WHERE usuario in {$lista_usuarios}
           AND tipo_trayecto ='vuelta';";



    $dias_semana = $modelo->query($sql, 'default', 'assoc');
    $dias_semana_index = array_por_id($dias_semana, 'usuario');


    foreach ($dias_semana_index as $key => $value) {
        foreach ($value as $key1 => $value1) {
            $usuarios_index[$key][$key1] = $dias_semana_index[$key][$key1];
            if ($dias_semana_index[$key][$key1] == 1) {
                $usuarios_index[$key][$key1] = $usuarios_index[$key]['salida'];
            }
        }

        unset($usuarios_index[$key]['-30']);
    }

    $datos = array_values($usuarios_index);

    // MODIFICO LOS QUE NO COINCIDEN CON UN '-' PARA CUANDO SE PINTE EN LE DATATABLE
    //PARA QUE EN EL MOMENTO EN QUE HAY EL MISMO NUMERO DE 0 QUE DE DIAS EN MI SOLICITUD ME ELIMINE LA KEY YA QUE SIGNIFICA QUE NO CONINCIDEN NINGUN DÍA
    $contador_sin_coincidencia = 0;
    foreach ($datos  as $key => $value) {
        foreach ($value  as $key1 => $value1) {
            if ($datos[$key][$key1] == '0') {
                $datos[$key][$key1] = "-";
                $contador_sin_coincidencia += 1;
            } else if ($datos[$key][$key1] == '1') {
                $datos[$key][$key1] = "-";
            }
        }
        if ($contador_dias == $contador_sin_coincidencia) {
            unset($datos[$key]);
        }
    }

    $resultado_vuelta = array();


    //ALMACENO LOS DATOS EN EL ARRAY RESULTADO SEGUN LAS REGLAS ESPECIFICADAS Y EL VALOR DEL TRAYECTO IDA

    $hora_salida = date('H:i:s', strtotime($hora_salida));
    $salida_menos = date('H:i:s', strtotime($hora_salida . "- 30 minutes"));


    if ($datos_vuelta['salida'] != '') {
        foreach ($datos as $key => $value) {

            if ($datos[$key]['departamento'] == $datos_vuelta['departamento'] && $datos[$key]['salida'] == $datos_vuelta['salida']) {

                array_push($resultado_vuelta, $datos[$key]);
            }
        }

        foreach ($datos as $key => $value) {
            if ($datos[$key]['departamento'] != $datos_vuelta['departamento'] && $datos[$key]['salida'] == $datos_vuelta['salida']) {
                array_push($resultado_vuelta, $datos[$key]);
            }
        }

        foreach ($datos as $key => $value) {
            $hora_salida_compi = date('H:i:s', strtotime($datos[$key]['salida']));
            if ($datos[$key]['departamento'] == $datos_vuelta['departamento'] && $salida_menos == $hora_salida_compi) {
                array_push($resultado_vuelta, $datos[$key]);
            }
        }

        foreach ($datos as $key => $value) {
            $hora_salida_compi = date('H:i:s', strtotime($datos[$key]['salida']));
            if ($datos[$key]['departamento'] != $datos_vuelta['departamento'] && $salida_menos == $hora_salida_compi) {
                array_push($resultado_vuelta, $datos[$key]);
            }
        }
    }

    //PASAMOS A FORMATO DATATABLE
    $columns = array_keys($resultado_vuelta[0]);

    // INDICE PARA EL TARGET
    $i = 0;

    foreach ($columns as $key => $value) {
        $columns_def[] = array('title' => $value, 'targets' => $i);
        $columns[$key] = array('data' => $value);
        $i++;
    }

    $array_final = array(
        'datatable_data' => $resultado_vuelta,
        'datatable_columns' => $columns,
        'datatable_columns_def' => $columns_def
    );

    //VALIDAMOS
    if (gettype($array_final) != 'array') {
        return 'ERROR_SQL';
    } else if (sizeof($array_final) == 0) {
        return 'SIN_DATOS';
    } else {
        $datos =  $array_final;
    }

    // DEVUELVO LA PETICION AJAX
    echo json_encode($datos);
}


function mostrar_telefono_($usuario)
{
    $modelo = new ClaseDatos();

    $usuario = '';

    // RECUPERO LOS DATOS
    if (isset($_REQUEST['usuario'])) {
        $usuario = $_REQUEST['usuario'];
    }


    $sql =
        "SELECT telefono FROM compartir_coche WHERE usuario='{$usuario}';";
    $select = $modelo->query($sql, 'default', 'assoc');

    //VALIDAMOS
    if ($select[0]['telefono'] == 0) {
        $datos =  "El compi {$usuario} no ha facilitado su numero de telefono.";
    } else {
        $datos = "El telefono para contactar con {$usuario} es el: " . $select[0]['telefono'] . ".";
    }

    echo json_encode($datos);
}
