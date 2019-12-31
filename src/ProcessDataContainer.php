<?php

namespace App;

class ProcessDataContainer
{
    protected $columns = [] ;

    protected $tableDataArray = [];


    public function __construct(array $tableDataArray)
    {

        $this->tableDataArray = $tableDataArray;

        $this->columns = $this->getTableColumns();
    }

    public function addColumn($name, $closure)
    {
        $this->columns[] = $name;

        foreach($this->tableDataArray as $key => &$tableRow){

            $tableRow[$name] = is_callable($closure) ? call_user_func($closure, $tableRow) : $closure;
        }

        return $this;
    }

    public function editColumn($name, $closure)
    {
        if(!in_array($name, $this->columns)){
            throw new \Exception('Sorry ! Can not find '.$name.' Column');
        }

        foreach($this->tableDataArray as $key => &$tableRow){

            $tableRow[$name] = is_callable($closure) ? call_user_func($closure, $tableRow) : $closure;
        }

        return $this;
    }

    public function deleteColumn($name)
    {
        if (($columnKey = array_search($name, $this->columns)) == false) {
            throw new \Exception('Can not find '.$name.' Column');
        }

        unset($this->columns[$columnKey]);

        foreach($this->tableDataArray as $key => &$tableRow){

            unset($tableRow[$name]);
        }

        return $this;
    }

    public function getTableData(){

        return (array) $this->tableDataArray;
    }

    public function getTableColumns(){

        return (array) array_keys($this->tableDataArray[0]);
    }

}