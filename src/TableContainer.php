<?php

namespace App;

class TableContainer
{
    protected $columns = [] ;

    protected $tableDataArray = [];


    public function __construct(array $tableDataArray)
    {
        $this->columns = array_shift($tableDataArray);

        $this->tableDataArray = $tableDataArray;
    }

    public function addColumn($name, callable $closure)
    {
        $this->columns[] = $name;

        $this->tableDataArray[]  =  $closure ;

        return $this;
    }

    public function getTableData(){

        return (array) $this->tableDataArray;
    }

    public function getTableColumns(){

        return (array) $this->columns;
    }


}