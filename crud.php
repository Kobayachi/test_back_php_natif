<?php

  require_once('bdd.php');

  $age = isset($_POST['age']) ? $_POST['age'] : "";
  $balance = isset($_POST['balance']) ? $_POST['balance'] : "";
  $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
  $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
  $cars = isset($_POST['cars']) ? $_POST['cars'] : "";

  try {
    $info = explode('/', trim($_SERVER['PATH_INFO'],'\x20\x2f'));

    $bdd = new connectTest();

    $createUser = file_get_contents('user.sql');
    $bdd->createTable($createUser);

    $createCar = file_get_contents('car.sql');
    $bdd->createTable($createCar);

    if($info[0] == 'api')
    {
      switch($_SERVER['REQUEST_METHOD'])
      {
        case 'GET':
          $rows = $bdd->getTable(substr($info[1], 0, -1));
          viewTable($rows);
          break;

        case 'POST':
          if($info[1] = 'users')
          {
            $bdd->insertUsers($this->age, $this->balance, $this->firstname, $this->lastname, $this->cars);

            $rows = $bdd->getTable(substr($info[1], 0, -1));
            viewTable($rows);
          }
          break;

        case 'PUT':
          if($info[1] = 'users')
          {
            $bdd->updateUsers($this->age, $this->balance, $this->firstname, $this->lastname, $this->cars, $info[2]);

            $rows = $bdd->getTable(substr($info[1], 0, -1));
            viewTable($rows);
          }
          break;

        case 'DELETE':
          if($info[1] = 'users')
          {
            $bdd->deleteUsers($info[2]);

            $rows = $bdd->getTable(substr($info[1], 0, -1));
            viewTable($rows);
          }
          break;
      }
    }
  } catch (Exception $e) {
    header('Content-type: application/json');
    echo json_encode(array("status" => 0, "message" => $e->getMessage()));
  }

  function viewTable($rows)
  {
    header('Content-type: application/json');
    echo json_encode($rows);
  }

  function statusResponse($url)
  {
    $response = file_get_contents($url);
    header('Content-type: application/json');
    echo json_decode($response);
  }

?>


<!--
<form method="get" action="crud.php/api/users">
  <p><input type="submit" name="chxTable" value="USER"></p>
</form>

<form method="get" action="crud.php/api/cars">
  <p><input type="submit" name="chxTable" value="CAR"></p>
</form>

<form method="post" action="#">
  <p><input type="submit" name="chxTable" value="CAR"></p>
</form>
-->
