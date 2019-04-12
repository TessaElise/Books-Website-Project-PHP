<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\AboutModel;
use App\Model\BookModel;
use App\Model\UserModel;


class LoginController extends BaseController
{

    public function showLogin()
    {
        $viewModel = [
            'pageTitle' => 'login'
        ];

        $this->renderView('login', $viewModel);
    }

    public function login(string $username, string $password)
    {
        $userModel = new UserModel();
        $user = $userModel->authenticate($username, $password);

        if ($user) {
            $_SESSION['profile'] = $user;
            header('Location: ./');
        } else {
            $this->addError('combination is incorrect');
            header ('Location: index.php?route=login');
        }

        print_r($user);
    }

    public static function getProfile() : ?array
    {
            return $_SESSION['profile'] ?? null;
    }

    public function logout()
    {
        unset($_SESSION['profile']);
        header('Location: ./');
    }
}
