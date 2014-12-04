<?php

namespace BDHLab\Onwebed\Blocks;

class Row {
    public function __construct ($block, $page_content) {
        $this->block = $block;
        $this->page_content = $page_content;
    }
    public function __toString () {
        $inner_html = null;
        foreach ($this->block->content as $item) {
            $inner_html .= $this->page_content->processBlock($item);
        }
        return "<div class='row'>".$inner_html."</div>";
    }
}