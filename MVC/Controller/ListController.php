<?php
/**
 * Created by PhpStorm.
 * User: quanghoa
 * Date: 6/4/19
 * Time: 6:32 PM
 */
include_once("../Model/User.php");
class ListController
{
    public function invoke(){
        if(isset($_GET["user_id"])){
            $user = new User();
            $detail = $user->getDetail($_GET["user_id"]);
            include_once("../View/detail_user.html");
        }else{
            $user =  new User();
            $list = $user->getAllUser();
            include_once("../View/list_user.html");
        }
    }
}

$ctr = new ListController();
$ctr->invoke();