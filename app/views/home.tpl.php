<!-- start home page -->
        <?php $date = $data['date']; ?>

        <div class="title" >
            <h1>Welcome to Midgård</h1>
            <p>Today is <a href="<?= get_url('date') ?>"><span class="date"><?= $date->display(); ?></a></span></p>
        </div>
        <ul class="buttonbar">
            <a href="<?= get_url('chapter') ?>" alt="Start reading">
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