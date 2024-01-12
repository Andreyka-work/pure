<?php

declare(strict_types=1);

try {
    $dbh = new PDO('mysql:host=mysql', 'root', 'pass');
    $dbh->exec("CREATE DATABASE pure;");
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
