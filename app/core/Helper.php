<?php
namespace app\core;


class Helper{

    public static function disableButtons(){

        $active = isset($_SESSION['role']) ? ($_SESSION['role'] == 'buyer' ? "" : "disabled") : "disabled"; return $active;  

    }
    
}