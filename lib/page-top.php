<?php
// THROW USER TO LOGIN PAGE IF NOT SIGNED IN
// YOU MIGHT WANT TO DO THIS DIFFERENTLY IF PLANNING TO USE PRETTY URL
$_ADMIN = is_array($_SESSION['user']);
if (!$_ADMIN && basename($_SERVER["SCRIPT_FILENAME"], '.php')!="login") {
  header('Location: login.php');
  die();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN PANEL</title>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="public/admin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.1/d3.min.js"></script>
    <script src="public/admin.js"></script>
  </head>
  <body>
    <!-- [NOW LOADING SPINNER] -->
    <div id="page-loader">
      <img id="page-loader-spin" src="public/cube-loader.svg">
    </div>

    <!-- [PAGE WRAPPER] -->
    <div id="page-wrap">
      <?php if ($_ADMIN) { ?>
      <!-- [SIDE BAR] -->
      <nav id="page-sidebar">
        <a href="index.php">
          <span class="ico">&#9788;</span>
          CurveIT Fibre Project - Admin
        </a>
        <a href="users.php">
          <span class="ico">&#9787;</span>
          Manage Users
          </a>
        <a href = "titleBlock.php">
          <span><i class="fa fa-table"></i></span>
           LFFN Title Table
        </a>
      </nav>
      <?php } ?>

      <!-- [MAIN CONTENTS] -->
      <div id="page-main">
        <?php if ($_ADMIN) { ?>
        <!-- [NAVIGATION BAR] -->
        <nav id="page-nav">
          <div id="page-button-side" onclick="adm.side();">&#9776;</div>
          <div id="page-button-out" onclick="adm.bye();">&#9747;</div>
        </nav>
        <?php } ?>

        <!-- [PAGE CONTENTS] -->
        <div id="page-contents">