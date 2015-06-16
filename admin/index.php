<?php

session_start();

// print_r($_COOKIE);
// print_r($_SESSION);

include_once($_SERVER['DOCUMENT_ROOT'].'/admin/_mysql.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/admin/funkce/_funkce.php');

// ================================================================
if(isset($_GET['odhlaseni'])) {
    odhlasit();
    Header('location: http://'.$_SERVER['SERVER_NAME'].'/admin/');
    exit;
}

// =================================================================

// =================================================================
//kontrola přihlášeného uživatele - zadat na začátku každého skriptu
if(!isset($_SESSION['admin']['login_user_id'])) {
    include_once($_SERVER['DOCUMENT_ROOT'].'/admin/_login.php');
    exit;
}
// =================================================================


//if(isset($_POST['search']) AND !empty($_POST['search'])) {
if(isset($_POST['search'])) {
    if(!empty($_POST['search'])) {
        $_SESSION['app']['search'] = trim($_POST['search']);
    }
    else {
        unset($_SESSION['app']['search']);
        $url = $_SERVER['HTTP_REFERER'];
        Header('location:'.$_SERVER['HTTP_REFERER']);
        exit;    
    }
}


$STROJ = getStroj();
//$STROJ = 'mobile';  

$DATA = '';
$TOP = '';
$main_link = '';
$brand_active = $stranky_active = '';
$uzivatel = $popisSystemu = null;
$ADD_JS = null;

// =============================================================================
// jazykové verze - select
if(isset($_GET['action']) AND $_GET['action'] == 'jazyk' ) {
    if(isset($_POST['jazyk']) AND $_POST['jazyk'] > 0) { //výstup z formuláře pro jazykové verze
        $_SESSION['ADM']['jazyk'] = $_POST['jazyk'];
        Header('location:'.$_SERVER['HTTP_REFERER']);
        exit; 
    }
}
$JAZYKY = jazykoveVerze();


if(!isset($_GET['cast']) OR $_GET['cast'] == "") {
    $main_link = 'http://'.$_SERVER['SERVER_NAME'].'/admin/index.php';
    include_once($_SERVER['DOCUMENT_ROOT'].'/admin/_dashboard.php');
    $brand_active = 'active';
}
if(isset($_GET['cast']) AND $_GET['cast'] == "stranky") {
    $main_link = 'http://'.$_SERVER['SERVER_NAME'].'/admin/index.php?cast=stranky';
    include_once($_SERVER['DOCUMENT_ROOT'].'/admin/_stranky.php');
    $stranky_active = 'active';
}


include_once($_SERVER['DOCUMENT_ROOT'].'/admin/_pata.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/admin/_sablona.php');
    


?>
