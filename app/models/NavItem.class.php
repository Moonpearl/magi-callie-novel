<?php

class NavItem extends Model {
  const TABLE_NAME = 'nav_item';
  const MULTILINGUAL_COLUMNS = ['caption'];

  public $caption;
  public $icon;
  public $url;

  function full_url() {
    // global $router;
    // return $router->generate($this->url);
    return Path::url($this->url);
  }

  function matches_current_url() {
    return $this->url === Path::base_page(Path::current_url());
  }
}
