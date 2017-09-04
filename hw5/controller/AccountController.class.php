<?php

class AccountController extends Controller
{
    public $view = 'account';
    public $title;

    function __construct() {
        parent::__construct();
        $this->title .= ' | Личный кабинет';
    }

    public function index() {

        $data = array();
        $user = new User();

        if ($user->verifyUser()) {
            $data['last_pages'] = json_decode($_COOKIE['last_urls'], TRUE);
        } else {
            $redirect = 'index.php';
            header('Location:'.$redirect);
        }

        return $data;
    }


}