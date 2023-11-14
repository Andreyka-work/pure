<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

\define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
\define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
\define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require_once APP_PATH . 'App.php';

$filesPaths = getTransactionFiles(FILES_PATH);

$transactions = [];
foreach ($filesPaths as $filePath) {
    $transactions = array_merge($transactions, getTransactions($filePath));
}

$totals = calculateTotals($transactions);

require VIEWS_PATH . 'transactions.php';
