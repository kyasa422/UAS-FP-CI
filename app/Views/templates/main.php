<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="/src/style.css" rel="stylesheet">
   
    <title><?= $title ?></title>
</head>

<body >
    <?= $this->include('templates/navbar') ?>

    <div class="bg-white">
        <?= $this->renderSection('content') ?>
    </div>
    
</body>

</html>