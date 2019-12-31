<?php

use App\ShowProcessData;
use App\ProcessDataContainer;

require_once __DIR__ . '/vendor/autoload.php';


$tableArr = [
    [
        "name" => "Volvo",
        "licence" => '95-PL-AO',
        "price" => 18000,
    ], [
        "name" => "Saab",
        "licence" => 'PL-PO-JB',
        "price" => 18000,
    ], [
        "name" => "Land Rover",
        "licence" => 'ZD-85-95',
        "price" => 18000,
    ], [
        "name" => "BMW",
        "licence" => '0-KL-PO',
        "price" => 18000,
    ], [
        "name" => "Mercedes",
        "licence" => '51-ZD-ZD',
        "price" => 18000,
    ], [
        "name" => "Maserati",
        "licence" => 'JB-47-02',
        "price" => 18000,
    ],
];


$tableContent = new ShowProcessData($tableArr);

    $tableContent
    ->addColumn('action', function ($row) {

        return '<a href="/edit/' . $row['licence'] . '">' . $row['name'] . '</a>';

    })
    ->editColumn('price', function ($row) {

        return $row['price'] . ' tk';

    })
    ->deleteColumn('licence')
    ->makeTable();