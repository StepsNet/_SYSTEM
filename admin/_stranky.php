<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/admin/funkce/_funkce_pro_stranky.php');

$badge = 0;
$th_misto = '';
$td_misto = '';
$razeni = array();
$SORTBY = '';
$SMER = '';
$table_header = '';
$table_list = '';
$table= '';

$fa['eye']['desc'] = '<span class="fa fa-eye-slash"></span>';
$fa['eye']['asc'] = '<span class="fa fa-eye"></span>';

$fa['nazev_alpha']['desc'] = '<span class="fa fa-sort-alpha-desc"></span>';
$fa['nazev_alpha']['asc'] = '<span class="fa fa-sort-alpha-asc"></span>';

if(isset($_GET['sortby']) AND isset($_GET['smer'])) { 
    $SORTBY = $_GET['sortby'];
    $SMER = $_GET['smer'];   
    //viditelnost
    if($_GET['sortby'] == 'eye') {
        if($_GET['smer'] == 'asc') $razeni['eye'] = 'desc';
        else $razeni['eye'] = 'asc';
    }
    else {
        $razeni['eye'] = 'asc';
    }
    
    //nazev
    if($_GET['sortby'] == 'nazev') {
        if($_GET['smer'] == 'asc') $razeni['nazev_alpha'] = 'desc';
        else $razeni['nazev_alpha'] = 'asc';
    }
    else {
        $razeni['nazev_alpha'] = 'asc';
    }
    
    //menu
    if($_GET['sortby'] == 'menu') {
        if($_GET['smer'] == 'asc') $razeni['menu'] = 'desc';
        else $razeni['menu'] = 'asc';
    }
    else {
        $razeni['menu'] = 'asc';
    }
    
    //aktualizace
    if($_GET['sortby'] == 'aktualizace') {
        if($_GET['smer'] == 'asc') $razeni['aktualizace'] = 'desc';
        else $razeni['aktualizace'] = 'asc';
    }
    else {
        $razeni['aktualizace'] = 'asc';
    }
    
    //upravil
    if($_GET['sortby'] == 'upravil') {
        if($_GET['smer'] == 'asc') $razeni['upravil'] = 'desc';
        else $razeni['upravil'] = 'asc';
    }
    else {
        $razeni['upravil'] = 'asc';
    }
}
else {
   $razeni['eye'] = 'asc';
   $razeni['nazev_alpha'] = 'asc';
   $razeni['menu'] = 'asc';
   $razeni['aktualizace'] = 'asc';
   $razeni['upravil'] = 'asc';
}




//SEZNAM STRÁNEK
// *****************************************************************************

