<?php

/**
 * Arquivo de configurações. Aqui ficarão todas configurações necessárias para o projeto.
 * Todo_ lugar que precisar de algum valor de configuração, esse arquivo deve ser importado.
 *
 * Configurações como credenciais do banco de dados, caminho para arquivos, etc.
 */

$config=array(
    "db"=> array(
        "name"=> "ppi",
        "username"=> "root",
        "password"=> "root",
        "host"=> "127.0.0.1",
        "port"=> 3306
    ),
    "baseURL"=> "localhost",
    "paths"=> array(
        "resources"=> realpath(dirname(__FILE__)),
        "images"=> array(
            "content"=> $_SERVER["DOCUMENT_ROOT"] . "/images/content/",
            "layout"=> $_SERVER["DOCUMENT_ROOT"] . "/images/layout/"
        )
    )
);

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRICT);
