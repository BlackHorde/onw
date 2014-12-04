<?php

namespace BDHLab\Onwebed\Blocks;

class Image {
    private $block;
    public function __construct ($block, $page_content) {
        $this->block = $block;
        return "<img src='".$this->block->url."'>";
    }
}