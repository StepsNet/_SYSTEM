<?php

$PRIHLASENI = 0;

$INFO = '<div class="alert" role="alert"><h3>Přihlášení</h3><strong>Redakční systém</strong><br />správa obsahu '.$_SERVER['SERVER_NAME'].'<br /></div>';

//kontrola nastavené COOKIE  - pokud je nalezena COOKIE, zkontroluje zda je odpovídající uživatel dostupný
if(isset($_COOKIE['admin_user_id']) AND $_COOKIE['admin_user_id'] > 0) {
    //pokud je nalezena COOKIE, zkontroluje zda je odpovídající uživatel 
    $query = 'SELECT id, jmeno, typ, cookie FROM system_users WHERE id = '.$_COOKIE['admin_user_id'];
    $v = my_SQL($query); 
    if(mysql_num_rows($v) > 0) { //jsou vysledky, provedeme přihlášení na základě cookie
        $PRIHLASENI = prihlasit($v);
        Header('location: http://'.$_SERVER['SERVER_NAME'].'/admin/');
        exit;
    }
}

    
//přihlašování přes formulář - kontrola uživatele - nastavení cookie
if(isset($_GET['prihlaseni']) AND !empty($_POST)) {
    $_SESSION['login_form']['email'] = $login = trim($_POST['user-email']);
    $heslo = trim($_POST['user-password']);
    $query = 'SELECT id, jmeno, typ, cookie FROM system_users WHERE login = "'.$login.'" AND heslo = "'.$heslo.'"';
    $v = my_SQL($query);
    if(mysql_num_rows($v) > 0) {
        $PRIHLASENI = prihlasit($v);
        unset($_SESSION['login']['email']);
        Header('location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
    else {
        $INFO = '<div class="alert alert-danger" role="alert"><h3>Přihlášení</h3><strong>Chyba!</strong><br />Přihlašovací jméno a heslo nebylo nalezeno<br /></div>';
    }
}
  
    
include_once($_SERVER['DOCUMENT_ROOT'].'/admin/_pata.php');
    
    
    
    
?>
<!DOCTYPE html>
<html lang="cs-CZ">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css' />

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
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
    
   
    
  </head>
  <body>
  
    <div class="container">
          <form class="form-login" method="post" action="?prihlaseni">
          <?php echo $INFO;?>
            <label for="inputEmail" class="sr-only">Jméno</label>
            <div class="obly-stin">
            <div class="input-group">
                <span class="input-group-addon stin" id="sizing-addon1">@</span>
                <input type="email" name="user-email" id="inputEmail" class="form-control stin" aria-describedby="sizing-addon1" placeholder="Přihlašovací jméno" required autofocus>
            </div>
            </div>
            
            <div class="obly-stin">
                <label for="inputPassword" class="sr-only">Heslo</label>
                <input type="password" name="user-password" id="inputPassword" class="form-control stin" placeholder="Heslo" required>
            </div>
            
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">  Trvalé přihlášení
              </label>
            </div>
            
            <!-- Split button -->
            <div class="btn-group obly-stin">
              <button type="button" class="btn btn-primary btn-lg stin" onclick="submit()" >Přihlásit</button>
              <button type="button" class="btn btn-primary dropdown-toggle btn-lg stin" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Rozbalit</span>
              </button>
              
              <ul class="dropdown-menu" role="button">
                <li><a role="button" href="#" onclick="submit()">Přihlásit</a></li>
                <li><a role="button" href="#" onclick="submit()">Zapomenuté heslo</a></li>
              </ul>
            </div>
          </form>
    </div><!-- /container -->
    
    <?php echo $PATA;?>
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
