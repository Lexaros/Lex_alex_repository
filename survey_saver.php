<?php
    require_once('include/common.inc.php');

    $first_name = GetParamFromGet('first_name');
    $last_name = GetParamFromGet('last_name');
    $email = GetParamFromGet('email');
    $age = GetParamFromGet('age');
    $error = '';
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        MakeDir(DB_DIR);
        $content = ConstructSurveyContent($email, $first_name, $last_name, $age);
        $error = SaveSurveyToFile($content, $email);
    }
    else
    {
        $error = "<br/>!ERROR! E-mail \"$email\" is not valid";
    }
    echo $error;