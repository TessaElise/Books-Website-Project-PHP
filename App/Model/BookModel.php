<?php

declare(strict_types=1);

namespace App\Model;

class BookModel extends BaseModel
{

    public function getAllBooks() : array
    {
        $query = "select
                    books.id,
                    books.title,
                    books.isbn,
                    books.price,
                    authors.name as authorName
                  from 
                    books
                    left join authors on (authors.id = books.author_id)";

        $statement = $this->getConnection()->prepare($query);
        $statement->execute();

        $books = $statement->fetchAll();
        return $books;
    }
    public function getBook(int $id) : ?array
    {
        $query = "select
                    books.*,
                    authors.name as authorName,
                    publishers.name as publisherName
                    
                  from
                    books
                    left join authors on (authors.id = books.author_id)
                    left join publishers on (publishers.id = books.publisher_id)
                  where 
                    books.id = :bookId";

        $parameters = [
            'bookId' => $id
        ];

        $statement = $this->getConnection()->prepare($query);
        $statement->execute($parameters);

        if ($statement->rowCount() > 0) {
            return $statement->fetch();
        }
        return null;
    }

    public function createBook(array $book) : int
    {
        $query = "insert
                  into
                    books
                    (
                    title,
                    subtitle,
                    isbn,
                    author_id,
                    publisher_id,
                    description,
                    price,
                    pages,
                    image                    
                    )
                  values (
                    :title,
                    :subtitle,
                    :isbn,
                    :author_id,
                    :publisher_id,
                    :description,
                    :price,
                    :pages,
                    :image   
                    )";

        $parameters = [
            'title' => $book['title'],
            'subtitle' => $book['subtitle'],
            'isbn' => $book['isbn'],
            'author_id' => $book['author_id'],
            'publisher_id' => $book['publisher_id'],
            'description' => $book['description'],
            'price' => $book['price'],
            'pages' => $book['pages'],
            'image' => $book['image']
        ];

        $statement = $this->getConnection()->prepare($query);
        $statement->execute($parameters);

        return (int) $this->getConnection()->lastInsertId();
    }

    public function updateBook(int $id, array $book) : void
    {
        $query = "update
                    books
                     set
                      title = :title,
                      subtitle = :subtitle,
                      isbn = :isbn,
                      author_id = :author_id,
                      publisher_id = :publisher_id,
                      description = :description,
                      price = :price, 
                      pages = :pages, 
                      image = :image
                  where
                    id = :id
                  ";

        $parameters = [
            'id' => $id,
            'title' => $book['title'],
            'subtitle' => $book['subtitle'],
            'isbn' => $book['isbn'],
            'author_id' => $book['author_id'],
            'publisher_id' => $book['publisher_id'],
            'description' => $book['description'],
            'price' => $book['price'],
            'pages' => $book['pages'],
            'image' => $book['image']
        ];

        $statement = $this->getConnection()->prepare($query);
        $statement->execute($parameters);
    }

    public function deleteBook(int $id) : void
    {
        $query = "delete from books where id = :id";

        $parameters = [
                'id' => $id
        ];
        $statement = $this->getConnection()->prepare($query);
        $statement->execute($parameters);

    }
}

