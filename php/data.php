<?php
// Ebben a példában módosított adatot küldünk vissza
$response = array();

if (!empty($_POST)) {
  // Adat ellenőrzése
  if (empty($_POST['dataStr'])) {
    // Van hiba
    $response['error'] = true;
    $response['msg'] = 'Írjon be egy szöveget!';
  } else {
    $dataStr = filter_input(INPUT_POST, 'dataStr');

    // Nincs hiba
    $response['error'] = false;

    // Ez lehetne adatbázis-művelet
    // Pl: adat kiolvasása (SELECT)
    $dataStr .= ' módosítva';

    // Üzenet (van adat)
    $response['msg'] = 'A művelet sikeresen végrehajtva!';
    $response['data'] = $dataStr; // A data mező tartalma legyen a módosított string
  }
} else {
  // Ha nem POST a request method
  $response['error'] = true;
  $response['msg'] = 'Hibás lekérdezés';
}

// JSON formázás
echo json_encode($response, JSON_UNESCAPED_UNICODE);
