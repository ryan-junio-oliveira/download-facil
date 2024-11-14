<?php

require_once('../vendor/autoload.php');

try { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <title>Document</title>
    </head>
    <body>
        <?php 
        include_once('../routes/web.php'); 
        ?>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>
    </html>
<?php
} catch (\Throwable $th) {
    var_dump($th);
}
