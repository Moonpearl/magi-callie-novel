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
}
