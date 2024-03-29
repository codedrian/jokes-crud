<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jokes List</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/index.css'); ?>">
</head>

<body>
	<main>
		<section class="button-container">
			<button onclick="location.href='<?= base_url('JokesController/add_joke_form'); ?>'">Add new joke</button>
		</section>
		<header>
			<h1>Jokes List (<?= count($jokes) ?>)</h1>
		</header>
		<?php foreach ($jokes as $joke) : ?>
			<div class='joke-card'>
				<h2><a href="<?= base_url('JokesController/view_joke' . '/' . $joke['id']) ?>"><?= $joke['title'] ?></a></h2>
				<h2><?= $joke['created_at'] ?></h2>
			</div>
		<?php endforeach; ?>

	</main>
</body>

</html>
