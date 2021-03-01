<?php

const ROOT = __DIR__;
require_once __DIR__.'/config/app.php';
require_once __DIR__.'/core/Connection.php';
$db = Connection::connect();

$sql = <<<SQL
DROP TABLE IF EXISTS brands;
CREATE TABLE brands(
    id int(11) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    status tinyint(1) DEFAULT 1,
    PRIMARY KEY(id)
)
SQL;

$db->exec($sql);

echo "success\n\n";