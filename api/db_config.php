<?php

/* 	define (DB_USER, "root");

	define (DB_PASSWORD, "");

	define (DB_DATABASE, "h_blog");

	define (DB_HOST, "localhost"); */

	$db_host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_database = "h_blog";

	$mysqli = new mysqli($db_host, $db_user, $db_password, $db_database);