<?php

// <div class="row placeholders">
//             <div class="col-xs-6 col-sm-3 placeholder">
//               <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
//               <h4>Label</h4>
//               <span class="text-muted">Something else</span>
//             </div>
//             <div class="col-xs-6 col-sm-3 placeholder">
//               <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
//               <h4>Label</h4>
//               <span class="text-muted">Something else</span>
//             </div>
//             <div class="col-xs-6 col-sm-3 placeholder">
//               <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
//               <h4>Label</h4>
//               <span class="text-muted">Something else</span>
//             </div>
//             <div class="col-xs-6 col-sm-3 placeholder">
//               <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
//               <h4>Label</h4>
//               <span class="text-muted">Something else</span>
//             </div>
//           </div>

// <h2 class="sub-header">Section title</h2>
//           <div class="table-responsive">
//             <table class="table table-striped">
//               <thead>
//                 <tr>
//                   <th>#</th>
//                   <th>Header</th>
//                   <th>Header</th>
//                   <th>Header</th>
//                   <th>Header</th>
//                 </tr>
//               </thead>
//               <tbody>
//                 <tr>
//                   <td>1,001</td>
//                   <td>Lorem</td>
//                   <td>ipsum</td>
//                   <td>dolor</td>
//                   <td>sit</td>
//                 </tr>
//                 <tr>
//                   <td>1,002</td>
//                   <td>amet</td>
//                   <td>consectetur</td>
//                   <td>adipiscing</td>
//                   <td>elit</td>
//                 </tr>
//                 <tr>
//                   <td>1,003</td>
//                   <td>Integer</td>
//                   <td>nec</td>
//                   <td>odio</td>
//                   <td>Praesent</td>
//                 </tr>
//                 <tr>
//                   <td>1,003</td>
//                   <td>libero</td>
//                   <td>Sed</td>
//                   <td>cursus</td>
//                   <td>ante</td>
//                 </tr>
//                 <tr>
//                   <td>1,004</td>
//                   <td>dapibus</td>
//                   <td>diam</td>
//                   <td>Sed</td>
//                   <td>nisi</td>
//                 </tr>
//                 <tr>
//                   <td>1,005</td>
//                   <td>Nulla</td>
//                   <td>quis</td>
//                   <td>sem</td>
//                   <td>at</td>
//                 </tr>
//                 <tr>
//                   <td>1,006</td>
//                   <td>nibh</td>
//                   <td>elementum</td>
//                   <td>imperdiet</td>
//                   <td>Duis</td>
//                 </tr>
//                 <tr>
//                   <td>1,007</td>
//                   <td>sagittis</td>
//                   <td>ipsum</td>
//                   <td>Praesent</td>
//                   <td>mauris</td>
//                 </tr>
//                 <tr>
//                   <td>1,008</td>
//                   <td>Fusce</td>
//                   <td>nec</td>
//                   <td>tellus</td>
//                   <td>sed</td>
//                 </tr>
//                 <tr>
//                   <td>1,009</td>
//                   <td>augue</td>
//                   <td>semper</td>
//                   <td>porta</td>
//                   <td>Mauris</td>
//                 </tr>
//                 <tr>
//                   <td>1,010</td>
//                   <td>massa</td>
//                   <td>Vestibulum</td>
//                   <td>lacinia</td>
//                   <td>arcu</td>
//                 </tr>
//                 <tr>
//                   <td>1,011</td>
//                   <td>eget</td>
//                   <td>nulla</td>
//                   <td>Class</td>
//                   <td>aptent</td>
//                 </tr>
//                 <tr>
//                   <td>1,012</td>
//                   <td>taciti</td>
//                   <td>sociosqu</td>
//                   <td>ad</td>
//                   <td>litora</td>
//                 </tr>
//                 <tr>
//                   <td>1,013</td>
//                   <td>torquent</td>
//                   <td>per</td>
//                   <td>conubia</td>
//                   <td>nostra</td>
//                 </tr>
//                 <tr>
//                   <td>1,014</td>
//                   <td>per</td>
//                   <td>inceptos</td>
//                   <td>himenaeos</td>
//                   <td>Curabitur</td>
//                 </tr>
//                 <tr>
//                   <td>1,015</td>
//                   <td>sodales</td>
//                   <td>ligula</td>
//                   <td>in</td>
//                   <td>libero</td>
//                 </tr>
//               </tbody>
//             </table>
//           </div>

