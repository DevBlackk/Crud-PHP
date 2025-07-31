<?php
define('HOST', 'ep-spring-mud-aciy5d8x-pooler.sa-east-1.aws.neon.tech');
define('USUARIO', 'neondb_owner');
define('SENHA', 'npg_4Jn7PpTWBsAR');
define('DB', 'neondb');

$connection = pg_connect('postgresql://neondb_owner:npg_4Jn7PpTWBsAR@ep-spring-mud-aciy5d8x-pooler.sa-east-1.aws.neon.tech/neondb?sslmode=require&channel_binding=require') or die ("Falha na conexão!");
?>