<?php
session_start();

include("input.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Бронирование даты</title>
  <link href="css/style.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="js/jquery.maskedinput.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <div class="container">
      <img src="img/booking.gif" alt="">
    </div>
  </header>

  <div class="cal-year clearfix">
      <?php for ($month=0; $month<=11; $month++){ ?>
    <section class="container">
      <table class="month">
        <caption>
          <?php echo strval($monthsName[$month][1]);?>
          <div class="line"></div>
        </caption>
        <thead>
          <tr>
        <?php for ($day=0; $day <7; $day++) {
          if ($day<5) {
            ?><th><?php echo strval($DaysOfTheWeek[$day][1]);?></th><?php
          } else{
            ?><th class="weekend"> <?php echo strval($DaysOfTheWeek[$day][1]);?></th>
          <?php }
          }?>
        </tr>
      </thead>
      <tbody>
        <?php $count = '1';
        $maxcount = intval(date('t', mktime( 0, 0, 0, $month+1, 1, 2019)));
        $weekDayOfMonth = intval(date('N', mktime( 0, 0, 0, $month+1, 1, 2019))) -1;

        for ($week=0; $week < 6; $week++) {
          ?> <tr> <?php
          for ($weekOfDay = 0; $weekOfDay < 7; $weekOfDay++) {
              if ($weekDayOfMonth > $weekOfDay) {
              ?> <td class="off"></td> <?php
              }else {
                $weekDayOfMonth = -1;
                if($maxcount>$count){
                  ?> <td
                        <?php
                          for ($idchange=0; $idchange < count($Changed); $idchange++) {
                            if ($month == intval($Changed[$idchange][0]) && $count == intval($Changed[$idchange][1])){
                              echo ' class="changed"';
                            }else{
                              if(intval($_SESSION['month'])==$month && intval($_SESSION['day'])==$count) {echo ' class="change"';}
                            }
                          }
                        ?>
                     >
                     <a href="index.php?month=<?php echo $month?>&day=<?php echo $count ?>"><?php echo $count; ?></a></td><?php
                    $count++;
                }else {
                  ?> <td class="off"></td> <?php
                }
              };
          };
          ?> </tr> <?php
        };
        ?>
      </tbody>
    </table>
  </section>

<?php };
 ?>


  </div>

    <form class="data" action="index.php" method="post">
      <label>Укажите телефон:</label></br>
      <input class="phone"  id="phone" name="phone" type="text" class="form-control">
        <script>
          $(function(){
            $("#phone").mask("+7(999) 999-99-99");
          });
        </script>
      <input class="booking-btn" name="submit" type="submit" value="Забронировать">
    </form>


</body>
</html>
