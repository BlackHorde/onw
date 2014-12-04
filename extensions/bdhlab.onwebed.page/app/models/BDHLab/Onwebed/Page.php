<?php

namespace BDHLab\Onwebed\Models;

class Page extends \Eloquent {
    public static $rules = array (
        'name' => 'required|between:1, 100'
    );
    public function pageContent () {
        return $this->hasOne('\BDHLab\Onwebed\Models\PageContent');
    }
}