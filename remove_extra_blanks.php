<?php
    require_once('include/common.inc.php');
    
    $str = GetParamFromGet('str');
    echo RemoveExtraBlanks($str);