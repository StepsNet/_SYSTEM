<?php
// funkce pro stránky

function nazevMenu() {
    $menu = array();
    
    $query = 'SELECT * FROM '.T_MENU.' ';
    $v = my_SQL($query);
    while($z = mysql_fetch_array($v)) {
        $menu[$z['id']] = $z['nazev'];
    }
    
    return $menu;
}

function jmenoUpravil($user) {
    $user = 'neznámý';
    if($user>0) {
        $query = 'SELECT jmeno FROM '.T_USERS.' WHERE id = '.$user.' LIMIT 1';
        $v = my_SQL($query);
        while($z = mysql_fetch_array($v)) {
            $user= $z['jmeno'];
        }
    }
    
    
    return $user;
}

function strankySubList($zarazenoDo,$level,$nazevMenu) {
    
    global $jazyk;
    global $tableList;
    
    $odraz = '<span class="level'.$level.'"></span class="fa fa-level-down"></span></span>';   
    $tagy = '';
    $nahoru = '';
    $dolu = '';
    
    $query = 'SELECT * FROM '.T_STRANKY.' WHERE jazyk = '.JAZYK.' AND zarazenoDo = '.$zarazenoDo;
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
        
       
        //formátování hodnot
        $eye = '<a href="'.$main_link.'&amp;action=skryt&amp;id='.$id.'" title="Nezobrazovat stránku na webu" >
                    <span class="fa fa-eye green"></span>
                </a>';
        if($skryta == 1) 
            $eye = '<a href="'.$main_link.'&amp;action=zobrazit&amp;id='.$id.'" title="Zobrazovat stránku na webu" >
                        <span class="fa fa-eye-slash red"></span>
                    </a>';
        
        $nazev = '<a href="'.$main_link.'&amp;action=editace&amp;id='.$id.'" title="Detail stránky - editace">'.$odraz.$nazev.'</a>';
        
        if($poradi == 1) { //prvni položka
            $nahoru = '<span class="fa fa-chevron-up disabled"></span>';
            $dolu = '<a href="'.$main_link.'&amp;action=dolu&amp;id='.$id.'" title="Posunout dolů" ><span class="fa fa-chevron-down aktive"></span></a>';
        }
        if($poradi == $badge) { //poslední položka
            $nahoru = '<a href="'.$main_link.'&amp;action=nahoru&amp;id='.$id.'" title="Posunout nahoru" ><span class="fa fa-chevron-up aktive"></span></a>';
            $dolu = '<span class="fa fa-chevron-down disabled"></span>';
        }
        if($poradi == 1 AND $poradi == $badge) { //jen jedna položka
            $nahoru = '<span class="fa fa-chevron-up disabled"></span>';
            $dolu = '<span class="fa fa-chevron-down disabled"></span>';
        }
        $poradi = $nahoru.$dolu;
                   
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
        
        strankySubList($id,$level+1,$nazevMenu);
    }
}



?>
