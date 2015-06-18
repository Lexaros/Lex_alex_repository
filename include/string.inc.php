<?php
    function Last($str)
    {
        $length = strlen($str);
        $result='';
        if ($length != 0)
        {
            $result = $str[$length-1];
        }
        return $result;
    }

    function WithoutLast($str)
    {
        $length = strlen($str);
        $result = '';
        if ($length != 0)
        {
            for ($i = 0; $i <= $length - 2; $i++)
            {
                $result = $result . $str[$i];
            }
        }
        return $result;
    }

    function Revers($str)
    {
        $length = strlen($str);
        $result = '';
        if ($length != 0)
        {
            for ($i = $length - 1; $i >= 0; $i--)
            {
                $result = $result . $str[$i];
            }
        }
        return $result;
    }

    function RemoveExtraBlanks($str)
    {
        $str = trim($str);
        $str = preg_replace('/\s+/' , ' ' , $str);
        return $str;
    }