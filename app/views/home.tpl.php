<!-- start home page -->
        <div class="title" >
            <h1>
              <?= [
                'en' => 'Welcome to Midgård',
                'fr' => 'Bienvenue à Midgård'
              ][$lang] ?>
            </h1>
            <p>Today is <a href="<?= $router->generate('date', ['lang' => $lang]) ?>"><span class="date"><?= $date->display(); ?></a></span></p>
        </div>
        <ul class="buttonbar">
            <a href="<?= $router->generate('chapter', ['lang' => $lang]) ?>" alt="Start reading">
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
