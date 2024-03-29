<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Are you sure you want to delete this coded? <?= $joke_id?></h1>
    <button onclick="location.href='<?= base_url('JokesController/delete_joke'.'/'. $joke_id); ?>'">Yes</button>
</body>
</html>
