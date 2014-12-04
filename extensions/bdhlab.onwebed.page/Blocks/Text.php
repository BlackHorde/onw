<?php

namespace BDHLab\Onwebed\Blocks;

class Text {
    public function __construct ($block, $page_content) {
        $this->block = $block;
        $this->page_content = $page_content;
    }
    public function __toString () {
        return (isset($this->block->content) ? $this->block->content : null);
    }
}

