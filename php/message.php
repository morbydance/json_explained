<?php
// Ebben a példában csak üzenetet küldünk vissza a szerveroldalról
// Nincs adat csatolva JSON-ban, csak üzenet a feldolgozásról
$response = array();

if (!empty($_POST)) {
  // Adatok ellenőrzése
  // Ezek lehetnek például felhasználó hitelesítési üzenetek
  // Például: jelszó nem elég hosszú, hibás jelszó, stb
  if (empty($_POST['dataStr'])) {
    // Van hiba
    // A tömbnek string-ként meg lehet adni a kulcsát, ekkor asszociatív lesz
    // Ezek teljesen tetszőlegesek lehetnek, nem kell ezekhez ragaszkodni
    // Itt 'error' és 'msg', de lehetne 'err', 'message' vagy 'adat'
    $response['error'] = true;
    $response['msg'] = 'Írjon be egy szöveget!';
  } elseif ($_POST['dataInt'] < 1) {
    // Van hiba
    $response['error'] = true;
    $response['msg'] = 'Adjon meg egy pozitív számot!';
  } else {
    $dataStr = filter_input(INPUT_POST, 'dataStr');
    $dataInt = filter_input(INPUT_POST, 'dataInt');

    // Nincs hiba
    $response['error'] = false;

    // Itt lehetnének adatbázis-műveletek
    // Pl: jelszóellenőrzés, vagy UPDATE

    // Üzenet (nincs adat)
    $response['msg'] = 'A művelet sikeresen végrehajtva!';
  }
} else {
  // Ha nem POST a request method
  $response['error'] = true;
  $response['msg'] = 'Hibás lekérdezés';
}

// JSON formázás
echo json_encode($response, JSON_UNESCAPED_UNICODE);
