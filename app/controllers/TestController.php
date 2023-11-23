<?php

class TestController extends BaseController
{
    public function index() {
        return $this->view(viewPath: "base.demo");
    }

    public function url() {
        echo "Request params: ";
        print_r($_REQUEST);
        echo "<br>";
        echo "GET params: ";
        print_r($_GET);
        echo "<br>";
        echo "POST params: ";
        print_r($_POST);
    }
}