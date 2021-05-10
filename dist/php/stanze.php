
<?php

# TRASFORMAZIONE DATI DATABASE IN JSON PER LEGGERE CON API

  require './db_hotel.php';

  header('Content-Type: application/json');

  if (!empty($_GET) && $_GET['id']) {
    $id = $_GET['id'];
    $database = [];

    $stmt = $conn->prepare("SELECT * FROM stanze WHERE id = ? ");
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $rows = $stmt->get_result();
    while($row = $rows->fetch_assoc()) {
      $database[] = $row;
    }

    echo json_encode ([
      'response' => $database,
      'success' => true,
    ]);


  } else {
    $sql = "SELECT id, room_number, floor, beds FROM stanze";
    $rows = $conn->query($sql);
    if ($rows && $rows->num_rows > 0) {
      while($row = $rows->fetch_assoc()) {
        $database[] = $row;
      }

      echo json_encode ([
        'response' => $database,
        'success' => true,
      ]);
    }
  }


  $conn->close();

 ?>
