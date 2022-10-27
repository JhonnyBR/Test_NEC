<?php
$this->brand = new \App\Models\BrandsModel();
$brands = $this->brand->findAll();
?>
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
    <form id="FormSale">
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="control-label">Marca</label>
                    <select class="form-control" name="brand" id="brand" required onchange="getModelsavalibility()">
                        <option selected>Open this select menu</option>
                        <?php
                        foreach($brands as $b){?>
                           <option value="<?php echo $b['Id_marca'];?>"><?php echo $b['Nombre_marca'];?></option> 
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="col">
                <label for="control-label">Modelo</label>
                    <select class="form-control" id="modelbrand" name="modelbrand" required onchange="getmax()">
                        <option selected>Open this select menu</option>
                    </select>
                </div>
                <div class="col">
                    <label for="control-label">Cantidades vendidas</label>
                    <input type="number" name="cant" id="cant" min="1" value="1" required class="form-control" >
                    <input type="hidden" name="value" id="value" value="0">
                </div>
            </div>
            <div class="text-center m-2">
            <button type="button" class="btn btn-primary" onclick="InsertSale()">Registrar</button>
            </div>
        </div>
        <div class="col-12 m-5">
            <h3>El formulario ha sido diseñado de tal manera de que se debe seleccionar primero la marca del vehículo, luego de esto se obtendrán los modelos con disponibilidad y automáticamente se asignará el número máximo en stock al input.</h3>
        </div>
    </form>
</body>
</html>
<script>
    var maxsale = 0;
    function getModelsavalibility(){
        var idbrand = $('#brand').val();
        if(idbrand != ''){
            $('#modelbrand option').remove();
            $.ajax({
                url: '<?php echo base_url(). "/GetModels"; ?>',
                method: "POST",
                data: {
                    code: idbrand
                },
                dataType: "json",
                success: function(data){
                    var models = data.data;
                    $('#modelbrand').append('<option value="" >Seleccione un modelo</option>');
                    models.forEach(function(valor, indice){
                        $('#modelbrand').append('<option value="' + valor['Id_modelo'] + '" >' + valor['Nombre_modelo'] + '</option>');
                    });
                }
            });

        }
    }
    function getmax(){
        var model = $('#modelbrand').val();
        $.ajax({
            url: '<?php echo base_url(). "/Getabiliavility"; ?>',
            method: "POST",
            data: {
                code: model
            },
            dataType: "json",
            success: function(data){
                maxsale = data.data;
                var elment = document.getElementById("cant");
                elment.setAttribute("max", maxsale);
            }
        });
        getValue();
    }

    function getValue(){
        var model = $('#modelbrand').val();
        $.ajax({
            url: '<?php echo base_url(). "/Getprice"; ?>',
            method: "POST",
            data: {
                code: model
            },
            dataType: "json",
            success: function(data){
                var val = document.getElementById("value").value = data.data;
                val.setAttribute("value", data.data);
            }
        });
    }
    function InsertSale(){
        var models = $('#modelbrand').val();
        var valuebase = $('#value').val();
        var cant = $('#cant').val();
        $.ajax({
            url: '<?php echo base_url(). "/SaveSale"; ?>',
            method: "POST",
            data: {
                model: models,
                base: valuebase,
                cant: cant,
                act: maxsale
            },
            dataType: "json",
            success: function(data) {
                if (data.statuscode === 200) {
                    alert('Venta Registrada');
                    location.reload();
                } else {
                    alert('No se ha podido registrar la venta');
                    location.reload();
                }
            }
        });
    }
 </script>   