<?php
namespace SimoTod\Language;

class Language {
    protected $language;

    public function __construct($default) {
        $this->language = $default;
    }

    public function set($language) {
        $this->language = $language;
    }

    public function get() {
        return $this->language;
    }

    public function __toString() {
        return $this->get();
    }
}