<!-- start header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="icon" href="http://www.uidownload.com/files/973/328/33/judaism-star-of-david-icon.png">
    <title>Magi Callie — Online Novel</title>
</head>
<body>
<div class="wrapper">
    <header>
        <nav>
            <ul>
                <?php foreach ($database->navItems as $item): ?>
                <a <?php if (strstr($_SERVER["REQUEST_URI"], $item->url)) echo 'class="active"' ?>
                    href="<?= $item->url ?>" alt="<?= $item->caption ?>">
                    <li>
                        <i class="<?= $item->icon ?>"></i>
                        <span class="nav-name"><?= $item->caption ?></span>
                    </li>
                </a>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
    <main>
<!-- end header -->