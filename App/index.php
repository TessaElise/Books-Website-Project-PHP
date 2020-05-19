
<?php

declare(strict_types=1);

use App\Controller\AboutController;
use \App\Controller\BookController;
use App\Controller\LoginController;
use App\Controller\PageNotFound;
use Dotenv\Dotenv;

require_once(__DIR__. '/../vendor/autoload.php');

session_start();

$dotenv = new Dotenv(__DIR__ . '/../');
$dotenv->load();

$route = $_GET['route'] ?? 'book-overview';
$method = $_SERVER['REQUEST_METHOD'];

if ($route == 'book-overview') {
    $bookController = new BookController();
    $bookController->showBooks();
} else if ($route == 'book') {
    $id = (int) $_GET['id'];
    $bookController = new BookController();
    $bookController ->showBook($id);
} else if ($route == 'new-book' && $method =='GET') {
    $BookController = new BookController();
    $BookController->newBook();
} else if ($route == 'new-book' && $method =='POST') {
    $bookFields = $_POST;
    $BookController = new BookController();
    $BookController->addBook($bookFields);
} else if ($route == 'edit-book' && $method == 'GET') {
    $id = (int) $_GET['id'];
    $BookController = new BookController();
    $BookController->editBook($id);
} else if ($route == 'edit-book' && $method == 'POST') {
    $id = (int)$_GET['id'];
    $bookFields = $_POST;
    $BookController = new BookController();
    $BookController->updateBook($id, $bookFields);
} else if ($route == 'delete-book' && $method == 'POST') {
    $id = (int)$_GET['id'];
    $BookController = new BookController();
    $BookController->deleteBook ($id);
} else if ($route == 'about') {
    $aboutController = new AboutController();
    $aboutController->showInfo();
} else if ($route == 'login' && $method == 'GET') {
    $loginController = new LoginController();
    $loginController->showLogin();
} else if ($route == 'login' && $method == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $loginController = new LoginController();
    $loginController->login($username, $password);
} else if ($route == 'logout') {
    $loginController = new LoginController();
    $loginController->logout();
} else {
    $PageNotFound = new PageNotFound();
    $PageNotFound->notFound();
}
