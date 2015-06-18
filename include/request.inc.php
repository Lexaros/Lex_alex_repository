<?php
    function GetParamFromGet($paramName)
    {
        if (isset ($_GET[$paramName]))
        {
            $result = $_GET[$paramName];
        }
        else 
        {
            $result = '';
            echo "<br> !ERROR! $paramName is not set";
        }
        return $result;
    }
