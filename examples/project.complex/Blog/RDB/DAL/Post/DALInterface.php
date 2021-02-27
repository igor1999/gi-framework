<?php

namespace Blog\RDB\DAL\Post;



interface DALInterface
{
    /**
     * @param array $conditions
     * @return array[]
     */
    public function search(array $conditions = []);

    /**
     * @param int $authorID
     * @param string $createAt
     * @return array
     */
    public function getStatByAuthor($authorID, $createAt);
}