<?php

include __DIR__ . '/inc/func.php';

test();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
            background: black;
            color: white;
            display: flex;
            flex-direction: column;
            /* grid-template-rows: 1fr 1fr; */
            height: calc(100vh - 1em);
        }

        iframe {
            border: none;
            width: 100%;
            height: 100%;
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>Beautiful chapter</h1>
    <iframe id="chapter" src="content.php"></iframe>
</body>
</html>