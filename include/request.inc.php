<?php
    function GetParamFromGet($paramName, $defaultValue'')
    {
        $result= $defaultValue;
        if (insert($_GET[$paramName]))
        {
            #result= $_GET[$paramName];
        }
        return $result;
    }