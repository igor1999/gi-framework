<?php

namespace Blog\RDB\DAL\Comment;

use Blog\ServiceLocator\ServiceLocatorIntegralTrait;

class DAL implements DALInterface
{
    use ServiceLocatorIntegralTrait;

    /**
     * @param int $postID
     * @return string
     */
    public function countByPost($postID)
    {
        $sql = 'SELECT IFNULL(COUNT(*), 0) as {{cnt}} FROM {{comment}} WHERE {{post_id}} = :post_id';

        return $this->blogGetRDBDriverFactory()->getMain()->fetchValue($sql, ['post_id' => $postID]);
    }

    /**
     * @param int $authorID
     * @param string $createAt
     * @return array
     */
    public function getStatByAuthor($authorID, $createAt)
    {
        $sql = '
            SELECT DATE({{create_at}}) as {{date}}, COUNT(*) as {{cnt}} 
            FROM {{comment}}
            WHERE {{author_id}} = :author_id
                AND DATE_FORMAT({{create_at}}, \'%Y-%m\') = DATE_FORMAT(:create_at, \'%Y-%m\')
            GROUP BY {{date}}
            ORDER BY {{date}}
        ';

        return $this->blogGetRDBDriverFactory()->getMain()->fetchPair(
            $sql, ['author_id' => $authorID, 'create_at' => $createAt]
        );
    }
}