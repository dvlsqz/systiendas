<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>MD - Alert</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="mdalert.js?v=<?php echo time(); ?>"></script>
    <script src="examples.js?v=<?php echo time(); ?>"></script>
</head>
<body>
    <div class="mdalert" id="md_alert_dom">
        <div class="md_alert_inside" id="md_alert_inside">
            <div class="md_alert_content" id="md_alert_content"> </div>
            <div class="md_alert_footer" id="md_alert_footer">
                <div class="md_alert_footer_other_btns" id="md_alert_footer_other_btns"> </div>
                <a href="#" class="md_alert_btn_close" id="md_alert_btn_close">Cerrar</a>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="row">
            <div class="col-4 col-md-2">
                <a href="#" id="only_show" class="btn btn-primary w-100">Mostrar</a>
            </div>

            <div class="col-4 col-md-2">
                <a href="#" id="alert_with_actions" class="btn btn-primary w-100">Acciones</a>
            </div>

            <div class="col-4 col-md-2">
                <a href="#" id="alert_confirm" class="btn btn-primary w-100">Eliminarr</a>
            </div>

            <div class="col-4 col-md-2">
                <a href="#" id="alert_callback" class="btn btn-primary w-100">Callback</a>
            </div>

            <div class="col-4 col-md-2">
                <a href="#" id="alert_no_close" class="btn btn-primary w-100">No Cerrar</a>
            </div>
        </div>
    </div>
</body>
</html>