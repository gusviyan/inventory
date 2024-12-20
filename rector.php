<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    // Direktori proyek yang akan diproses
    $rectorConfig->paths([
        __DIR__ . '/application', // Folder utama kode aplikasi
    ]);

    // Gunakan set migrasi PHP 8
    $rectorConfig->sets([
        SetList::PHP_80, // Set utama PHP 8
        SetList::PHP_81, // Opsional, jika ingin menambahkan PHP 8.1
    ]);

    // Abaikan file/folder tertentu (opsional)
    $rectorConfig->skip([
        __DIR__ . '/system', // Abaikan folder framework inti
        __DIR__ . '/vendor', // Abaikan folder Composer
    ]);

    $rectorConfig->skip([
        __DIR__ . '/vendor', // Abaikan folder Composer
        __DIR__ . '/system', // Abaikan folder framework inti
        __DIR__ . '/application/third_party', // Abaikan folder pihak ketiga
    ]);
    
};
