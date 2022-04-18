<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISGE-HO |SISTEMA DE GESTION HOSPITALARIA|| CONTROL DE HISTORIAS CLINCIAS|| CR° CORPORACION</title>
<link rel="shortcut icon" href="imagenes/logo1.png" />
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                          <img src="imagenes/logo1.png" style="width:100%;height: auto">
                        <h3 class="panel-body" align="center">SISGE-HO</h3>
                        <h1 class="panel-title" align="center">Sistema de Gestion y control Medico</h1>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="verificar.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuario" id="Usuario" name="Usuario" type="Usuario" autofocus required="required">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="Password" name="Password" type="password" value="" required="required">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                               
                                <input name="button" type="submit"  class="btn btn-lg btn-success btn-block" id="button"  style="font-size:                                                 12px;"   value="  VALIDAR  USUARIO " 
                                onClick="MM_validateForm('Usuario','','R','Password','','R');return document.MM_returnValue">

                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
