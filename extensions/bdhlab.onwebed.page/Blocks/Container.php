<?php

namespace BDHLab\Onwebed\Blocks;

class Container {
    public function __construct ($block, $page_content) {
        $this->block = $block;
        $this->page_content = $page_content;
    }
    public function __toString () {
        /* See if it's a public container */
        if (isset($this->block->public)){
            return \BDHLab\Onwebed\Models\Container::get($this->block->name, $this->block->overwrite, $this->page_content);
        }

        $inner_html = null;
        if (!is_string($this->block->content)){
            foreach ($this->block->content as $item) {
                $inner_html .= $this->page_content->processBlock($item);
            }
        }else{
            $inner_html = $this->block->content;
        }
        return "<div class='block bdhlab-container".(isset($this->block->name) ? ' '.$this->block->name : null)." col-md-".$this->block->width."'>".(isset($this->block->name) ? "<!--".$this->block->name."-->" : null).$inner_html.(isset($this->block->name) ? "<!--".$this->block->name."_END-->" : null)."</div>";
    }
}