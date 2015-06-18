<?php
    require_once('include/common.inc.php');

    $email = GetParamFromGet('email');
    PrintSurveyList($email);