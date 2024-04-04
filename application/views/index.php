<?php
defined('BASEPATH') or exit('No direct script access allowed');
/** @var array $jokes */
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jokes List</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/index.css'); ?>">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
			$(document).ready(function() {
				// Fetch jokes when the page loads
				fetchJokes();

				// Handle form submission for filtering jokes
				$('.filter-jokes').submit(function(e) {
					// Prevent the default form submission
					e.preventDefault();

					// Serialize form data
					var formData = $(this).serialize();

					// Send AJAX request
					$.post("JokesController/filter_jokes_json", formData, function(response) {
						// Handle server response
						console.log(response);
						if (response.jokes) {
							// Clear existing jokes
							$(".jokes-wrapper").empty();

							// Append filtered jokes to the wrapper
							response.jokes.forEach(joke => {
								$(".jokes-wrapper").append(`
                            <div class='joke-card'>
                                <h2><a href="<?= base_url('JokesController/view_joke') ?>/${joke.id}">${joke.title}</a></h2>
                                <h2>${joke.created_at}</h2>
                            </div>
                        `);
							});
						}
					}, 'json');
				});

				// Function to fetch jokes
				function fetchJokes() {
					$.get("JokesController/index_json", function(response) {
						console.log(response);
						let jokes = response.jokes;
						$(".jokes-wrapper").empty();

						// Append jokes to the wrapper
						jokes.forEach(joke => {
							$(".jokes-wrapper").append(`
                        <div class='joke-card'>
                            <h2><a href="<?= base_url('JokesController/view_joke') ?>/${joke.id}">${joke.title}</a></h2>
                            <h2>${joke.created_at}</h2>
                        </div>
                    `);
						});
					}, "json");
				}
			});
	</script>
</head>

<body>
	<main>
		<div class="button-container">
			<button onclick="location.href='<?= base_url('JokesController/add_joke_form'); ?>'">Add new joke</button>
		</div>
		<header>
			<h1>Jokes List</h1>
		</header>
		<form action="<?= base_url('JokesController/filter_jokes_json') ?>" method="post" class="filter-jokes">
			<input type="radio" id="recent" name="filter" value="recent">
			<label for="recent">Recent Jokes (added within the last 7 weeks)</label><br>
			<input type="radio" id="old" name="filter" value="old">
			<label for="old">Old Jokes (added older than 7 weeks)</label><br>
			<button type="submit" class="submit-filter">Apply Filter</button>
		</form>
		<section class="jokes-wrapper">

		</section>
	</main>
</body>

</html>
