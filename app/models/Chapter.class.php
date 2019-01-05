<?php

class Chapter extends Model {
  const TABLE_NAME = 'chapter';

  public $title;
  public $serial;

  function getURL() {
    return 'https://docs.google.com/document/d/e/2PACX-' . $this->serial . '/pub?embedded=true';
  }

  public function getContents() {
    $content = file_get_contents( $this->getURL() );

    preg_match('/\<body class="\w+"\>(.*?)\<\/body\>/', $content, $match);

    $content = $match[1];

    preg_match_all("/\<p class=\"c\d subtitle\" id=\"h\.\w+\"\>\<span class=\".*?\"\>(.*?)\<\/span\>\<\/p\>(.*?)\<hr\>/", $content, $matches);

    for ($i = 0; $i < sizeof($matches[0]); $i++) {
        $content = $this->content_replace($content, $matches[0][$i], strtolower($matches[1][$i]), $matches[2][$i]);
    }

    return $content;
  }

  private function content_replace($content, $old, $tag, $new) {
      switch ($tag) {
          case 'quote':
              $new = '<blockquote>' . $new . '</blockquote>';
              break;

          default:
              $new = '<div class="' . $tag . '">' . $new . '</div>';
      }
      return str_replace($old, $new, $content);
  }
}
