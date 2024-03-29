<?php

/**
 * Configuration for: Database Connection
 * This is the place where your database login constants are saved
 *
 * For more info about constants please @see http://php.net/manual/en/function.define.php
 * If you want to know why we use "define" instead of "const" @see http://stackoverflow.com/q/2447791/1114320
 *
 * DB_HOST: database host, usually it's "127.0.0.1" or "localhost", some servers also need port info
 * DB_NAME: name of the database. please note: database and database table are not the same thing
 * DB_USER: user for your database. the user needs to have rights for SELECT, UPDATE, DELETE and INSERT.
 *          by the way, it's bad style to use "root", but for development it will work.
 * DB_PASS: the password of the above user
 */


// Dados do banco do heroku

$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));

define("DB_HOST", $cleardb_url["host"]);
define("DB_NAME", substr($cleardb_url["path"], 1));
define("DB_USER", $cleardb_url["user"]);
define("DB_PASS", $cleardb_url["pass"]);


/**
 * Configuration for: Cookies
 * Please note: The COOKIE_DOMAIN needs the domain where your app is,
 * in a format like this: .mydomain.com
 * Note the . in front of the domain. No www, no http, no slash here!
 * For local development, use false because .127.0.0.1 or .localhost don't work inside Chrome 
 * but when deploying you should change this to your real domain, like '.mydomain.com' !
 * The leading dot makes the cookie available for sub-domains too.
 * @see http://stackoverflow.com/q/9618217/1114320
 * @see http://www.php.net/manual/en/function.setcookie.php
 * @see http://stackoverflow.com/questions/1134290/cookies-on-localhost-with-explicit-domain
 *
 * COOKIE_RUNTIME: How long should a cookie be valid ? 1209600 seconds = 2 weeks
 * COOKIE_DOMAIN: The domain where the cookie is valid for, like '.mydomain.com'
 * COOKIE_SECRET_KEY: Put a random value here to make your app more secure. When changed, all cookies are reset.
 */
define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".127.0.0.1"); // to be replaced by '.mydomain.com'
define("COOKIE_SECRET_KEY", "JeRWxn9vAY26S10SgDlgnszE07y0oKlGLhzKn24ULH8mseOJDxMY1LjuNn3jLWeM2rTujnFGH0DtWbomJfaPotMK0b4ESGsyiw4c");

/**
 * Configuration for: Email server credentials
 *
 * Here you can define how you want to send emails.
 * If you have successfully set up a mail server on your linux server and you know
 * what you do, then you can skip this section. Otherwise please set EMAIL_USE_SMTP to true
 * and fill in your SMTP provider account data.
 *
 * An example setup for using gmail.com [Google Mail] as email sending service,
 * works perfectly in August 2013. Change the "xxx" to your needs.
 * Please note that there are several issues with gmail, like gmail will block your server
 * for "spam" reasons or you'll have a daily sending limit. See the readme.md for more info.
 *
 * define("EMAIL_USE_SMTP", true);
 * define("EMAIL_SMTP_HOST", "ssl://smtp.gmail.com");
 * define("EMAIL_SMTP_AUTH", true);
 * define("EMAIL_SMTP_USERNAME", "xxxxxxxxxx@gmail.com");
 * define("EMAIL_SMTP_PASSWORD", "xxxxxxxxxxxxxxxxxxxx");
 * define("EMAIL_SMTP_PORT", 465);
 * define("EMAIL_SMTP_ENCRYPTION", "ssl");
 *
 * It's really recommended to use SMTP!
 *
 */
define("EMAIL_USE_SMTP", true);
define("EMAIL_SMTP_HOST", "ssl://smtpcorp.com"); //  srv58.hosting24.com
define("EMAIL_SMTP_AUTH", true);
define("EMAIL_SMTP_USERNAME", "alain.dutra@gmail.com"); //  alain_urologista@drsolutionapp.info
define("EMAIL_SMTP_PASSWORD", "pto2phil");
define("EMAIL_SMTP_PORT", 465); //   465
define("EMAIL_SMTP_ENCRYPTION", "ssl");


/**
 * Configuration for: password reset email data
 */
define("EMAIL_PASSWORDRESET_FROM", "nao_responda@drsolution.com.br");
define("EMAIL_PASSWORDRESET_FROM_NAME", "DRSTools");
define("EMAIL_PASSWORDRESET_SUBJECT", "Reconfiguração de senha para o app DRSTools");
define("EMAIL_PASSWORDRESET_CONTENT", "Por favor clique neste link para reconfigurar sua senha:");

/**
 * Configuration for: verification email data
 */
define("EMAIL_VERIFICATION_FROM", "nao_responda@drsolution.com.br");
define("EMAIL_VERIFICATION_FROM_NAME", "DRSTools");
define("EMAIL_VERIFICATION_SUBJECT", "Ativação de conta para o app DRSTools");
define("EMAIL_VERIFICATION_CONTENT", "Por favor clique neste link para ativar sua conta:");

/**
 * Configuration for: Hashing strength
 * This is the place where you define the strength of your password hashing/salting
 *
 * To make password encryption very safe and future-proof, the PHP 5.5 hashing/salting functions
 * come with a clever so called COST FACTOR. This number defines the base-2 logarithm of the rounds of hashing,
 * something like 2^12 if your cost factor is 12. By the way, 2^12 would be 4096 rounds of hashing, doubling the
 * round with each increase of the cost factor and therefore doubling the CPU power it needs.
 * Currently, in 2013, the developers of this functions have chosen a cost factor of 10, which fits most standard
 * server setups. When time goes by and server power becomes much more powerful, it might be useful to increase
 * the cost factor, to make the password hashing one step more secure. Have a look here
 * (@see https://github.com/panique/php-login/wiki/Which-hashing-&-salting-algorithm-should-be-used-%3F)
 * in the BLOWFISH benchmark table to get an idea how this factor behaves. For most people this is irrelevant,
 * but after some years this might be very very useful to keep the encryption of your database up to date.
 *
 * Remember: Every time a user registers or tries to log in (!) this calculation will be done.
 * Don't change this if you don't know what you do.
 *
 * To get more information about the best cost factor please have a look here
 * @see http://stackoverflow.com/q/4443476/1114320
 *
 * This constant will be used in the login and the registration class.
 */
define("HASH_COST_FACTOR", "10");

/**
 * Configuration for: Registration
 *
 * ALLOW_USER_REGISTRATION: If set to false, new users cannot registred and registration link is not displayed.
 * ALLOW_ADMIN_TO_REGISTER_NEW_USER: Administrator (user with an access level of 255) can create new users.
 */
define("ALLOW_USER_REGISTRATION", true);
define("ALLOW_ADMIN_TO_REGISTER_NEW_USER", true);
