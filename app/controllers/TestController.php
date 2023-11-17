<?php

class TestController extends BaseController
{
    public function index() {
        return $this->view(viewPath: "base.demo");
    }
}