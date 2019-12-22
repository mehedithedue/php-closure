<?php

namespace App;


class ShowTable
{

    public $tableContainer;
    public $tableContainerArray;
    public $columns;

    public function __construct(TableContainer $container)
    {
        $this->tableContainer = $container;

        $this->tableContainerArray = $this->tableContainer->getTableData();
        $this->columns = $this->tableContainer->getTableColumns();
    }

    public function showTable()
    {

        echo "<table border='1'><tbody>";

        echo '<tr>';

        echo "<th>SL</th>";
        foreach($this->columns as $column){
            echo "<th>".($column)."</th>";
        }
        echo '</tr>';

        foreach($this->tableContainerArray as $key=>$row)
        {
            print("<tr><td>".($key+1)."</td>");
            foreach($row as $column)
                print("<td>".$column."</td>");
            print("</tr>");
        }
        echo "</tbody></table>";
    }
}