<?php

// ALERT ALERT ALERT ALERT ALERT ALERT ALERT ALERT ALERT ALERT ALERT ALERT ALERT ALERT
function alerta($vl,$tx){
  echo '<input id="testetoastr" type="hidden" value="'.$vl.'" texto="'.$tx.'">';
}

// MASK
function mask($val, $mask){
  $maskared = '';
  $k = 0;

  for($i = 0; $i<=strlen($mask)-1; $i++){
    if($mask[$i] == '#'){
      if(isset($val[$k]))
      $maskared .= $val[$k++];
    }else{
      if(isset($mask[$i]))
      $maskared .= $mask[$i];
    }
  }
  return $maskared;
}
