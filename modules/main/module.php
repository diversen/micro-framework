<?php

namespace modules\main;
use diversen\sendfile;
class module {
    
    public function indexAction () {
        echo "Default index";
    }
    
    public function helloAction () {
        echo "Hello action";
    }
    
    public function sendAction () {
        $s = new sendfile();
        $s->throttle(1.0, 10);
        echo __FILE__;
        $s->send(__FILE__);
        die();

    }   
}
