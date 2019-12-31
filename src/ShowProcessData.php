<?php

namespace App;


use SimpleXMLElement;

class ShowProcessData extends ProcessDataContainer
{

    public function __construct($tableDataArray)
    {
        parent::__construct($tableDataArray);

    }

    public function makeTable()
    {

        echo "<table border='1'><tbody>";

        echo '<tr>';

        echo "<th>SL</th>";
        foreach($this->columns as $column){
            echo "<th>".($column)."</th>";
        }
        echo '</tr>';

        foreach($this->tableDataArray as $key=>$row)
        {
            print("<tr><td>".($key+1)."</td>");
            foreach($row as $column)
                print("<td>".$column."</td>");
            print("</tr>");
        }
        echo "</tbody></table>";
    }


    public function makeJson(){

        echo json_encode($this->tableDataArray);
    }

    public function makeXML(){

        echo $this->arrayToXml($this->tableDataArray);
    }

    private function arrayToXml($array, $rootElement = null, $xml = null) {
        $_xml = $xml;

        // If there is no Root Element then insert root
        if ($_xml === null) {
            $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
        }

        // Visit all key value pair
        foreach ($array as $k => $v) {

            // If there is nested array then
            if (is_array($v)) {

                // Call function for nested array
                $this->arrayToXml($v, $k, $_xml->addChild($k));
            }

            else {
                // Simply add child element.
                $_xml->addChild($k, $v);
            }
        }

        return $_xml->asXML();
    }
}