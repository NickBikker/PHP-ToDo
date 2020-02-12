<?php require 'functions.php';
$lists = getAllLists();
$function = $_GET['action'];
$data = $_POST;
if (function_exists($function)) {
	$function($data);
} ?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>PHP-ToDo</h1>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">To-Do item toevoegen</button>
					<div class="row">
						<?php
						foreach ($lists as $listname) {
							if ($counter % 4 == 0 && $counter != 0) {
								echo '</div><div class="row">'; ?>
							<div class="col-md-3">
								<h1><?= $listname["name"] ?></h1>
								<?php
								$items = getItemsFromStatus($listname['id']);
								foreach ($items as $row) {
									if ($row['status'] == 0) {
										$badge = '<span class="badge badge-secondary">Bezig</span>';
									} else {
										$badge = '<span class="badge badge-success">Voltooid</span>';
									} ?>
									<div class="card">
										<div class="card-body">
											<h5 class="card-title"><?= $row['title'] ?> - <?= $badge ?></h5>
											<p class="card-text"><?= $row['description'] ?></p>
											<p class="small">Geplaatst door: <a href="#"><?= $row['user'] ?></a></p>
											<p class="small">Tijd nodig: <?= $row['time'] ?> Minuten</p>
										</div>
										<hr>
										<div class="card-body">
											<ul class="list-inline text-center">
												<li class="list-inline-item">
													<a href="edit.php?user_id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
												</li>
												<li class="list-inline-item">
													<a href="delete.php?user_id=<?= $row['id'] ?>" class="btn btn-danger">Remove</a>
												</li>
											</ul>
										</div>
									</div>
								<?php
								} ?>
							</div>
						<?php } $counter++ ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add new ToDo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" action="index.php?action=insert_task">
				<div class="modal-body">
						<div class="form-group">
							<label for="exampleFormControlInput1">Titel</label>
							<input type="text" class="form-control" placeholder="Titel...." name="title">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Beschrijving</label>
							<textarea class="form-control" rows="3" placeholder="Write ToDo here...." name="description"></textarea>
						</div>
						<div class="form-group">
							<label for="exampleFormControlInput1">Toegevoegd door:</label>
							<input type="text" class="form-control" name="user">
						</div>
						<input type="text" hidden="true" value="0" name="status"></input>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Tijd nodig: </label>
							<input type="text" class="form-control" placeholder="Vul tijd in....." name="time">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Save changes</button>					
				</div>
				</form>
			</div>			
		</div>
	</div>	
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</html>