<?php

declare(strict_types=1);

namespace App\Model;

class PublisherModel extends BaseModel
{

    public function getAllPublishers(): array
    {
        $query = "select
                    id,
                    name
                  from 
                    publishers";

        $statement = $this->getConnection()->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }
}
