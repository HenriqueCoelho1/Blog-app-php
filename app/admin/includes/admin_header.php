<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/db.inc.php"; ?>
<?php include "../includes/functions.inc.php"; ?>
<?php
if(isset($_SESSION["is_superuser"])){
    if($_SESSION["is_superuser"] !== 1){
        header("Location: ../index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $_SESSION["username"]; ?></title>

    <script src="https://use.fontawesome.com/acdb99b9ed.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/dropdownToggle.js"></script>


</head>

<body>