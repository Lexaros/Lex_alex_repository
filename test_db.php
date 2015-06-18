<?php
    $link=mysqli_connect('localhost','root',",'rental','7188');
    if (mysqli_connect_errno())
    {
        echo "Sorry. Unable to connect to database";
        exit();
    }
    $query="select name FROM dvd where product_year=2010";
    $result=mysqli_query ($link,$query);
    var_export ($result);
    if ($result)
    {
        while ($row=mysqli_fetch_assoc($result))
        {
            var_export ($row);
        }
    }
    $g_dbLink=null;
    