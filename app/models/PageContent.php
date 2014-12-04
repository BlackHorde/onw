<?php

namespace BDHLab\Onwebed\Models;

class PageContent extends \Eloquent {
    private $content2 = null;
    public function page () {
        return $this->belongsTo('\BDHLab\Onwebed\Models\Page');
    }
    public function getContentCachedProcessed () {
        $content = null;
        $content_pieces = \BDHLab\Onwebed\Classes\String::multiexplode(array('[php', '[/php]'), $this->content_cached);
        foreach ($content_pieces as $content_piece) {
            if (substr($content_piece, 0, 1) == ']') {
                $content_piece = substr($content_piece, 1);
                $content_piece = eval($content_piece);
            }
            $content .= $content_piece;
        }
        return $content;
    }
    public function cache () {
        $this->content_cached = $this->render();
        $this->save();
    }
    public function render ($type = 'HTML') {
        $content = json_decode($this->content);
        return $this->processBlock($content);
    }
    public function processBlock ($block) {
        $class_name = '\\BDHLab\\Onwebed\\Blocks\\'.strtoupper(substr($block->type, 0, 1)).substr($block->type, 1);
        $class = new $class_name ($block, $this);
        return $class->__toString();
    }
}