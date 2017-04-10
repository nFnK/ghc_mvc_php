<?php

//Ne morate koristi uvijek (/) na kraju, misli se na TO kada se ovE DVIJE promjeljive koriste
define('URL', 'http://localhost/mvc/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASS', '');

//Hasiranje keJa, nemojte ovo mijenjati zato sto se koristi za lozinku!
//Ovo je za ostale hashKey...
define('HASH_GENERAL_KEY', 'BexVoliDisco');
//Ovo je za password u bazi podataka samo.....
define('HASH_PASSWORD_KEY', 'mackaMozeDaideBrzinomOd200kmh');