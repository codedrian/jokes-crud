<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/add-form.css'); ?>">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
        $("document").ready(function() {
            $.get("<?= base_url('JokesController/index_json') ?>", function(response) {
                console.log(response);
                let jokes = response.jokes;
                jokes.forEach(joke => {
                    $("#jokes").append(`
                    <div class='joke-card'>
                        <h2>${joke.title}</h2>
                        <p>${joke.content}</p>
                    </div>
                `);
                    $(".joke-card").each(function() {
                        $(this).addClass("joke-card");
                    });
                });
            }, "json");
            /*NOTE: AJAX implementation */
            $("form").submit(function() {
                $.post("<?= base_url('JokesController/add_joke') ?>", $(this).serialize(), function(response) {
                    console.log(response);
                    $("#jokes").append(response);
                });
                return false;
            });
        });
    </script>
</head>

<body>
    <main>
        <h3>Add your hilarious joke </h3>
        <form action="<?= base_url('JokesController/add_joke') ?>" method="post">
            <input type="hidden" name="action">
            <label for="joke_title">Title:</label>
            <input type="text" name="joke_title">
            <label for="joke_content">Content:</label>
            <textarea name="joke_content" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Add joke" id="submit-joke-button">
        </form>
        <section id="jokes">

        </section>
    </main>
</body>

</html>
