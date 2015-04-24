<?php
    request_once ('include/common.inc.php');

    arg1=0;
    if (isset($_GET['arg1']))
    {
        $arg1=$_GET['arg1'];
    }

    //echo Sum ($_GET['arg1'], $_GET['arg2']);