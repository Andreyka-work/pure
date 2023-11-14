<?php

declare(strict_types=1);

function getTransactionFiles(string $dirPath): array
{
    $filesPath = [];

    foreach (scandir($dirPath) as $file) {
        if (is_dir($file)) {
            continue;
        }

        $filesPath[] = $dirPath . $file;
    }

    return $filesPath;
}

function calculateTotals(array $transactions): array
{
    $totals = ['income' => 0, 'expense' => 0, 'netTotal' => 0];

    foreach ($transactions as $transaction) {
        $totals['netTotal'] += $transaction['amount'];

        if ($transaction['amount'] >= 0) {
            $totals['income'] += $transaction['amount'];
        } else {
            $totals['expense'] += $transaction['amount'];
        }
    }

    return $totals;
}

function getTransactions(string $filePath): array
{
    if (!file_exists($filePath)) {
        trigger_error("File $filePath does not exists", E_USER_ERROR);
    }

    $file = fopen($filePath, 'r');
    fgetcsv($file); // removing first (headers) row

    $transactions = [];
    while (($transaction = fgetcsv($file)) !== false) {
        $transactions[] = extractTransaction($transaction);
    }

    fclose($file);

    return $transactions;
}

function extractTransaction(array $transactionData): array
{
    [$date, $checkNumber, $description, $amount] = $transactionData;

    return [
        'date' => $date,
        'checkNumber' => $checkNumber,
        'description' => $description,
        'amount' => (float)str_replace(['$', ','], '', $amount),
    ];
}