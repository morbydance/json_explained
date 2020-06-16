<?php
// Ebben a példában tömböt küldünk vissza
$response = array();

/*
// Adat ellenőrzése (most kihagyom)
if (!empty($_POST)) {
  if (empty($_POST['dataStr'])) {
    $response['error'] = true;
    $response['msg'] = 'Írjon be egy szöveget!';
  } else {

  }
} else {
  // Ha nem POST a request method
  $response['error'] = true;
  $response['msg'] = 'Hibás lekérdezés';
}
*/

$response['error'] = false;

// Itt több adatot kell visszaadni egyszerre (tömbben)
// Pl: Azon városok ID-je, ahol a népesség > 1.000.000
for ($i = 0; $i < 10; $i++) {
  // A második [] azt jelenti, hogy fűzzön hozzá egy új elemet a 'data' mezőhöz
  // Lényegében ez a .push()
  $response['data'][] = "test$i@example.com";
}

// Üzenet
$response['msg'] = 'A művelet sikeresen végrehajtva!';

// JSON formázás
echo json_encode($response, JSON_UNESCAPED_UNICODE);