/* INFO o hosingu - obsazení prostoru*/
function dejObsazeniSoubory($zacit, $vynechat = null) { 
    $filesize = 0;
    $co = null;
    $nebrat = $vynechat."/";

    if (is_dir($zacit)) {
        if ($dh = opendir($zacit)) {
            while (($file = readdir($dh)) !== false) {
                $co = $zacit.'/'.$file;
                if(filetype($co) == "file" ) {
                    $filesize = $filesize + filesize($co);
                    //echo "<br />filename: $file : filetype: " . filetype($co) . " filesize: " . filesize($co) . "\n";
                }
                if(filetype($co) == "dir" ) {
                    if($file != ".." AND $file != "." AND $co != $vynechat) {
                       $filesize = $filesize + dejObsazeniSoubory($co) ;
                    }
                }      
            }
            closedir($dh);
        }
    }    
    return $filesize; 
    
}

function dejObsazeniMysql() {
    global $jmeno_db;
    $total = 0;
    $query ="SHOW TABLE STATUS FROM ".$jmeno_db;
    $v = my_SQL($query); 
    while($z = mysql_fetch_array($v)) {
        $total += $z['Data_length']+$z['Index_length'];
    }
    return $total;
}

function formatFileSize($data) {
   if($data < 1024) {
     return $data." b";
   }
   elseif($data < 1024000) {
     return round(($data / 1024), 1)." kB";
   }
   else {
     return round(($data / 1024000 ), 1)." MB";
   }
} 
  
