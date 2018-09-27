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

function up_file($arq, $pasta, $nome){
  $file = $arq;
  $name = $nome.'_'.date('YmdHis');
  $extension  = $arq->extension();
  $nameFile   = "{$name}.{$extension}";
  $upload     = $arq->storeAs('public/'.$pasta, $nameFile);

  if(!$upload)return redirect()->back()->with('error', 'Falha ao fazer upload')->withInput();

  return $nameFile;
}
