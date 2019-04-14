<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body>
    <header>
        <h1>
            <?php foreach ($tasks as $task) : ?>
                <!-- Oddly enough, PHP will convert a false value from isComplete
                to a blank so we need to use a ternary here to force it.. -->
                <li><?= $task->getDesc() . ': ' . ($task->isComplete() ? 'true' : 'false') ?></li>
            <?php endforeach; ?>
        </h1>
    </header>
</body>
</html>
