<?php
if (strpos($_SERVER['REQUEST_URI'], "conf")) {
    exit(header("Location:../index.php"));
}

function title()
{
    $judul = "Indikator Mutu SIMRS Khanza --)(*!!@#$%";
    $judul = preg_replace("[^A-Za-z0-9_\-\./,|]", " ", $judul);
    $judul = str_replace(array('.', '-', '/', ','), " ", $judul);
    $judul = trim($judul);
    echo "$judul";
}

function cekSessiAdmin()
{
    if (isset($_SESSION['ses_admin_indikatormutu'])) {
        return true;
    } else {
        return false;
    }
}


function cekUser()
{
    if (isset($_SESSION['ses_admin_indikatormutu'])) {
        return true;
    } else {
        return false;
    }
}

function adminAktif()
{
    if (cekSessiAdmin()) {
        return $_SESSION['ses_admin_indikatormutu'];
    }
}



function isGuest()
{
    if (cekSessiAdmin()) {
        return false;
    } else {
        return true;
    }
}



function actionPages()
{
    $aksi = isset($_REQUEST['act']) ? $_REQUEST['act'] : NULL;
    switch ($aksi) {
        case 'Home':
            include_once('pages/home.php');
            break;
        case 'MenuIndikator1':
            include_once('pages/indikator1/menu.php');
            break;
        case 'ListIndikator1':
            include_once('pages/indikator1/listindikator1.php');
            break;
        case 'InputIndikator1':
            include_once('pages/indikator1/inputindikator1.php');
            break;
        case 'MenuIndikator2':
            include_once('pages/indikator2/menu.php');
            break;
        case 'ListIndikator2':
            include_once('pages/indikator2/listindikator2.php');
            break;
        case 'InputIndikator2':
            include_once('pages/indikator2/inputindikator2.php');
            break;
        case 'ListIndikator3':
            include_once('pages/indikator3/listindikator3.php');
            break;
        case 'InputIndikator3':
            include_once('pages/indikator3/inputindikator3.php');
            break;
        case 'ListIndikator4':
            include_once('pages/indikator4/listindikator4.php');
            break;
        case 'InputIndikator4':
            include_once('pages/indikator4/inputindikator4.php');
            break;
        case 'ListIndikator5':
            include_once('pages/indikator5/listindikator5.php');
            break;
        case 'InputIndikator5':
            include_once('pages/indikator5/inputindikator5.php');
            break;
        case 'ListIndikator6':
            include_once('pages/indikator6/listindikator6.php');
            break;
        case 'InputIndikator6':
            include_once('pages/indikator6/inputindikator6.php');
            break;
        case 'MenuIndikator7':
            include_once('pages/indikator7/menu.php');
            break;
        case 'ListIndikator7':
            include_once('pages/indikator7/listindikator7.php');
            break;
        case 'InputIndikator7':
            include_once('pages/indikator7/inputindikator7.php');
            break;
        default:
            include_once('pages/kontak.php');
    }
}
