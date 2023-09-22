<!DOCTYPE html>
<html>
<head>
    <title>Resultado de la Transacción</title>
</head>
<body>
    <h1>Resultado de la Transacción</h1>

    <?php
    function encryptDES($data, $key) {
        $iv = openssl_random_pseudo_bytes(8); // Genera un vector de inicialización aleatorio
        $ciphertext = openssl_encrypt($data, 'des-ecb', $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($ciphertext);
    }
    
    function encryptAES($data, $key) {
        $iv = openssl_random_pseudo_bytes(16); // Genera un vector de inicialización aleatorio
        $ciphertext = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($iv . $ciphertext);
    }

    function decryptAES($data, $key) {
        $data = base64_decode($data);
        $iv = substr($data, 0, 16);
        $ciphertext = substr($data, 16);
        return openssl_decrypt($ciphertext, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    }

    function encryptBlowfish($data, $key) {
        return base64_encode(openssl_encrypt($data, 'bf-ecb', $key, OPENSSL_RAW_DATA));
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $des_key = 'mi_clave_des'; // Clave DES (debe ser exactamente 8 caracteres)
        $aes_key = 'mi_clave_aes'; // Clave AES
        $blowfish_key = 'mi_clave_blowfish'; // Clave Blowfish

        
        $mensaje_claro = "Fecha - hora: " . $_POST["fecha_hora"] . "\n" .
                "Banco Origen: " . $_POST["banco_origen"] . "\n" .
                "Banco Destino: " . $_POST["banco_destino"] . "\n" .
                "Tipo de Cuenta Destino: " . $_POST["tipo_cuenta_destino"] . "\n" .
                "Cuenta Destino: " . $_POST["cuenta_destino"] . "\n" .
                "Persona: " . $_POST["persona"] . "\n" .
                "Valor Transacción: " . $_POST["valor_transaccion"] . "\n" .
                "Identificación: " . $_POST["identificacion"] . "\n" .
                "CUS: " . $_POST["cus"] . "\n" .
                "Descripción: " . $_POST["descripcion"];



        // Tiempo de inicio
        // DES
        $start_time_des = microtime(true);

        // Ciframos el mensaje
        $mensaje_cifrado_des = encryptDES($mensaje_claro, $des_key);

        // Tiempo de finalización
        $end_time_des = microtime(true);

        // Calculamos el tiempo transcurrido
        $tiempo_transcurrido_des = $end_time_des - $start_time_des;
        
        //AES
        $start_time_aes = microtime(true);

        // Ciframos el mensaje con AES
        $mensaje_cifrado_aes = encryptAES($mensaje_claro, $aes_key);

        // Tiempo de finalización
        $end_time_aes = microtime(true);

        // Calculamos el tiempo transcurrido
        $tiempo_transcurrido_aes = $end_time_aes - $start_time_aes;

        //BLOWFISH
        // Tiempo de inicio
        $start_time_blowfish = microtime(true);

        // Ciframos el mensaje con Blowfish
        $mensaje_cifrado_blowfish = encryptBlowfish($mensaje_claro, $blowfish_key);

        // Tiempo de finalización
        $end_time_blowfish = microtime(true);

        // Calculamos el tiempo transcurrido
        $tiempo_transcurrido_blowfish = $end_time_blowfish - $start_time_blowfish;

        // Mostramos los resultados
        echo "Mensaje en Claro: $mensaje_claro<br><br>";
         
        echo "Texto Cifrado con DES(Base64): $mensaje_cifrado_des<br>";
        echo "Tiempo empleado en el proceso de cifrado con DES: $tiempo_transcurrido_des segundos<br><br>";
        
        echo "Texto Cifrado con AES (Base64): $mensaje_cifrado_aes<br>"; 
        echo "Tiempo empleado en el proceso de cifrado con AES: $tiempo_transcurrido_aes segundos<br><br>";
        
        echo "Texto Cifrado con Blowfish (Base64): $mensaje_cifrado_blowfish<br>";
        echo "Tiempo empleado en el proceso de cifrado con Blowfish: $tiempo_transcurrido_blowfish segundos";
    }
    ?>

</body>
</html>

