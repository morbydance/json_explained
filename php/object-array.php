<?php
// Ebben egy tömbnyi objektumot küldünk vissza
$response = array();

$response['error'] = false;

for ($i = 0; $i < 5; $i++) {
  // Hozzáadunk egy új objektumot
  $response['data'][] = new stdClass();
  // Itt feltöltjük adatokkal
  // Ez lehetne egy másik for ciklusban is, de most ide raktam
  $response['data'][$i]->username = "test$i";
  $response['data'][$i]->email = "test$i@example.com";
}

// A tömb elemei is lehetnek asszociatívak
// Pl: Ha egy tömb felhasználót vissza akarsz adni, akkor lehet a kulcsuk az ID

$userArr = array();

$user1 = new stdClass();
$user1->id = 23;
$user1->username = 'user1';
$user1->email = 'user1@example.com';
$userArr[] = $user1;

$user2 = new stdClass();
$user2->id = 29;
$user2->username = 'user2';
$user2->email = 'user2@example.com';
$userArr[] = $user2;

$user3 = new stdClass();
$user3->id = 64;
$user3->username = 'user3';
$user3->email = 'user3@example.com';
$userArr[] = $user3;

foreach ($userArr as $u) {
  $response['dataAssoc'][$u->id] = $u;
}

// Üzenet
$response['msg'] = 'A művelet sikeresen végrehajtva!';

// JSON formázás
echo json_encode($response, JSON_UNESCAPED_UNICODE);
