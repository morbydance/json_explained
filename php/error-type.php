<?php
// Ez egy példa, hogyan küldhetjük frontend-re a hiba típusát
$response = array();

if (empty($_POST['uname'])) {
  $response['error'] = true;
  $response['errType'] = 'uname';
  $response['msg'] = 'A mező kitöltése kötelező!';
} elseif (empty($_POST['pwd'])) {
  $response['error'] = true;
  $response['errType'] = 'pwd';
  $response['msg'] = 'A mező kitöltése kötelező!';
} else {
  $uname = filter_input(INPUT_POST, 'uname');
  $pwd = filter_input(INPUT_POST, 'pwd');

  if (mb_strlen($uname) < 4) {
    $response['error'] = true;
    $response['errType'] = 'uname';
    $response['msg'] = 'A felhasználónév legalább 4 karakter hosszú kell legyen!';
  } elseif (mb_strlen($pwd) < 8) {
    $response['error'] = true;
    $response['errType'] = 'pwd';
    $response['msg'] = 'A jelszó legalább 8 karakter hosszú kell legyen!';
  } else {
    $response['error'] = false;
    $response['msg'] = 'A művelet sikeresen végrehajtva!';
  }
}

// JSON formázás
echo json_encode($response, JSON_UNESCAPED_UNICODE);
