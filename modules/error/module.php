<?php

namespace modules\error;

class module {
    
    public function notFound () {               
        header("HTTP/1.0 404 Not Found");
        echo "Page was not found - Error!";
        
        lang::translate('this is a test');
    }
}