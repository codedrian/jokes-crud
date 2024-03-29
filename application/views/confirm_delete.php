<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/confirm-delete.css'); ?>">
</head>

<body>
    <h1>Are you sure you want to delete this coded?</h1>
    <section class="button-container">
        <button onclick="location.href='<?= base_url('JokesController/delete_joke' . '/' . $joke_id); ?>'">Yes</button>
        <button onclick="location.href='<?= base_url('JokesController'); ?>'">No</button>
    </section>
</body>

</html>
