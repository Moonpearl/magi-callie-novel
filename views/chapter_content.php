<?php

$filename = 'https://docs.google.com/document/d/e/2PACX-' . $_GET['key'] . '/pub?embedded=true';

$content = file_get_contents($filename);
echo "Loaded properly!";

// Remove Google styles
$content = preg_replace("/\<style type=\"text\/css\"\>.*?\<\/style\>/", '', $content);
// Add CSS link
$content = str_replace('</head>',
    // '<link rel="stylesheet" href="../../css/reset.css" />'.PHP_EOL.
    '<link rel="stylesheet" href="../css/chapter.css" />'.PHP_EOL.
    // '<link rel="stylesheet" href="../../css/buttons.css" />'.PHP_EOL.
    '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">'.PHP_EOL.
    '</head>', $content);
// 
// preg_match_all("/\<p class=\"c\d subtitle\" id=\"h\.\w+\"\>\<span class=\".*?\"\>(.*?)\<\/span\>\<\/p\>(.*?)\<hr\>\<p class=\"c\d\"\>\<span class=\"c\d\"\>\<\/span\>\<\/p\>/", $content, $matches);
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

// Add "Next chapter" button
$content = str_replace('</body>', '
    <ul class="buttonbar">
    <a id="next-chapter" href="" alt="Next chapter">
    <li>
        Next chapter <i class="fas fa-arrow-alt-circle-right"></i>
    </li>
    </a>
    </ul>
    </body>', $content);

// var_dump($matches);

echo $content;