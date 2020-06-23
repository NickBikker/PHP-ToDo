<?php
require 'functions.php';
$id = $_GET['user_id'];
$data = getItemFromID($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>delete</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="get.php?action=delete">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Titel</label>
                        <input type="text" class="form-control" placeholder="Titel...." name="title" value="<?= $data['title'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Beschrijving</label>
                        <textarea class="form-control" rows="3" placeholder="Write ToDo here...." name="description" readonly><?= $data['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Toegevoegd door:</label>
                        <input type="text" class="form-control" name="user" value="<?= $data['user'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Status:</label>
                        <input type="text" class="form-control" name="status" value="<?= $data['status'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tijd:</label>
                        <input type="text" class="form-control" name="time" value="<?= $data['time'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID:</label>
                        <input type="text" class="form-control" name="id" value="<?= $data['id'] ?>" readonly>
                    </div>
                    <button type="submit" class="btn btn-danger">Delete Item</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>