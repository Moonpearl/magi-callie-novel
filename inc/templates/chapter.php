<!-- start chapter page -->
        <div class="novel">
            <div class="chapter">
                <?php if ($id > 1): ?>
                <a href="novel.php?id=<?= $id - 1 ?>" alt="Previous chapter">
                    <i class="iconbutton fas fa-arrow-alt-circle-left"></i>
                </a>
                <?php else: ?>
                <i class="iconbutton disabled fas fa-arrow-alt-circle-left"></i>
                <?php endif; ?>
                
                <h1><?= $chapter->title ?></h1>
                
                <?php if ($id < $database->readChaptersAmount()): ?>
                <a href="novel.php?id=<?= $id + 1 ?>" alt="Next chapter">
                    <i class="iconbutton fas fa-arrow-alt-circle-right"></i>
                </a>
                <?php else: ?>
                <i class="iconbutton disabled fas fa-arrow-alt-circle-right"></i>
                <?php endif; ?>
            </div>

            <iframe id="chapter" src="inc/templates/chapter_content.php?key=<?= $chapter->serial ?>"></iframe>
            <!-- <ul class="buttonbar">
                <a href="#" alt="Next chapter">
                <li>
                    Next chapter <i class="fas fa-arrow-alt-circle-right"></i>
                </li>
                </a>
            </ul> -->
        </div>
<!-- end chapter page -->