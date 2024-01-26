<?php

namespace App\API;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
use SQLite3;

final class api{
  public function getRowFromSQLITE(string $datarow){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    header('Content-Type: application/json');

    $db = new SQLite3('data.db');
    $sql = 'SELECT distinct '.$datarow.' FROM contacts';
    $stmt = $db->prepare($sql);
    $results = $stmt->execute();
    $data = [];

    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
        $data[] = $row;
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
  }
}
