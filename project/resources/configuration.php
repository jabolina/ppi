<?php

/**
 * Arquivo de configurações. Aqui ficarão todas configurações necessárias para o projeto.
 * Todo_ lugar que precisar de algum valor de configuração, esse arquivo deve ser importado.
 *
 * Configurações como credenciais do banco de dados, caminho para arquivos, etc.
 */

define("config", array(
    "db"=> array(
        "name"=> "VJV_CLINIC",
        "username"=> "root",
        "password"=> "root",
        "host"=> "localhost",
        "port"=> 3306
    ),
    "baseURL"=> "localhost"
));

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

defined("IMAGES_PATH")
    or define("IMAGES_PATH", realpath(dirname(__FILE__) . '/../public_html/img'));

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRICT);
