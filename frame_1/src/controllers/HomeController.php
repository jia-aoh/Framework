<?php

class HomeController extends Controller {
    
    function index() {
        echo "Home page of HomeController";
    }
    
    function user($id) {
        $user = $this->model("User"); // 直接使用父類method 意思是 $user = new User()
        $user->getInfo($id);
        $this->view("User/main", ['user' => $user]); // 在views/Home/hello使用 [$user, $series]一個內可以->幾個
    }
    
}

?>
