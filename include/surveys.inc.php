<?php
    function MakeDir($dir)
    {
        if (!file_exists($dir))
        {
            mkdir($dir);
        }
        return ($dir);
    }

    function GetDBFileName ($fileName)
    {
        $fileName = DB_DIR . "/" . $fileName . ".txt";
        return $fileName;
    }

    // Запись
    function ConstructSurveyContent($email, $first_name, $last_name, $age)
    {
        $content = "Email:" . $email . "\nFirst Name:" . $first_name . "\nLast Name:" . $last_name . "\nAge:" . $age;
        return($content);
    }

    function SaveSurveyToFile($content, $fileName) 
    {
        $error = '';
        if ($fileName != '')
        {
            $fileName = GetDBFileName($fileName);
            $fp = fopen($fileName, "w+");
            if ($fp)
            {
                $testWrite = fwrite($fp, $content);
                if ($testWrite) 
                {
                    $error = "<br/>Save file Ok! Fielname: \"$fileName\". Content: \"$content\"";
                }
                else
                {
                    $error = "<br/>!ERROR! Can`t write to file \"$fileName\"";
                }
                fclose($fp);
            }
            else
            {
                $error = "<br/>!ERROR! Can`t save file \"$fileName\"";
            }
        }
        return $error;
    }

    // Чтение
    function PrintSurveyList($email)
    {
        $error = '';
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $fileName = GetDBFileName($email);
            echo "<b>Filename: " . $fileName . "</b><br/>";
            $content = GetSurveyFromFile($fileName);
            foreach($content as $key => $value)
            {
                if ($value == "\n" || $value == "") $value = "...";
                echo $key . ": " . $value . "<br/>";
            }
        }
    }
    
    function GetSurveyFromFile($filename)
    {
        $content = array();
        if (file_exists($filename))
        {
            foreach (file($filename) as $line)
            {
                list($key, $value) = explode(':', $line);
                $content[$key] = $value;
            }
        }
        return $content;
    }