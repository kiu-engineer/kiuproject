<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">

	<link rel="icon" href="images/favicon.png">
	<title><?php echo $title; ?> | <?php echo get_store_name(); ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url('assets/themes/evone/');?>css/framework7.bundle.css">
	<link rel="stylesheet" href="<?=base_url('assets/themes/evone/');?>css/font-awesome.css">
	<link rel="stylesheet" href="<?=base_url('assets/themes/evone/');?>css/style.css">

</head>
<body>	
<div id="app">
<div class="view view-main view-init ios-edges" data-url="/">


