<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php if (isset($page_title)){ echo $page_title; } else { echo 'BDPA Flights';} ?>
        </title>
        <link rel="stylesheet" href="<?= $_ENV['BASE_URL']?>/web-assets/css/w3.css">
        <link rel="stylesheet" href="<?= $_ENV['BASE_URL']?>/web-assets/css/bootstrap.min.css">
    </head>
    <body class="bg-light">
