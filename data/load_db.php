<?php

$db = new PDO('sqlite3:' . realpath(__DIR__) . 'zend3.db');
$fh = fopen(__DIR__ . '/schema.sql', 'r');
while($line= fread($fh, 4096)) {
    $db->exec($line);
}
fclose($fh);
