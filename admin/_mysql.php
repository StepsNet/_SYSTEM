<?php




if ($_SERVER['SERVER_NAME'] == "localhost") {
	$jmeno_db = "_system";
	$servername = "localhost";
	$username = "root";
	$pass = "";
}
else {
    $jmeno_db ='1983_132727';
    $servername = "mysql5-3";
    $username = "1983.132727";
    $pass = "stepsnet"; 
}

$conn = mysql_connect($servername,$username,$pass) 
or die(my_SQL_ERROR($query,mysql_error(),__LINE__,__FILE__));


$db = mysql_select_db($jmeno_db,$conn);


mysql_query("SET NAMES utf8 collate utf8_czech_ci"); //p�ek�duje DB do utf8
mysql_query("SET COLLATION_CONNECTION='utf8_general_ci"); 


// databazove tabulky
define('TBL', "SYSTEM_"); // 
define('T_HOSTING', TBL."hosting"); // str�nky
define('T_JAZYKY', TBL."jazyky"); // str�nky
define('T_STRANKY', TBL."stranky"); // str�nky
define('T_MENU', TBL."menu"); // menu pro str�nky
define('T_USERS', TBL."users"); // u�ivatele administrace


// $TABLE = array();
// $query = "SHOW TABLES FROM ".$jmeno_db;
// $v = mysql_query($query);
// while ($z = mysql_fetch_row($v)) {
//     $TABLE[] = $z[0];
// }

// nastaveni jazyka
if(!isset($_SESSION['ADM']['jazyk'])) $_SESSION['ADM']['jazyk'] = 1;
define('JAZYK', $_SESSION['ADM']['jazyk']);


/* DOTAZ mysql + v�pis chyby sql ****************************************************************/
function my_SQL($query) {
    global $conn;
    $v=mysql_query($query) or die(my_SQL_ERROR($query,mysql_error(),__LINE__,__FILE__));
    return $v;
}

function my_SQL_ERROR($query,$error,$line,$file) {
    // vypis chyby
	echo '<div id="chyba"><h2>CHYBA MySQL</h2>';
	echo 'radek cislo:<strong>'.$line.'</strong> v souboru <strong>'.$file.'</strong><br />';
	echo 'zneni prikazu: '.$query.'<br />';
	echo 'Hlaseni MySQL: <strong>'.$error.'</strong>';
	
	//ulo�en� do tabulky chyb
	
	
	//odesl�n� mailu
	
}
/* END */




?>
