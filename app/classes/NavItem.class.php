<?php

class NavItem {
    public $caption;
    public $icon;
    public $url;

    function __construct($caption, $icon, $url) {
        $this->caption = $caption;
        $this->icon = $icon;
        $this->url = $url;
    }

    function full_url() {
        return get_url($this->url);
    }

    function matches_current_url() {
        return $this->url === get_base_page(get_current_url());
    }
}
