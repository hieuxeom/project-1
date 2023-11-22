<?php

class AuthController extends BaseController
{
    private $authModel;

    public function __construct()
    {
        $this->loadModel("AuthModel");
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        return $this->view(viewPath: "auth.login");
    }

    public function login()
    {
        return $this->view(viewPath: "auth.login");
    }

    public function register()
    {
        return $this->view(viewPath: "auth.register");
    }
}