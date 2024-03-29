<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <button onclick="location.href='<?= base_url('JokesController/confirm_delete'.'/'. $joke['id']); ?>'">Delete joke</button>
    <?php if ($joke) : ?>
        <div class='joke-card'>
            <h2><?= $joke['title'] ?></h2>
            <h2><?= $joke['content'] ?></h2>
        </div>
    <?php endif; ?>
</body>

</html>
