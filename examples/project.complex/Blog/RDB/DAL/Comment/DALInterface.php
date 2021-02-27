<?php

namespace Blog\RDB\DAL\Comment;



interface DALInterface
{
    /**
     * @param int $postID
     * @return string
     */
    public function countByPost($postID);

    /**
     * @param int $authorID
     * @param string $createAt
     * @return array
     */
    public function getStatByAuthor($authorID, $createAt);
}