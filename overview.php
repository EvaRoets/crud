<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TravelTrack - track your travel goals</title>
</head>
<body>

<h1>TravelTrack - track your travel goals</h1>

<ul>
    <?php foreach ($travels as $travel) : ?>
        <li><?= $travel['activity'] ?></li>
    <?php endforeach; ?>
</ul>

<form>
    //TODO Create a form containing all the relevant fields.
    //TODO Save the field information as a new entry in the database once it is submitted.
    //TODO optional validate data
</form>



</body>
</html>


