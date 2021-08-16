<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goodcoin - track your collection of coins</title>
</head>
<body>

<h1>Goodcoin - track your collection of foreign coins</h1>

<ul>
    <?php foreach ($coins as $coin) : ?>
        <li><?= $coin['name'] ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>