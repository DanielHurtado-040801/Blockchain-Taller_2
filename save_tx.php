<?php 

include("db.php");

if (isset($_POST['save_tx'])){
    $fecha_hora = $_POST['fecha-hora'];
    $banco_origen = $_POST['banco_origen'];
    $cuenta_origen = $_POST['cuenta_origen'];
    $tipo_cuenta_origen = $_POST['tipo_cuenta_origen'];
    $banco_destino = $_POST['banco_destino'];
    $cuenta_destino = $_POST['cuenta_destino'];
    $tipo_cuenta_destino = $_POST['tipo_cuenta_destino'];
    $numero_identificacion = $_POST['numero_identificacion'];
    $valor_transaccion = $_POST['valor_transaccion'];
    $cus = $_POST['CUS'];
    $descripcion = $_POST['descripcion'];
    $transaccion = $fecha_hora + $cuenta_origen + $cuenta_destino + $numero_identificacion + $valor_transaccion + $cus;

    $start_time_cbc = microtime(true);
    $CBC = encrypt_decrypt_cbc('cifrar', $transaccion);
    $end_time_cbc = microtime(true);
    $elapsed_time_cbc = ($end_time_cbc - $start_time_cbc) * 1000;


    $start_time_ecb = microtime(true);
    $ECB = encrypt_decrypt_ecb('cifrar', $transaccion);
    $end_time_ecb = microtime(true);
    $elapsed_time_ecb = ($end_time_ecb - $start_time_ecb) * 1000;

    $start_time_cfb = microtime(true);
    $CFB = encrypt_decrypt_cfb('cifrar', $transaccion);
    $end_time_cfb = microtime(true);
    $elapsed_time_cfb = ($end_time_cfb - $start_time_cfb) * 1000;


    $start_time_ofb = microtime(true);
    $OFB = encrypt_decrypt_ofb('cifrar', $transaccion);
    $end_time_ofb = microtime(true);
    $elapsed_time_ofb = ($end_time_ofb - $start_time_ofb) * 1000;


    $query = "INSERT INTO `transacciones`(`Fecha - Hora`, `Banco Origen`, `Cuenta Origen`, `Tipo Cuenta Origen`, `Banco Destino`, `Cuenta Destino`, `Tipo Cuenta Destino`, 
    `Numero Identificacion`, `Valor Transaccion`, `CUS`, `Descripcion`, `CBC`, `Time CBC`, `ECB`, `Time ECB`, `CFB`, `Time  CFB`, `OFB`, `Time OFB`) 
    VALUES  ('$fecha_hora', '$banco_origen', '$cuenta_origen', '$tipo_cuenta_origen', '$banco_destino', '$cuenta_destino', '$tipo_cuenta_destino', 
    '$numero_identificacion', '$valor_transaccion', '$cus', '$descripcion', '$CBC','$elapsed_time_cbc', '$ECB', '$elapsed_time_ecb','$CFB', '$elapsed_time_cfb','$OFB','$elapsed_time_ofb')";

    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Fallo Transacción: " . mysqli_error($conn)); // Mostrar el error específico
    }

    $_SESSION['message'] = "Transacción Creada Exitosamente";
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");

}
function encrypt_decrypt_cbc($action, $string) {
    $output = false;
 
    //$encrypt_method = "AES-128-ECB";
	$encrypt_method = "DES-cbc";
    $key = 'ESTA ES MI CLAVE';
 
    if ( $action == 'cifrar' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key);
        $output;
    } else if( $action == 'descifrar' ) {
        $output = openssl_decrypt($string, $encrypt_method, $key);
    }
 
    return $output;
}

function encrypt_decrypt_ecb($action, $string) {
    $output = false;
 
    //$encrypt_method = "AES-128-ECB";
	$encrypt_method = "DES-ecb";
    $key = 'ESTA ES MI CLAVE';
 
    if ( $action == 'cifrar' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key);
        $output;
    } else if( $action == 'descifrar' ) {
        $output = openssl_decrypt($string, $encrypt_method, $key);
    }
 
    return $output;
}

function encrypt_decrypt_cfb($action, $string) {
    $output = false;
 
    //$encrypt_method = "AES-128-ECB";
	$encrypt_method = "DES-cfb";
    $key = 'ESTA ES MI CLAVE';
 
    if ( $action == 'cifrar' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key);
        $output;
    } else if( $action == 'descifrar' ) {
        $output = openssl_decrypt($string, $encrypt_method, $key);
    }
 
    return $output;
}
function encrypt_decrypt_ofb($action, $string) {
    $output = false;
 
    //$encrypt_method = "AES-128-ECB";
	$encrypt_method = "DES-ofb";
    $key = 'ESTA ES MI CLAVE';
 
    if ( $action == 'cifrar' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key);
        $output;
    } else if( $action == 'descifrar' ) {
        $output = openssl_decrypt($string, $encrypt_method, $key);
    }
 
    return $output;
}

?>