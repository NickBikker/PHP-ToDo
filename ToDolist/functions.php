<?php 

function openDatabaseConnection(){
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=php-todo", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
}


function getAllItems() {
    $conn = openDatabaseConnection();
    $query = $conn->prepare('SELECT * FROM `todo-items`');
    $query->execute();
    $result = $query->fetchAll();
    return $result;
    $conn = null;
}

function getItemFromID($id) {
    $conn = openDatabaseConnection();
    $query = $conn->prepare('SELECT * FROM `todo-items` WHERE `id` = :id ');
    $query->execute([':id' => $id]);
    $result = $query->fetch();
    $conn = null;
    return $result;
}

function insertTask($data){
    $conn = openDatabaseConnection();
   $query = $conn->prepare("INSERT INTO `todo-items` (title, description, user, status, time) VALUES ('".implode("','", $data)."')");
   $query->execute();
   header('location:index.php');
}

function update($data){
    $conn = openDatabaseConnection();
    $query = $conn->prepare("UPDATE `todo-items` SET title = :titel, description = :todo, user = :gebruiker, status = :status, time = :tijd WHERE id = :id");
    $query->execute([":titel"=>$data['title'], ":todo"=>$data['description'], ":gebruiker"=>$data['user'], ":status"=>$data['status'],":tijd"=>$data['time'],":id"=>$data['id']]);
    $message = "Aanpassen gelukt!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('location:index.php');
}

function delete($data){
    $conn = openDatabaseConnection();
    $query = $conn->prepare('DELETE FROM `todo-items` WHERE id = :id');
    $query->execute([':id' => $data['id']]);
    $message = "Aanpassen gelukt!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('location:index.php');
}

function getAllLists(){
    $conn = openDatabaseConnection();
    $query = $conn->prepare('SELECT * FROM `lists`');
    $query->execute();
    $lists = $query->fetchAll();
    return $lists;
    $conn = null;
}

function getItemsFromStatus($status) {
    $conn = openDatabaseConnection();
    $query = $conn->prepare('SELECT * FROM `todo-items` WHERE `status` = :id');
    $query->execute([':id'=>$status]);
    $items = $query->fetchAll();
    return $items;
    $conn = null;
}
