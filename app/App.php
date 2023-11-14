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

function getTotalIncome(array $transactions): float
{
    $sum = 0;

    array_walk($transactions, function ($item) use (&$sum) {
        $sum += max($item['amount'], 0);
    });

    return $sum;
}

function getTotalExpense(array $transactions): float
{
    $sum = 0;

    array_walk($transactions, function ($item) use (&$sum) {
        $sum += min($item['amount'], 0);
    });

    return $sum;
}

function getNetTotal(float $income, float $expense): float
{
    return abs($income) - abs($expense);
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