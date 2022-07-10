<?php
$mysql = new mysqli('db', 'user', 'senha', 'blog');
$mysql->set_charset('utf8');

if($mysql == FALSE) {
    echo "Erro na conexão.";
}
