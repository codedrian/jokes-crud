<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/add-form.css'); ?>">
</head>

<body>
    <main>
        <header>
            <h3>Add your hilarious joke </h3>
        </header>
        <form action="<?= base_url('JokesController/add_joke') ?>" method="post">
            <input type="hidden" name="action">
            <label for="joke_title">Title:</label>
            <input type="text" name="joke_title">
            <label for="joke_content">Content:</label>
            <textarea name="joke_content" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Add joke" id="submit-joke-button">
        </form>
    </main>
</body>

</html>
