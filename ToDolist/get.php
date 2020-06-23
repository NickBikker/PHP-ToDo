<?php
require 'functions.php';
if(isset($_GET['action'])){
    $function = $_GET['action'];
    $data = $_POST;
    if (function_exists($function)) {
	    $function($data);
    }
}