if(isset($_GET['action']) AND $_GET['action'] == 'seznam') {
    
    $tableList = '';
    $nazevMenu = nazevMenu();
    $nahoru = '';
    $dolu = '';
    
    //pokud je třídění podle čehokoliv nezobrazujeme seznam podle zařazení a opačně)
    if($SORTBY == '') {
        $where_zarazeno = 'AND zarazenoDo = 0 ';
        $SORTBY = 'ORDER BY inMenu';
        $SMER = 'ASC';
    }
    else {
       $where_zarazeno = ''; 
    }
    
    $query = 'SELECT * FROM '.T_STRANKY.' WHERE jazyk = '.JAZYK.' '.$where_zarazeno.' '.$SORTBY.' '.$SMER.'';
    $v = my_SQL($query);
    if(mysql_num_rows($v) > 0) $badge = mysql_num_rows($v);
    while($z = mysql_fetch_array($v)) {
        $id = $z['id'];
        $nazev = $z['nazev'];
        $text = $z['text'];
        $inMenu = $z['inMenu'];
        $skryta = $z['skryta'];
        $anotace = $z['anotace'];
        $poradi = $z['poradi'];
        $aktualizace = $z['aktualizace'];
        $aktTimestamp = $z['aktTimestamp'];
        $registrovane = $z['registrovane'];
        $zarazenoDo = $z['zarazenoDo'];
        $homepage = $z['homepage'];
        $upravil = jmenoUpravil($z['upravil']);
        
        
       
        //formátování hodnot
        $eye = '<a href="'.$main_link.'&amp;action=skryt&amp;id='.$id.'" title="Nezobrazovat stránku na webu" >
                    <span class="fa fa-eye text-success"></span>
                </a>';
        if($skryta == 1) 
            $eye = '<a href="'.$main_link.'&amp;action=zobrazit&amp;id='.$id.'" title="Zobrazovat stránku na webu" >
                        <span class="fa fa-eye-slash text-danger"></span>
                    </a>';
        // -
        $nazev = '<a href="'.$main_link.'&amp;action=editace&amp;id='.$id.'" title="Detail stránky - editace">'.$nazev.'</a>';
        // -
        if($poradi == 1) { //prvni položka
            $nahoru = '<span class="fa fa-chevron-up disabled"></span>';
            $dolu = '<a href="'.$main_link.'&amp;action=dolu&amp;id='.$id.'" title="Posunout dolů" ><span class="fa fa-chevron-down text-danger"></span></a>';
        }
        if($poradi == $badge) { //poslední položka
            $nahoru = '<a href="'.$main_link.'&amp;action=nahoru&amp;id='.$id.'" title="Posunout nahoru" ><span class="fa fa-chevron-up text-success"></span></a>';
            $dolu = '<span class="fa fa-chevron-down disabled"></span>';
        }
        if($poradi == 1 AND $poradi == $badge) { //jen jedna položka
            $nahoru = '<span class="fa fa-chevron-up disabled"></span>';
            $dolu = '<span class="fa fa-chevron-down disabled"></span>';
        }
        $poradi = $nahoru.$dolu;
        // -          
        $R = '';
        if($registrovane == 1) $R = '<span class="fa fa-user-plus"></span><span class="hidden-xs">pro registrované</span>';
        $H = '';
        if($homepage == 1) $H = '<span class="fa fa-home"></span><span class="hidden-xs">úvodní stránka</span>';
        if($R != '' OR $H != '') 
        $tagy = '<span class="tagy">'.$R.$H.'</span>';
        
        //vypis položek
        $tableList .= '
        <tr>
            <td class="eye">'.$eye.'</td>
            <td class="name master">'.$nazev.$tagy.'</td>
            <td class="poradi hidden-xs">'.$poradi.'</td>
            <td class="aktualizace col-md-1 col-lg-1 hidden-xs hidden-sm">'.$aktTimestamp.'</td>
            <td class="upravil col-md-1 col-lg-1 hidden-xs hidden-sm">'.$upravil.'</td>
            <td class="menu col-md-1 col-sm-2 col-lg-1 hidden-xs">'.$nazevMenu[$inMenu].'</td>
        </tr>
        ';
        
        if($SORTBY == '') strankySubList($id,1,$nazevMenu);
   
    }

    if($badge > 0) $badge = '&nbsp;&nbsp;<span class="badge">'.$badge.'</span>';
    else $badge = '';





    $tableHeader = '
          <thead>
            <tr >
              <th class="eye">
                <a href="'.$main_link.'&amp;action=seznam&amp;sortby=eye&amp;smer='.$razeni['eye'].'" title="Setřídit podle viditelnosti" >'.$fa['eye'][$razeni['eye']].'</a>
              </th>
              <th class="name master">
                &nbsp;&nbsp;&nbsp;Název
                <a class="sort" href="'.$main_link.'&amp;action=seznam&amp;sortby=nazev&amp;smer='.$razeni['nazev_alpha'].'" title="Výchozí řazení podle zařazení a pozice" >
                    <span class="fa fa-refresh"></span>
                </a>
                <a class="sort" href="'.$main_link.'&amp;action=seznam&amp;sortby=nazev&amp;smer='.$razeni['nazev_alpha'].'" title="Setřídit podle názvu" >
                    '.$fa['nazev_alpha'][$razeni['nazev_alpha']].'
                </a>
              </th>
              <th class="poradi hidden-xs">
                Pořadí&nbsp;&nbsp;<span class="fa fa-sort hidden-sm"></span>
              </th>
              <th class="aktualizace hidden-xs col-md-1 col-lg-1 hidden-sm">
                <a href="'.$main_link.'&amp;action=seznam&amp;sortby=aktualizace&amp;smer='.$razeni['aktualizace'].'" title="Setřídit podle data aktualizace" >
                Aktualizace&nbsp;&nbsp;<span class="fa fa-clock-o hidden-sm"></span> 
                </a>
              </th>
              <th class="upravil hidden-xs hidden-sm col-md-1 col-lg-1">
                <a href="'.$main_link.'&amp;action=seznam&amp;sortby=upravil&amp;smer='.$razeni['upravil'].'" title="Setřídit podle editora" >
                Upravil&nbsp;&nbsp;<span class="fa fa-pencil-square-o hidden-sm"></span> 
                </a>
              </th>
              <th class="menu hidden-xs col-md-1 col-sm-2 col-lg-1">
                <a href="'.$main_link.'&amp;action=seznam&amp;sortby=menu&amp;smer='.$razeni['menu'].'" title="Setřídit podle zařazení do menu" >
                Umístění&nbsp;&nbsp;<span class="fa fa-list-alt hidden-sm"></span> 
                </a>
              </th>
            </tr>
          </thead>
    ';

   
    if($tableList != '') {
        $table = '
        <div class="panel panel-transparent col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="seznam table table-hover">
              '.$tableHeader.'
              <tbody>
              '.$tableList.'
              </tbody>
            </table>
        </div>
        ';
    }
    else $table = '<div class="alert alert-info col-xs-12 col-sm-12 col-md-12 col-lg-12" role="alert"><strong>Prázdno!</strong> Nejsou žádné stránky.</div>';

    $DATA = $table;


    $DATA = '
             '.$JAZYKY.' <h2 class="page-header">Seznam stránek'.$badge.'</h2>
              '.$DATA.'
    ';
}


?>