$query = 'SELECT prostor FROM '.T_HOSTING.' LIMIT 1 ';
$v = my_SQL($query);
if(mysql_num_rows($v) > 0) {
    $obsazeno_administrace = 0;
    $obsazeno_files = 0;
    $obsazeno_mysql = 0;
     while($z = mysql_fetch_array($v)) {
        $prostor = $z['prostor'] * 1000 * 1024;
        $obsazeno_administrace = dejObsazeniSoubory($_SERVER['DOCUMENT_ROOT'].'/admin');
        $obsazeno_files = dejObsazeniSoubory($_SERVER['DOCUMENT_ROOT'],$_SERVER['DOCUMENT_ROOT'].'/admin');
        $obsazeno_mysql = dejObsazeniMysql();
    }
//     echo "<br />".$obsazeno_administrace;
//     echo "<br />".$obsazeno_files;
//     echo "<br />".$obsazeno_mysql;
    
    $celkem = $obsazeno_administrace + $obsazeno_files + $obsazeno_mysql;
    $procento_prostor = $prostor / 100; //procento v bitech
    $procenta = round($celkem/$procento_prostor); //prostor je zadaný v MB   
    if($procenta > 0) $barColor = "rgba(153,204,153,0.8)";
    if($procenta > 80) $barColor = "rgba(255,102,0,0.8)";
    if($procenta > 90) $barColor = "rgba(204,0,0,0.8)";
    
    //procenta pro BAR
    //$celkem = 100%
    $dataProcenta = $celkem / 100;
    $procentaObsazenoAdministrace = round($obsazeno_administrace/$dataProcenta);
    $procentaObsazenoFiles = round($obsazeno_files/$dataProcenta);
    $procentaObsazenoMysql = round($obsazeno_mysql/$dataProcenta);
    
    if($procentaObsazenoMysql ==0) {
        $procentaObsazenoMysql = 1;
        $procentaObsazenoFiles = $procentaObsazenoFiles -1;
    }
    if($procentaObsazenoFiles ==0) $procentaObsazenoFiles = 1;
    if($procentaObsazenoAdministrace ==0) $procentaObsazenoAdministrace = 1;
    
//     echo "<br />".$procentaObsazenoAdministrace;
//     echo "<br />".$procentaObsazenoMysql;
//     echo "<br />".$procentaObsazenoFiles;
    $bar = '
    <div class="wrap-progress">
        <div class="progress">
          <div class="progress-bar progress-bar-info " role="progressbar" aria-valuenow="'.$procentaObsazenoFiles.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$procentaObsazenoFiles.'%">
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-info " role="progressbar" aria-valuenow="'.$procentaObsazenoAdministrace.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$procentaObsazenoAdministrace.'%">
          </div>
        </div>
        <div class="progress">
          <div class="progress-bar progress-bar-info " role="progressbar" aria-valuenow="'.$procentaObsazenoMysql.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$procentaObsazenoMysql.'%">
          </div>
        </div>
        
    </div>';
  

     $graf = '<span id="chart_prostor" data-percent="'.$procenta.'">
		<span class="percent"></span>
	</span>';
      $graf_js = "
    	
    	<script src=\"js/easypiechart.js\"></script>
    	<script>
	document.addEventListener('DOMContentLoaded', function() {
		var chart = window.chart = new EasyPieChart(document.querySelector('#chart_prostor'), {
			easing: 'easeInOutQuad',
			delay: 3000,
			barColor: '".$barColor."',
			trackColor: 'lightgray',
			scaleColor: false,
			lineWidth: 24,
			trackWidth: 20,
			lineCap: 'butt',
			onStep: function(from, to, percent) {
				this.el.children[0].innerHTML = Math.round(percent);
			}
		});

	});
	</script>";
   
    
    //info o hostingu
    $DATA .= '
    <!-- prostor hostingu -->
    <div class="col-sm-6 col-md-4 col-xs-12">
    <div class="panel panel-transparent">
    <div class="panel-body" id="prostor">
      <div class="graf">
        '.$graf.'
      </div>
      <h5>Prostor zaplněn z <strong>'.$procenta.'%</strong>. Celkový prostor <strong>'.formatFileSize($prostor).'</strong></h5>
      <div class="info separator">
      <h5>Skladba jednotlivých dat v zaplněném prostoru</h5> 
	   <p>
        Uživatelské data: <strong>'.formatFileSize($obsazeno_files).'</strong><br />
        Administrace: <strong>'.formatFileSize($obsazeno_administrace).'</strong><br />
        Databáze: <strong>'.formatFileSize($obsazeno_mysql).'</strong><br />
	   </p>
	   '.$bar.'
    </div>
    </div>
    </div>
    </div>
	
    <!-- prostor hostingu -->';
}





/* INFO o Serveru */ 
$server = $_SERVER['SERVER_NAME'];
$server_os = $_SERVER['SERVER_SOFTWARE'];
$server_root =$_SERVER["DOCUMENT_ROOT"];
$server_ip = $_SERVER["SERVER_ADDR"];
$server_admin = $_SERVER["SERVER_ADMIN"];

$safe_mode=ini_get('safe_mode');
if(empty($safe_mode)) $safe_mode='Safe-mode <span class="text-danger"><strong>není povolen</strong></span>';
else $safe_mode='Safe-mode <span class="text-success"><strong>je povolen</strong></span>';
$server_gd=gd_info();
if (!empty($server_gd)) {
  $gd='Grafická podpora GD <span class="text-success"><strong>je zapnutá</strong></span>, <br /> GD verze: '.$server_gd['GD Version'];
  $gd_popis='<br />GD podporuje formáty:<span> ';
  $prvni = 0;
  while (list($key,$val)=each($server_gd)) {
      $prvni++;
      if($val==true AND $prvni>1) $gd_popis.=$key.', ';
  }
  $gd_popis.='</span>';
}
else {
  $gd='Grafická podpora GD <span class="text-danger"><strong>je vypnutá</strong></span>';
  $gd_popis='';
}


function return_bytes($val) {
    $val = trim($val);
    $last = strtolower($val[strlen($val)-1]);
    switch($last) {
        // The 'G' modifier is available since PHP 5.1.0
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }

    return $val;
}

