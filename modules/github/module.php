<?php

namespace modules\github;

use diversen\githubapi;
use diversen\micro\conf;
use diversen\html;

class module {

    public function __construct() {}
    public function indexAction() {

        $access_config = array(
            'redirect_uri' => conf::get('github_callback_url'),
            'client_id' => conf::get('github_id'),
            'state' => md5(uniqid()),
            'scope' => conf::get('github_scope')
        );

        $api = new githubapi();
        $url = $api->getAccessUrl($access_config);
        echo "<a href=\"$url\">Github Login</a>";
        echo "index action from github module";
        
        $f = new html();
        $f->formStart();
        $f->legend('test');
        $f->text('test');
        $f->submit('test', 'test');
        $f->formEnd();
        
        echo $f->getStr();
    }

    public function callbackAction() {

        $access_config = array(
            'redirect_uri' => conf::get('github_callback_url'),
            'client_id' => conf::get('github_id'),
            'client_secret' => conf::get('github_secret'),
        );

        $api = new githubapi();
        $res = $api->setAccessToken($access_config);

        if ($res) {
            header("Location: /github/api");
        } else {
            echo "Could not get access token. Errors: <br />";
            echo html::getErrors($api->errors);
        }
    }

    public function apiAction() {
        // We have a access token and we can now call the api: 
        $api = new githubapi();

        // Simple call - get current users credentials
        // This can also be done without scope
        $command = "/user";
        $res = $api->apiCall($command, 'GET', null);
        if (!$res) {
            echo html::getErrors($api->errors);
        }

        print_r($res);
    }
}
