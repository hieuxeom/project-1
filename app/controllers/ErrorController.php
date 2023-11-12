<?php
    class ErrorController extends BaseController {
        public function index()
        {
            return $this->view('base.log', [
                "status" => "Oops!",
                "status_code" => "404",
                "message" => "",
                "url_back" => BASEPATH . "/home",
                "btn_title" =>  "Quay lại trang chủ",
            ]);
        }
    }
?>