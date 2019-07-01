<?php
/**
 *
 */
class changeClass extends AnotherClass
{

  public function change($mont, $day)
  {
    if ($this->$firstparam === $_Get['month'] && $this->$day === $_Get['day']){
      echo ' class="change"';
    }
  }
}

// function change($mont, $day){
//   if ($this->$firstparam === $_Get['month'] && $this->$day === $_Get['day']){
//     echo ' class="change"';
//   }
// }
//  ?>
