<?php
    
    require_once('vendor/autoload.php');

    use Utils\DB;

    $db = new DB();

    $db->destroy($_GET['id']);
        
?>
