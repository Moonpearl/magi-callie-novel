<!-- start home page -->
        <div class="title" >
            <h1>Welcome to Midgård</h1>
            <p>Today is <a href="<?= $router->generate('date') ?>"><span class="date"><?= $date->display(); ?></a></span></p>
        </div>
        <ul class="buttonbar">
            <a href="<?= $router->generate('chapter') ?>" alt="Start reading">
            <li>
                <?php if (isset($_COOKIE['last_chapter'])): ?>
                Resume reading
                <?php else: ?>
                Start reading
                <?php endif; ?>
                <i class="fas fa-arrow-alt-circle-right"></i>
            </li>
            </a>
        </ul>
<!-- end home page -->
