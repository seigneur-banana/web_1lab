<?php
$startTime = microtime(true);
session_start();

if (isset($_GET['coordinateX']) && isset($_GET['coordinateY']) && isset($_GET['radius']))
{
    $X = $_GET['coordinateX'];
    $Y = $_GET['coordinateY'];
    $R = $_GET['radius'];

    $allowedValuesOfX = ['-2', '-1.5', '-1', '-0.5', '0', '0.5', '1', '1.5', '2'];
    $allowedValuesOfR = ['1', '2', '3', '4', '5'];

    if (in_array($X, $allowedValuesOfX) && preg_match("/^((-?[0-3],\d*(?=[1-9])[1-9])|0|(-?[12]))$/", $Y) && in_array($R, $allowedValuesOfR))
    {
        if (pointIsInTriangle($X, $Y, $R) || pointIsInRectangle($X, $Y, $R) || pointIsInCircle($X, $Y, $R))
        {
            $msg = "Да";
        }
        else
        {
            $msg = "Нет";
        }

        date_default_timezone_set('Europe/Moscow');
        $endTime = microtime(true);
        $executionTime = round($endTime - $startTime, 6);
        $currentTime = date('d.m.y H:i:s');

        $row = "<tr><td>$X</td><td>$Y</td><td>$R</td><td>$msg</td><td>$currentTime</td><td>$executionTime</td></tr>";
        if (isset($_SESSION['rows']))
        {
            $_SESSION['rows'][] = $row;
        }
        else
        {
            $_SESSION['rows'] = array($row);
        }
        header("location: index.php");
    }
    else
    {
        echo "Ошибка при вводе данных!</br><a href='index.php'>Вернуться назад</a>.</br>";
    }
}
else
{
    echo "Ошибка при вводе данных!</br><a href='index.php'>Вернуться назад</a>!";
}

function pointIsInTriangle($X, $Y, $R)
{
    return ($Y <= $X / 2 + $R) && ($Y >= 0) && ($X <= 0);
}

function pointIsInRectangle($X, $Y, $R)
{
    return ($Y >= $R) && ($Y >= 0) && ($X >= $R / 2) && ($X >= 0);
}

function pointIsInCircle($X, $Y, $R)
{
    return ($X * $X + $Y * $Y <= $R * $R) && ($Y <= 0) && ($X >= 0);
}
