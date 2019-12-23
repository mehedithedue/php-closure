<?php

use App\ShowTable;
use App\TableContainer;

require_once __DIR__ . '/vendor/autoload.php';


$tableArr = [
    ["Name", 'Licence', 'Price'],
    ["Volvo", '95-PL-AO', 18000],
    ["Saab", 'PL-PO-JB',  20000],
    ["Land Rover", 'ZD-85-95', 15000],
    ["BMW", '30-KL-PO', 10000],
    ["Mercedes", '51-ZD-ZD', 20000],
    ["Maserati", 'JB-47-02', 30000],
];


$tableContent = new TableContainer($tableArr);

$tableContent->addColumn('mithun', function (){
    return ["Maati", 'J2', 30];
});

return (new ShowTable($tableContent) )->showTable();

function doIt($string, $callback) 
{ 
    echo $callback($string); 
} 

// Call doIt() and pass our sample callback function's name. 
doIt("this is my data", function ($data){
    return 'from paris '.$data.'\n';
});