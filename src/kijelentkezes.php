<?php
include_once("common.php");
session_start();

if(isLoggedIn())
{
	session_unset();
	session_destroy();
	header("Location:/rft/index.php");
}