$info_session_path = ini_get("session.save_path");
$info_session_maxlifetime = ini_get("session.gc_maxlifetime");
$info_session_maxlifetime_minut = $info_session_maxlifetime / 60;
$info_execution_time =ini_get("max_execution_time");

$info_error_reporting = ini_get('display_errors');
$info_registr_global = ini_get('register_globals');
$info_post_max_size = ini_get('post_max_size');



$next_info_server = '
Provozovatel server hosting: '.$_SERVER["SERVER_ADMIN"].'<br />
Adresář pro Session: '.$info_session_path.'<br />
Životnost Session: '.$info_session_maxlifetime.'s ('.$info_session_maxlifetime_minut.' min )<br />
Maximální čas pro php script: '.$info_execution_time.'s<br />
Výpis PHP chyb nastaven na : '.$info_error_reporting.'<br />
Nastavení globálních proměnných: '.$info_registr_global.'<br />
Maximální velikost POST dat: '.$info_post_max_size.'<br />
'.$safe_mode.'<br />
'.$gd.'
'.$gd_popis.'<br />
Další údaje vám zprostředkuje <a href="http://'.$_SERVER['SERVER_NAME'].'/admin/info.php">info()</a>
';

//info o hostingu
$DATA .= '
<!-- hosting server info -->
<div class="col-sm-6 col-md-4 col-xs-12">
<div class="panel panel-transparent">
<div class="panel-body">
<h3>
<span class="semi-bold"><span class="fa fa-server"></span>&nbsp;&nbsp;Váš server hosting</span>
    <a class="next-info" data-toggle="collapse" href="#collapseNextInfoServer" aria-expanded="false" aria-controls="collapseNextInfoUser"> Více <span class="fa fa-chevron-down"></span></a>
</h3>
<p>'.$server_os.'</p>
<div class="info separator">
    Umístění webu na hostingu: '.$server_root.'<br />
    IP adresa serveru: '.$server_ip.'
</div>
<p class="info collapse" id="collapseNextInfoServer">'.$next_info_server.'</p>
</div>
</div>
</div>
<!-- user device info KONEC -->';




/* INFO o uživateli */
$ip = $_SERVER['REMOTE_ADDR']; // IP uzivatele
$pc = gethostbyaddr($_SERVER['REMOTE_ADDR']); // nazev pocitace uzivatele
if (SetCookie ("test", "ano")) $cookies='<strong>Cookies</strong> jsou Vašem prohlížeči <span class="text-success"><strong>povolené.</strong></span>';
else $cookies='<strong>Cookies</strong> nejsou ve Vašem prohlížeči <span class="bold text-danger"><strong>zakazané</strong></sapn>';
if($STROJ == "desktop") $device = '<span class="fa fa-desktop"></span>';
if($STROJ == "mobile") $device = '<span class="fa fa-tablet"></span>';


$next_info_device = '
Systémový název Vašeho zařízení: <strong>'.$pc.'</strong><br />
Přistupujete z IP adresy: <strong>'.$ip.'</strong><br />
'.$cookies.'
';


//info o uživateli
$DATA .= '
<!-- user device info -->
<div class="col-sm-6 col-md-4 col-xs-12">
<div class="panel panel-transparent">
<div class="panel-body">
<h3>
<span class="semi-bold">'.$device.'&nbsp;&nbsp;Vaše zařízení</span>
    <a class="next-info" data-toggle="collapse" href="#collapseNextInfoUser" aria-expanded="false" aria-controls="collapseNextInfoUser"> Více <span class="fa fa-chevron-down"></span></a>
</h3>
<p>Vaše zařízení bylo detekováno jako <strong>'.$STROJ.'</strong></p>
<div class="info separator">'.$_SERVER['HTTP_USER_AGENT'].'</div>
<p class="info collapse" id="collapseNextInfoUser">'.$next_info_device.'</p>
</div>
</div>
</div>
<!-- user device info KONEC -->';





$DATA = '
  <h1 class="page-header">Vítejte, <span class="semi-bold smaller">redakční systém na správu obsahu <strong>'.$_SERVER['SERVER_NAME'].'</strong><span></h1>
  '.$DATA.'
';

$ADD_JS = $graf_js;
?>

