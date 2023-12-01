<?php

class VoucherController extends BaseController
{
    private $voucherModel;

    public function __construct()
    {
        $this->loadModel("VoucherModel");
        $this->voucherModel = new VoucherModel();
    }

    public function index() {

    }

}