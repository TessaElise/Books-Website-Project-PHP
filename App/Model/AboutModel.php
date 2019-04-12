<?php

declare(strict_types=1);

namespace App\Model;

class AboutModel extends BaseModel
{
    private $about;

    public function __construct()
    {
        $this->about = [
            'voornaam' => 'Tessa',
            'achternaam' => 'Schel',
            'functie' => 'PHP Trainee',
            'interesses' => ['lezen', 'gamen', 'reizen', 'kunst'],
            'favorieteBookIds' => [1, 2]
        ];
    }

    public function getAllInfo(): array
    {
        return $this->about;
    }
}