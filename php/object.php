<?php
// Ebben a példában objektumot küldünk vissza
$response = array();

$response['error'] = false;

// Itt egy objektumot küldünk vissza
// Pl: Egy lekérdezett felhasználó minden adata

// A new stdClass() az objektum inicializálásához kell
// Szerintem még soha nem kellett használnom, mert a mysql már egy kész objektumot ad
$user = new stdClass();
// PHP-ban nem ponttal hivatkozunk egy objektum mezőjére, hanem nyíllal
// Pl: Nem objektum.username, hanem objetkum->username
$user->username = 'test'; // $objektum->mezőnév = érték
$user->email = 'test@example.com';
$user->firstName = 'John';
$user->lastName = 'Smith';
$user->age = 28;

// Üzenet
$response['msg'] = 'A művelet sikeresen végrehajtva!';
$response['data'] = $user;

// JSON formázás
echo json_encode($response, JSON_UNESCAPED_UNICODE);
