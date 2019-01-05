<!-- start chapter page -->
        <div class="chapter">
            <?php if ($id > 1): ?>
            <a href="<?= $router->generate('chapter', ['lang' => $lang, 'id' => ($id - 1)] ) ?>" alt="Previous chapter">
                <i class="iconbutton fas fa-arrow-alt-circle-left"></i>
            </a>
            <?php else: ?>
            <i class="iconbutton disabled fas fa-arrow-alt-circle-left"></i>
            <?php endif; ?>

            <h1><?= $chapter->title ?></h1>

            <?php if ($id < $last_chapter): ?>
            <a href="<?= $router->generate('chapter', ['lang' => $lang, 'id' => ($id + 1)] ) ?>" alt="Next chapter">
                <i class="iconbutton fas fa-arrow-alt-circle-right"></i>
            </a>
            <?php else: ?>
            <i class="iconbutton disabled fas fa-arrow-alt-circle-right"></i>
            <?php endif; ?>
        </div>

        <div class="novel">
            <?= $chapter->getContents() ?>

            <ul class="buttonbar">
                <a id="next-chapter" href="<?= $router->generate('chapter', ['lang' => $lang, 'id' => ($id + 1)] ) ?>" alt="Next chapter">
                <li>
                    Next chapter <i class="fas fa-arrow-alt-circle-right"></i>
                </li>
                </a>
            </ul>
        </div>
<!-- end chapter page -->
