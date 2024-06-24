<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        helper(['cookie']);
        $data['errMessage'] = "";
        if (!is_null(get_cookie('username'))) {
            return redirect()->to("/notes");
        }
        return view('login', $data);
    }

    public function check_login()
    {
        helper(['cookie']);
        if (!is_null(get_cookie('username'))) {
            return redirect()->to("/notes");
        }
        $username = $this->request->getPost('myusername');
        $password = $this->request->getPost('mypassword');
        $rememberMe = $this->request->getPost('rememberme');
        $model = new UserModel();

        $user = $model->where('username', $username)->where('password', $password)->first();
        if ($user) {

            $cookieExpiration = $rememberMe ? time() + 60 * 60 * 24 * 365 : 0;

            setcookie('username', $user['username'], $cookieExpiration, '/');

            setcookie('userid', $user['id'], $cookieExpiration, '/');
            if (!$rememberMe) {
                setcookie('password', '', time() - 3600, '/');
            }
            session()->set('username', $user['username']);

            return redirect()->to('/notes');
        } else {

            $data['errMessage'] = "Wrong Username or Password";
            return view('login', $data);
        }
    }
}
