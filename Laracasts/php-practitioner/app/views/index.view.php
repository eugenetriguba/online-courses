<?php require('partials/head.view.php'); ?>

<main>
    <h1>Names in the Database</h1>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li><?= $user->name; ?></li>
        <? endforeach; ?>
    </ul>

    <h1>Submit Your Name</h1>

    <form method="POST" action="/names">
        <label>
            Name:
            <input type="text" name="name">
            <button type="submit">Submit</button>
        </label>
    </form>
</main>

<?php require('partials/footer.view.php'); ?>