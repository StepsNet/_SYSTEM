<?php
// funkce pro nastavení prihlaseni 
function prihlasit($data) {
    $prihlaseni = 0;
    while($z = mysql_fetch_array($data)) {
        $cookie = 0;
        $_SESSION['admin']['login_user_id'] = $z['id'];
        $_SESSION['admin']['login_user_typ'] = $z['typ'];
        $_SESSION['admin']['login_user_jmeno'] = $z['jmeno'];
        $_SESSION['admin']['login_user_cookie'] = $z['cookie'];
        $cookie = $z['cookie']; 
              
        if($cookie == 1) {
            nastavCookie('admin_user_id', $_SESSION['admin']['login_user_id']);
            nastavCookie('admin_user_typ', $_SESSION['admin']['login_user_typ']);
            nastavCookie('admin_user_jmeno', $_SESSION['admin']['login_user_jmeno']);
        }
        $prihlaseni = 1;
    }  
    return $prihlaseni;
}



function odhlasit() {
        unset($_SESSION['admin']['login_user_id']);
        unset($_SESSION['admin']['login_user_typ']);
        unset($_SESSION['admin']['login_user_jmeno']);
        
        nastavCookie('admin_user_id', $_SESSION['admin']['login_user_id'],0);
        nastavCookie('admin_user_typ', $_SESSION['admin']['login_user_typ'],0);
        nastavCookie('admin_user_jmeno', $_SESSION['admin']['login_user_jmeno'],0);
        
        unset($_SESSION['vstup']['user_id']);
        unset($_SESSION['vstup']['user_typ']);
        unset($_SESSION['vstup']['user_jmeno']);
}


//funkce - script z http://detectmobilebrowsers.com/
function getStroj() {
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        $stroj = 'mobile';
    else 
        $stroj = 'desktop';
    
    return $stroj;
}


/* funkce pro převod názvů diakritika malá písmena ****************************************************************/
function prevod_nazvu($vstup,$strlower,$podtrzitko) {
  static $convertTable = array (
        'á' => 'a', 'Á' => 'A', 'ä' => 'a', 'Ä' => 'A', 'č' => 'c', 'Č' => 'C', 'ď' => 'd', 'Ď' => 'D', 'é' => 'e', 'É' => 'E',
        'ě' => 'e', 'Ě' => 'E', 'ë' => 'e', 'Ë' => 'E', 'í' => 'i','Í' => 'I', 'ï' => 'i', 'Ï' => 'I', 'ľ' => 'l', 'Ľ' => 'L',
        'ĺ' => 'l', 'Ĺ' => 'L', 'ň' => 'n', 'Ň' => 'N', 'ń' => 'n', 'Ń' => 'N', 'ó' => 'o', 'Ó' => 'O', 'ö' => 'o', 'Ö' => 'O',
        'ř' => 'r', 'Ř' => 'R', 'ŕ' => 'r', 'Ŕ' => 'R', 'š' => 's','Š' => 'S', 'ś' => 's', 'Ś' => 'S', 'ť' => 't', 'Ť' => 'T',
        'ú' => 'u', 'Ú' => 'U', 'ů' => 'u', 'Ů' => 'U', 'ü' => 'u','Ü' => 'U', 'ý' => 'y', 'Ý' => 'Y', 'ÿ' => 'y', 'Ÿ' => 'Y',
        'ž' => 'z', 'Ž' => 'Z', 'ź' => 'z', 'Ź' => 'Z',' ' =>'-', '.' => '-', '*' => '-', '/' => '-', '|' => '-', ':' => '-');
    $vstup=strtr($vstup, $convertTable);
    if ($strlower==1) $vstup = strtolower($vstup);
    $vstup = preg_replace('/[^a-zA-Z0-9.]+/u', '-', $vstup);
    $vstup = str_replace('--', '-', $vstup);
    $vstup = trim($vstup, '-');
    if ($podtrzitko==1)  $vstup = str_replace('-', '_', $vstup);// jen pro soubory, pro url to neplatí

  return $vstup;
}


// funkce pro nastavení cookie
function nastavCookie($nazev,$hodnota,$time = '+1 years') {
    
    $expire = strtotime($time);
	setcookie ($nazev,$hodnota,$expire,$_SERVER['SERVER_NAME']);
   
}

//funkce pro selector jazykových verzí
function jazykoveVerze() {
    $jazyky = null;
    $option = null;
    
    $query = 'SELECT * FROM '.T_JAZYKY.' WHERE aktivni = 1';
    $v = my_SQL($query);
    while($z = mysql_fetch_array($v)) {
        $selected = '';
        if($z['id'] == $_SESSION['ADM']['jazyk']) {
            $selected = 'selected="selected"';
            $znacka = $z['znacka'];
        }
        $option .= '<option value="'.$z['id'].'" '.$selected.'>'.$z['jazyk'].'</option>';
    }
    if($option != null) {
        $jazyky = '
            <script>
            function presun(prvek){
               var css_prvek = prvek.className;     
               if (css_prvek.indexOf("rotate") == -1) {
                    $(prvek).addClass("rotate");
                }
                else {
                    $(prvek).removeClass("rotate");
               }
            }
            </script>
            <button type="button" onclick="presun(this)" id="JazykyBtn" class="btn-jazyky rotate btn-primary" data-toggle="collapse" data-target="#collapseJazykyForm" aria-expanded="false" aria-controls="collapseJazykyForm">
                <span>'.$znacka.'</span>     
            </button> 
            <form id="collapseJazykyForm" class="collapse bg-primary" method="post" action="index.php?action=jazyky">
                <div>
                    verze obsahu <select name="jazyk" onchange="submit()">
                    '.$option.'
                    </select>
                </div>
            </form>
        
        ';
    }
    return $jazyky;
}

?>
