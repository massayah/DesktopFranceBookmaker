<?php
// script in order to avoid a repetitive window if we refresh the page after filling a form
session_start();

if(!empty($_POST) OR !empty($_FILES))
{
    $_SESSION['save'] = $_POST ;
    $_SESSION['saveFILES'] = $_FILES ;
    
    $currentfile = $_SERVER['PHP_SELF'] ;
    if(!empty($_SERVER['QUERY_STRING']))
    {
        $currentfile .= '?' . $_SERVER['QUERY_STRING'] ;
    }
    
    header('Location: ' . $currentfile);
    exit;
}

if(isset($_SESSION['save']))
{
    $_POST = $_SESSION['save'] ;
    $_FILES = $_SESSION['saveFILES'] ;
    
    unset($_SESSION['save'], $_SESSION['saveFILES']);
}

?>