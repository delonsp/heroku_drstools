<?php

/**
 * Configuration for: Database Connection
 *
 * For more information about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 *
 * DB_HOST: database host, usually it's "127.0.0.1" or "localhost", some servers also need port info
 * DB_NAME: name of the database. please note: database and database table are not the same thing
 * DB_USER: user for your database. the user needs to have rights for SELECT, UPDATE, DELETE and INSERT.
 * DB_PASS: the password of the above user
 */

// Dados do banco do heroku

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

define("DB_HOST", $cleardb_url["host"]);
define("DB_NAME", substr($cleardb_url["path"], 1));
define("DB_USER", $cleardb_url["user"]);
define("DB_PASS", $cleardb_url["pass"]);


// certificados

// cert_pem
$cert_pem = getenv("CERT_PEM");


//cert_key
$cert_key = getenv("CERT_KEY");

//cleardb_ca

$cleardb_ca = getenv("CLEARDB_CA");