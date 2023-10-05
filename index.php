<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="save_tx.php" method="POST">
                    <div class="form-group m-2">
                        <input type="datetime-local" name="fecha-hora" class="form-control" placeholder="Fecha - Hora"
                            autofocus>
                    </div>
                    <div class="form-group m-2">
                        <select class="form-select" aria-label="Default select example" name="banco_origen">
                            <option selected>Banco Davivienda</option>
                            <option value="1">Bancolombia</option>
                            <option value="2">Banco BBVA</option>
                            <option value="3">Banco Falabella</option>
                            <option value="4">Banco Caja Social</option>
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <input type="number" name="cuenta_origen" class="form-control" placeholder="Cuenta Origen"
                            autofocus>
                    </div>

                    <div class="form-group m-2">
                        <select class="form-select" aria-label="Default select example" name="tipo_cuenta_origen">
                            <option selected>Ahorros</option>
                            <option value="1">Corriente</option>
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <select class="form-select" aria-label="Default select example" name="banco_destino">
                            <option selected>Banco Davivienda</option>
                            <option value="1">Bancolombia</option>
                            <option value="2">Banco BBVA</option>
                            <option value="3">Banco Falabella</option>
                            <option value="4">Banco Caja Social</option>
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <input type="number" name="cuenta_destino" class="form-control" placeholder="Cuenta Destino"
                            autofocus>
                    </div>

                    <div class="form-group m-2">
                        <select class="form-select" aria-label="Default select example" name="tipo_cuenta_destino">
                            <option selected>Ahorros</option>
                            <option value="1">Corriente</option>
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <input type="number" name="numero_identificacion" class="form-control"
                            placeholder="Numero Identificación" autofocus>
                    </div>

                    <div class="form-group m-2">
                        <input type="number" name="valor_transaccion" class="form-control"
                            placeholder="Valor Transacción" autofocus>
                    </div>

                    <div class="form-group m-2">
                        <input type="number" name="CUS" class="form-control"
                            placeholder="Identificador Transacción (CUS)" autofocus>
                    </div>

                    <div class="form-group m-2">
                        <input type="text" name="descripcion" class="form-control" placeholder="Descripción" autofocus>
                    </div>

                    <div class="form-group m-2">
                        <input type="submit" class="btn btn-success btn-block" value="Crear Transacción" name="save_tx">
                    </div>

                </form>
            </div>

            <div class="col-md-8">
            </div>
        </div>
    </div>
</div>
<div class="p-4">
    <table class="table table-bordered mx-auto mx-4">
        <thead>
            <tr>
                <th>Fecha/Hora</th>
                <th>Banco Org</th>
                <th>Cuenta Org</th>
                <th>Tipo Cuenta Org</th>
                <th>Banco Dest</th>
                <th>Cuenta Dest</th>
                <th>Tipo Cuenta Dest</th>
                <th># Identidicación</th>
                <th>Valor Tx</th>
                <th>CUS</th>
                <th>Descripción</th>
                <th>CBC</th>
                <th>Time CBC</th>
                <th>ECB</th>
                <th>Time ECB</th>
                <th>CFB</th>
                <th>Time CFB</th>
                <th>OFB</th>
                <th>Time OFB</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM transacciones";
            $result_transacciones = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_array($result_transacciones)) { ?>
                <tr>
                    <td>
                        <?php echo $row['Fecha - Hora'] ?>
                    </td>
                    <td>
                        <?php echo $row['Banco Origen'] ?>
                    </td>
                    <td>
                        <?php echo $row['Cuenta Origen'] ?>
                    </td>
                    <td>
                        <?php echo $row['Tipo Cuenta Origen'] ?>
                    </td>
                    <td>
                        <?php echo $row['Banco Destino'] ?>
                    </td>
                    <td>
                        <?php echo $row['Cuenta Destino'] ?>
                    </td>
                    <td>
                        <?php echo $row['Tipo Cuenta Destino'] ?>
                    </td>
                    <td>
                        <?php echo $row['Numero Identificacion'] ?>
                    </td>
                    <td>
                        <?php echo $row['Valor Transaccion'] ?>
                    </td>
                    <td>
                        <?php echo $row['CUS'] ?>
                    </td>
                    <td>
                        <?php echo $row['Descripcion'] ?>
                    </td>
                    <td>
                        <?php echo $row['CBC'] ?>
                    </td>
                    <td>
                        <?php echo $row['Time CBC'] ?>
                    </td>
                    <td>
                        <?php echo $row['ECB'] ?>
                    </td>
                    <td>
                        <?php echo $row['Time ECB'] ?>
                    </td>
                    <td>
                        <?php echo $row['CFB'] ?>
                    </td>
                    <td>
                        <?php echo $row['time CFB'] ?>
                    </td>
                    <td>
                        <?php echo $row['OFB'] ?>
                    </td>
                    <td>
                        <?php echo $row['Time OFB'] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include("includes/footer.php") ?>