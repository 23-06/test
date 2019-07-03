<?php

$monthsName = json_decode(file_get_contents("months.json"), true);
$DaysOfTheWeek = json_decode(file_get_contents("DaysOfTheWeek.json"), true);
$Changed = json_decode(file_get_contents("Changed.json"), true);

if (isset($_GET["month"]) && isset($_GET["day"])){
  $_SESSION["month"] = $_GET["month"];
  $_SESSION["day"] = $_GET["day"];
  unset($_GET);
};

if (isset($_POST["submit"]) && !empty($_POST["phone"])){
  if (!empty($_SESSION)) {
    $Changed[count($Changed)] = array('0'=>strval($_SESSION["month"]), '1'=>strval($_SESSION["day"]), '3'=>strval($_POST["phone"]));
    file_put_contents('Changed.json', json_encode($Changed));
    unset($_SESSION); unset($_POST);
  }else{
    echo ("<script type='text/javascript'> alert('Выберите дату.');</script>");
    unset($_SESSION); unset($_POST);
  }
}else{
  if (isset($_POST["submit"]) && empty($_POST["phone"])){
    echo ("<script type='text/javascript'> alert('Заполните номер телефона для бронирования даты.');</script>");
    unset($_SESSION); unset($_POST);
  }
}

?>
