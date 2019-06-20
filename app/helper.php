<?php
/**
 * Created by PhpStorm.
 * User: quanghoa
 * Date: 6/20/19
 * Time: 6:16 PM
 */
use Pusher\Pusher;
function sayHello(){
    return "hello world";
}

function sendMessage($broadcast,$event,$message){
    $options = array(
        'cluster' => env("PUSHER_APP_CLUSTER"),
        'useTLS' => true
    );
    $pusher = new Pusher(
        env("PUSHER_APP_KEY"),
        env("PUSHER_APP_SECRET"),
        env("PUSHER_APP_ID"),
        $options
    );
    $pusher->trigger($broadcast,$event, $message);
}