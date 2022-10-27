<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prueba NEC</title>
    <link href="<?php echo base_url('../../assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('../../assets/js/bootstrap.bundle.min.js'); ?>"></script>
</head>

<body>
    <h3 class="text-center">Formulario de registro de ventas</h3>
    <form>
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="formGroupExampleInput">Marca</label>
                    <select class="form-control">
                        <option selected>Open this select menu</option>
                    </select>
                </div>
                <div class="col">
                <label for="formGroupExampleInput">Modelo</label>
                    <select class="form-control">
                        <option selected>Open this select menu</option>
                    </select>
                </div>
            </div>
            <div class="text-center m-2">
            <button type="button" class="btn btn-primary">Registrar</button>
            </div>
        </div>
    </form>
</body>

</html>
<script>
    window.onload = function() {
        setTimeout(getBrand, 500);
    }

    function getBrand() {

    }
</script>