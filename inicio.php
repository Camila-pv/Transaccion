<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Transacción</title>
</head>
<body>
    <h1>Formulario de Transacción</h1>
    <form action="transaction.php" method="post">
        <label for="fecha_hora">Fecha y Hora:</label>
        <input type="text" name="fecha_hora" id="fecha_hora" placeholder="dd/mm/yyyy HH:MM:SS" required><br><br>

        <label for="banco_origen">Banco Origen:</label>
        <select name="banco_origen" id="banco_origen" required>
            <option value="banco1">Banco 1</option>
            <option value="banco2">Banco 2</option>
            <option value="banco3">Banco 3</option>
        </select><br><br>

        <label for="banco_destino">Banco Destino:</label>
        <select name="banco_destino" id="banco_destino" required>
            <option value="banco1">Banco 1</option>
            <option value="banco2">Banco 2</option>
            <option value="banco3">Banco 3</option>
        </select><br><br>

        <label for="tipo_cuenta_destino">Tipo de Cuenta Destino:</label>
        <select name="tipo_cuenta_destino" id="tipo_cuenta_destino" required>
            <option value="ahorros">Ahorros</option>
            <option value="corriente">Corriente</option>
        </select><br><br>

        <label for="cuenta_destino">Cuenta Destino:</label>
        <input type="text" name="cuenta_destino" id="cuenta_destino" required><br><br>

        <label for="persona">Persona:</label>
        <select name="persona" id="persona" required>
            <option value="natural">Natural</option>
            <option value="juridica">Jurídica</option>
        </select><br><br>

        <label for="valor_transaccion">Valor de la Transacción:</label>
        <input type="number" name="valor_transaccion" id="valor_transaccion" min="1" required><br><br>

        <label for="identificacion">Identificación:</label>
        <input type="number" name="identificacion" id="identificacion" min="1" required><br><br>

        <label for="cus">CUS:</label>
        <input type="number" name="cus" id="cus" min="1" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

