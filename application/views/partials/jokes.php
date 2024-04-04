<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/add-form.css'); ?>">
    <title>Document</title>
</head>

<body>
    <div id="jokes">
        <?php
        foreach ($jokes as $joke) {  ?>
            <div class="joke-card">
                <h1><?= $joke['title'] ?></h1>
                <p><?= $joke['content'] ?></p>
            </div>
        <?php
        }  ?>
</body>

</html>
