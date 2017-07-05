<?php
session_start();
if(isset($_SESSION)) 
{
    if(empty($_SESSION))
    {
        header("refresh: 0; url = index.php");
    }
}
if(isset($_GET["logout"]))
{   
    session_destroy();
    header("refresh: 0; url = index.php");
}

require 'acc.index.base.php';
?>