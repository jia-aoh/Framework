<?php

class SeriesController extends Controller {
    
    function index() {
        echo "Home page of SeriesController";
    }
    
    function series() {
        $series = $this->model("Series"); // 直接使用父類method 意思是 $user = new User()
        $series->getInfo();
        $this->view("Series/main", ['series' => $series]); // 在views/Home/hello使用 [$user, $series]一個內可以->幾個
    }
    
}

?>
