<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\AuthorModel;
use App\Model\BookModel;
use App\Model\PublisherModel;

class BookController extends BaseController
{
    public function showBooks()
    {
        $bookModel = new BookModel();
        $books = $bookModel->getAllBooks();
        $viewModel = [
            'pageTitle' => 'Books',
            'books' => $books
        ];

        $this->renderView('book-overview', $viewModel);

    }

    public function showBook(int $bookId)
    {
        $bookModel = new BookModel();
        $book = $bookModel->getBook($bookId);

        if ($book) {
            $viewModel = [
                'pageTitle' => 'Book title',
                'book' => $book,
                'successMessage' => $_SESSION['message']
            ];
            $this->renderView('book', $viewModel);
        } else {
            $viewModel = [
                'pageTitle' => 'Page not found.',
            ];
            http_response_code(404);
            $this->renderView('page-not-found', $viewModel);
        }
    }

    public function newBook()
    {
        $authorModel = new AuthorModel();
        $authors = $authorModel->getAllAuthors();

        $publisherModel = new PublisherModel();
        $publishers = $publisherModel->getAllPublishers();

        $viewModel = [
            'pageTitle' => 'New Book',
            'authors' => $authors,
            'publishers' => $publishers,
        ];
        $this->renderview('new-book', $viewModel);
    }


    public function addBook(array $bookfields)
    {
        $errors = [];

        if (!isset($bookfields['title']) || !$bookfields['title']) {

            $errors[] = 'No title set';
        }

        if (!isset($bookfields['isbn']) || !$bookfields['isbn']) {

            $errors[] = 'No isbn set';
        }

        if (!isset($bookfields['pages']) || !$bookfields['pages']) {

            $errors[] = 'No pages set';
        }

        if (!isset($bookfields['price']) || !$bookfields['price']) {

            $errors[] = 'No price set';
        }

        if ($errors) {

            foreach ($errors as $error) {
                $this->addError($error);
            }
            header('Location: index.php?route=new-book');
        } else {
            $BookModel = new BookModel;
            $newBookId = $BookModel->createBook($bookfields);

            $this->addMessage('Book successfully created');
            header('Location: index.php?route=book&id=' . $newBookId);
        }
    }

    public function editBook(int $bookid)
    {
        $bookModel = new BookModel();
        $book = $bookModel->getBook($bookid);

        $authorModel = new AuthorModel();
        $authors = $authorModel->getAllAuthors();

        $publisherModel = new PublisherModel();
        $publishers = $publisherModel->getAllPublishers();

        $viewModel = [
            'pageTitle' => 'Edit Book',
            'book' => $book,
            'authors' => $authors,
            'publishers' => $publishers,
        ];
        $this->renderview('edit-book', $viewModel);
    }

    public function updateBook(int $id, array $bookFields)
    {
        $bookModel = new BookModel();
        $bookModel->updateBook($id, $bookFields);

        header('Location: index.php?route=book&id=' . $id);
    }

    public function deleteBook(int $id)
    {
        $bookModel = new BookModel();
        $bookModel->deleteBook($id);

        header('Location: index.php?route=book-overview');
    }

}
