<?php
define('SITE_NAME', 'PHPat');
define('SITE_URL', 'http://phpat.projetisi.com');
define('PAGE_ID', 'page_id');
//define('USER_IS_LOGGED', 'user_is_logged'); // L'utilisateur est connecté ou non
define('PAGE_IS_PUBLIC', 'page_is_public'); // La page est publique ou pas
define('HOME_PAGE', 'index.php');
define('LIKE_ID', 'like_id'); // Le parametre de querystring pour ajouter un "like"
define('SESS_LIKES', 'sess_likes'); // Le parametre de querystring pour ajouter un "like"
define('INSCRIPTION_PAGE', 'inscription.php');


/**
 * Mettre le error reporting au maximum pour les tests
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);