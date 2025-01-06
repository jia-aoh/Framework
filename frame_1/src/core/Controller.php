<?php

class Controller {
    public function model($model) {
        require_once MVC_MODELS_DIR . "$model.php";
        return new $model ();
    }

    public function view($view, $data = Array()) {
        require_once MVC_VIEWS_DIR . "$view.php";
    }

}

?>