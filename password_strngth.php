<?php
    require_once('include/common.inc.php');
    require_once('include/password.inc.php');

    $password = GetParamFromGet('password');
    $strength = 0;
    $valid = Validate("/[^0-9a-zA-Z]/", $password); //Пароль может состоять только из английских символов в верхнем и нижнем регистрах, а также из цифр.
    if (!$valid)
    {
        echo "pass amy contain only digits and latin letters";
    }
    else
    {
        echo "password - $password<br/>";
        $strength = StrengthFromLength($strength, $password, 4); //К надежности прибавляется (4*n), где n - количество всех симоволов пароля
        $strength = StrengthPregCount($strength, $password, "/[0-9]/", 4); //К надежности прибавляется ((len-n)*2) в случае, если пароль содержит n символов в верхнем регистре
        $strength = StrengthFromLetterSize($strength, $password, "/[A-Z]/", 2); //К надежности прибавляется +((len-n)*2) в случае, если пароль содержит n символов в ВЕРХНЕМ регистре
        $strength = StrengthFromLetterSize($strength, $password, "/[a-z]/", 2); //К надежности прибавляется +((len-n)*2) в случае, если пароль содержит n символов в нижнем регистре
        $strength = StrengthMinusPreg($strength, $password, "/[a-Z]/"); //Если пароль состоит только из букв вычитаем число равное количеству символов.
        $strength = StrengthMinusPreg($strength, $password, "/[0-9]/"); //Если пароль состоит только из цифр вычитаем число равное количеству символов.
        $strength = StrengthMinusDublicate($strength, $password); // За каждый повторяющийся символ в пароле вычитается количество повторяющихся символов
        echo "Strength = $strength";
    };