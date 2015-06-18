<?php
    function Validate($regular, $string)
    {
        if (preg_match($regular, $string))
        {
            return(False);
        }
        else 
        {
            return(True);
        }
    }

    function StrengthFromLength($strength, $password, $multiplier)
    {
        $strength = $strength + $multiplier * strlen($password);
        echo "Len = " . strlen($password) . ", strength + (Len*$multiplier) = " . $strength . "<br/>";
        return ($strength);
    }

    function StrengthPregCount($strength, $password, $regular, $multiplier)
    {
        $counter = preg_match_all($regular, $password);
        $strength = $strength + $multiplier * $counter;
        echo "$regular = " . $counter . ", strength + (n*$multiplier) = " . $strength . "<br/>";
        return($strength);
    }

    function StrengthFromLetterSize($strength, $password, $regular, $multiplier)
    {
        $counter = preg_match_all($regular, $password);
        if ($counter != 0)
        {
            $strength = $strength + ( (strlen($password) - $counter) * $multiplier);
            echo "$regular = " . $counter . ", strength + ((len-N)*$multiplier) = " . $strength . "<br/>";
        }
        return ($strength);
    }

    function StrengthMinusPreg($strength, $password, $regular)
    {
        if (preg_match_all('/[a-zA-Z]/', $password) == strlen($password))
        {
            $strength = $strength - strlen ($password);
            echo "just $regular strength (-len) = " . $strength . "<br/>";
            return ($strength);
        }
    }

    function StrengthMinusDublicate($strength, $password)
    {
        $result = count_chars($password); 
        foreach ($result as $key => $value)
        {
            if ($value != 0 && $value != 1)
            {
                $strength = $strength - $value;
                echo chr($key) . " - " . $value . " times, strength = " . $strength . "<br/>";
            }
        }
        return $strength;
    }