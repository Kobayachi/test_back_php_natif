<?php

  class connectTest()
  {

    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');

    function createTable($query)
    {
      $statement = $this->pdo->prepare($query);
      $statement->execute();

      //$this->pdo->exec($query);
    }

    function getTable($table)
    {
      $query = "SELECT * FROM " . $table;

      getMessage($query);

      $statement = $this->pdo->query($query);
      $row = $statement->fetch(PDO::FETCH_ASSOC);

      return $row;
    }

    function insertUsers($age, $balance, $firstname, $lastname, $cars)
    {
      $query = "INSERT INTO user ('age', 'balance', 'firstname', 'lastname', 'cars')";
      $query .= " VALUES ('". $age ."', '". $balance ."', '". $firstname ."', '". $lastname ."', '". $cars ."')";

      getMessage($query);

      $statement = $this->pdo->prepare($query);
      $statement->execute();
    }

    function updateUsers($age, $balance, $firstname, $lastname, $cars, $id)
    {
      $query = "UPDATE user";
      $query .= " SET age = '". $age ."', ";
      $query .= " SET balance = '". $balance ."', ";
      $query .= " SET firstname = '". $firstname ."', ";
      $query .= " SET lastname = '". $lastname ."', ";
      $query .= " SET cars = '". $cars ."' ";
      $query .= " WHERE id = ". $id;

      getMessage($query);

      $statement = $this->pdo->prepare($query);
      $statement->execute();
    }

    function deleteUsers($id)
    {
      $query = "DELETE user WHERE id = ". $id;

      getMessage($query);

      $statement = $this->pdo->prepare($query);
      $statement->execute();
    }

    function getMessage($query)
    {
      $sql = $this->pdo->query($query);
      if(!$sql)
      {
        $json = array("status" => 0, "message" => "Modification User avec erreur");
        header('Content-type: application/json');
        echo json_encode($json);
      }

    }

  }

?>
