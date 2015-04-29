<?php
    header('Content-Type: text/plain');
    echo 'Hello, Dear ' . (isset($_GET['name']) ? $_GET['name'] : '') . '!';