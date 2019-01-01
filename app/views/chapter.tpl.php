<!-- start chapter page -->
        <?php
            $id = $data['id'];
            $last_chapter = $data['last_chapter'];
            $chapter = $data['chapter'];
        ?>

        <div class="chapter">
            <?php if ($id > 1): ?>
            <a href="<?= get_url('chapter/' . ($id - 1) ) ?>" alt="Previous chapter">
                <i class="iconbutton fas fa-arrow-alt-circle-left"></i>
            </a>
            <?php else: ?>
            <i class="iconbutton disabled fas fa-arrow-alt-circle-left"></i>
            <?php endif; ?>
            
            <h1><?= $chapter->title ?></h1>
            
            <?php if ($id < $last_chapter): ?>
            <a href="<?= get_url('chapter/' . ($id + 1) ) ?>" alt="Next chapter">
                <i class="iconbutton fas fa-arrow-alt-circle-right"></i>
            </a>
            <?php else: ?>
            <i class="iconbutton disabled fas fa-arrow-alt-circle-right"></i>
            <?php endif; ?>
        </div>

        <div class="novel">
        <?php

        $content = file_get_contents( $chapter->getURL() );

        preg_match('/\<body class="\w+"\>(.*?)\<\/body\>/', $content, $match);

        $content = $match[1];

        preg_match_all("/\<p class=\"c\d subtitle\" id=\"h\.\w+\"\>\<span class=\".*?\"\>(.*?)\<\/span\>\<\/p\>(.*?)\<hr\>/", $content, $matches);

        function content_replace($content, $old, $tag, $new) {
            switch ($tag) {
                case 'quote':
                    $new = '<blockquote>' . $new . '</blockquote>';
                    break;

                default:
                    $new = '<div class="' . $tag . '">' . $new . '</div>';
            }
            return str_replace($old, $new, $content);
        }

        for ($i = 0; $i < sizeof($matches[0]); $i++) {
            $content = content_replace($content, $matches[0][$i], strtolower($matches[1][$i]), $matches[2][$i]);
        }

        echo $content;

        ?>

            <ul class="buttonbar">
                <a id="next-chapter" href="<?= get_url('chapter/' . ($id + 1) ) ?>" alt="Next chapter">
                <li>
                    Next chapter <i class="fas fa-arrow-alt-circle-right"></i>
                </li>
                </a>
            </ul>
        </div>

<!-- end chapter page -->