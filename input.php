<?php

$monthsName = json_decode(file_get_contents("months.json"), true);
$DaysOfTheWeek = json_decode(file_get_contents("DaysOfTheWeek.json"), true);
$Changed = json_decode(file_get_contents("qweryChanged.json"), true);

if (isset($_GET["month"]) && isset($_GET["day"])){
  $_SESSION["month"] = $_GET["month"];
  $_SESSION["day"] = $_GET["day"];
  unset($_GET);
};

if (isset($_POST["submit"]) && !empty($_POST["phone"])){
  if (!empty($_SESSION)) {
    $Changed[] = array("month"=>strval($_SESSION["month"]), "day"=>strval($_SESSION["day"]), "phone"=>strval($_POST["phone"]));
    if (file_put_contents ("qweryChanged.json", json_encode($Changed))){
      echo ("<script type='text/javascript'> alert('За Вами забронирована дата.');</script>");
    }else {
      echo ("<script type='text/javascript'> alert('Что-то пошло не так, бронь на данную дату не произведена. Попробуйте добавить позже.');</script>");
    };
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
