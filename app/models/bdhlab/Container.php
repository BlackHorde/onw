<?php

namespace BDHLab\Onwebed\Models;

class Container extends \Eloquent {
    protected $table = 'bdhlab_containers';

    public static function get ($name, $overwrite, $pageContent) {
        $container = Container::whereName($name)->first();
        /* Check if it needs caching */
        if (strlen(trim($container->content_cached)) == 0) {
            $_page_content = new PageContent;
            $container->content_cached = $_page_content->processBlock(json_decode($container->content));
            $container->save();
        }
        
        $patterns = array();
        $replacements = array();
        foreach ($overwrite as $item) {
            $patterns[] = '/<!--'.$item->name."-->.*"."<!--".$item->name.'_end-->/is';
            $replacements[] = '<!--'.$item->name.'-->'.((!is_string($item->content)) ? $pageContent->processBlock($item->content) : $item->content).'<!--'.$item->name.'_end-->';
        }
        return "<div class='block bdhlab-container ".$container->name." col-md-".$container->width."'><!--".$container->name."-->".self::process(preg_replace($patterns, $replacements, $container->content_cached))."<!--".$container->name."_end--></div>";
    }
    private static function process ($string) {
        $content = null;
        $content_pieces = \BDHLab\Onwebed\Classes\String::multiexplode(array('[php', '[/php]'), $string);
        foreach ($content_pieces as $content_piece) {
            if (substr($content_piece, 0, 1) == ']') {
                $content_piece = substr($content_piece, 1);
                $content_piece = eval($content_piece);
            }
            $content .= $content_piece;
        }
        return $content;
    }
}