<!-- start header -->
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="css/reset.css"> -->
    <link rel="stylesheet" href="<?= Path::css_url('style.css') ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="icon" href="http://www.uidownload.com/files/973/328/33/judaism-star-of-david-icon.png">
    <title><?= $title ?></title>
</head>
<body>
<div class="wrapper">
    <header>
        <nav>
            <ul>
                <?php foreach ( NavItem::fetchAll(['id', 'caption', 'icon', 'url']) as $item ): ?>
                <a <?php if ( $item->url === $match_name ) echo 'class="active"' ?>
                    href="<?= $router->generate($item->url, [ 'lang' => $lang ] ) ?>" alt="<?= $item->caption ?>">
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
