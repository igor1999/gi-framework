<?php

namespace Blog\RDB\DAL\Post;

use Blog\ServiceLocator\ServiceLocatorIntegralTrait;

class DAL implements DALInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @param array $conditions
     * @return array[]
     * @throws \Exception
     */
    public function search(array $conditions = [])
    {
        $builder = $this->giGetSqlFactory()->createSQLBuilder()->setTemplate('
            SELECT {{post}}.*
            FROM {{post}}
            INNER JOIN {{user}}
                ON {{post.author_id}} = {{user.id}}
                AND %from%
                AND %till%
                AND %login%
                AND %title%
                AND %text%
            ORDER BY {{post.create_at}} DESC    
        ')->setPredicate('from', 'DATE({{post.create_at}}) >= :from')
            ->setPredicate('till', 'DATE({{post.create_at}}) <= :till')
            ->setPredicate('login', '{{user.login}} LIKE CONCAT(:login, \'%\')')
            ->setPredicate('title', '{{post.title}} LIKE CONCAT(\'%\', :title, \'%\')')
            ->setPredicate('text', '{{post.text}} LIKE CONCAT(\'%\', :text, \'%\')')
            ->setPredicateParams($conditions);

        return $this->blogGetRDBDriverFactory()->getMain()->fetchAll($builder->toString(), array_filter($conditions));
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
            FROM {{post}}
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