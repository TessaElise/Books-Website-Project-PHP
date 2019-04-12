<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\AboutModel;
use App\Model\BookModel;


class AboutController extends BaseController
{

    public function showInfo()
    {
        $aboutModel = new AboutModel();
        $about = $aboutModel->getAllInfo();

        $bookModel = new BookModel();
        $books = $bookModel->getAllBooks();

        $viewModel = [
            'pageTitle' => 'About',
            'about' => $about,
            'books' => $books
        ];

        $this->renderView('about', $viewModel);
    }

}
