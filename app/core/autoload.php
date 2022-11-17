<?php
//this is 75% of a PSR-4 autoloader
spl_autoload_register(

	// comment this if you're on mac
	function ($class_name){
		require_once($class_name . ".php");
	}
);