<?php
$localizations = ['en', 'fr_CA', 'ar'];

//to accept languages from the querystring as follows: mysite.com?lang=fr_CA
if(isset($_GET['lang'])){ //if there is a language choice in the querystring
	$lang = $_GET['lang'];//use this language
}elseif (isset($_SESSION["lang"])) {//is a cookie was set
	$lang = $_SESSION["lang"];//use this language
}else{//if the browser is requesting a language
	$lang = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);//use this language
}

$lang = Locale::lookup($localizations, $lang, true, 'en');

//setcookie("lang",$_COOKIE['lang'],1,"/","",true,true); //set the old cookie to expire
//setcookie("lang",$lang,0,"/","",true,true); //set a cookie
$_SESSION['lang'] = $lang;

//extract the root language from the complete locale to use with strftime
$rootlang = preg_split('/_/', $lang); $rootlang = (is_array($rootlang)?$rootlang[0]:$rootlang);

//We are removing this because it sets the process locale and not the thread locale. As a result, with multiple threads, we could encounter a race condition bug. Gettext still works the way we set out to use it.
//setlocale(LC_ALL, $rootlang.".UTF8");//which locale to use. .UTF8 is to ensure proper encoding of output

bindtextdomain($lang, "locale"); //pointing to the locale folder for the language of choice
textdomain($lang); //what is the file name to find translations