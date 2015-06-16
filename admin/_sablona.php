<?php
?>
<!DOCTYPE html>
<html lang="cs-CZ">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    
    <!-- Font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css' />
    <link href="fonts/font-awesome-4.3.0/css/font-awesome.css " rel="stylesheet">
    
    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    
    <?php echo $PATA_CSS; ?>
    
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script>
        function loader() {
        document.getElementById('loader').style.display="none";
        }
    </script>

    
  </head>
  <body onload="loader()">
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header col-sm-3 col-md-2">
            
            
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="<?php echo $brand_active.' ';?>navbar-brand" href="http://<?php echo $_SERVER['SERVER_NAME'].'/admin/';?>"><span class="glyphicon glyphicon-blackboard hidden-sm" aria-hidden="true"></span>Administrace</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="<?php echo $stranky_active.' ';?>dropdown"><!-- <li class="active dropdown">-->
                    <a href="#seznamstranek" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="fa fa-file-text-o hidden-sm" aria-hidden="true"></span>Stránky&nbsp;&nbsp;<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="./?cast=stranky&amp;action=seznam">Seznam stránek</a></li>
                        <li><a href="./?cast=stranky&amp;action=nova">Vytvořit novou stránku</a></li>
                    </ul>
              </li>
              <li class="dropdown">
                    <a href="#foto" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="fa fa-file-image-o hidden-sm" aria-hidden="true"></span>Foto&nbsp;&nbsp;<span class="caret">
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#knihovnaobrazku">Knihovna obrázků</a></li>
                        <li><a href="#novafoto">Přidat obrázek</a></li>
                        <li class="divider"></li>
                        <li><a href="#seznamsad">Sady obrázků</a></li>
                        <li><a href="#novasada">Vytvořit novou sadu</a></li>
                    </ul>             
              </li>
              <li class="dropdown">
                    <a href="#files" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="fa fa-paperclip hidden-sm" aria-hidden="true"></span>Soubory&nbsp;&nbsp;<span class="caret">
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#knihovna souborů">Knihovna souborů</a></li>
                        <li><a href="#novysoubor">Přidat soubor</a></li>
                    </ul> 
              </li>
              <li class="dropdown">
                <a href="#nastaveni" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <span class="fa fa-cogs hidden-sm" aria-hidden="true"></span>Nastavení&nbsp;&nbsp;<span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#nastaveniudaju">Uživatelská data</a></li>
                  <li><a href="#">Nastavení šablony</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Nastavení systému</a></li>
                  <li><a href="#">Seznam Administrátorů</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
      
      
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 main">
                <?php echo $DATA;?>
            </div>
         </div>
         <div id="loader"><span class="fa fa-refresh"></span></div>
       </div><!-- /container -->
    
    
    
    
    
    
    
    
    <?php echo $PATA;?>
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    <?php echo $ADD_JS;?>
    
  </body>
</html>
