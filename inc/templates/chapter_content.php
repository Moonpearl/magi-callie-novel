<?php

$filename = 'https://docs.google.com/document/d/e/2PACX-' . $_GET['key'] . '/pub?embedded=true';

$content = file_get_contents($filename);
// Remove Google styles
$content = preg_replace("/\<style type=\"text\/css\"\>.*?\<\/style\>/", '', $content);
// Add CSS link
$content = str_replace('</head>', '<link rel="stylesheet" href="../../css/reset.css" />'.PHP_EOL.'<link rel="stylesheet" href="../../css/chapter.css" />'.PHP_EOL.'</head>', $content);
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


// var_dump($matches);

echo $content;