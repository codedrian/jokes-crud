
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/view-joke.css'); ?>">
</head>


<body>
    <main>
        <section class="button-container">
            <button onclick="location.href='<?= base_url('JokesController/add_joke_form'); ?>'">Add new</button>
            <button onclick="location.href='<?= base_url('JokesController/confirm_delete' . '/' . $joke['id']); ?>'">Delete joke</button>
        </section>
        <?php if ($joke) : ?>
            <div class='joke-card'>
                <h2><?= $joke['title'] ?></h2>
                <h2><?= $joke['content'] ?></h2>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>
