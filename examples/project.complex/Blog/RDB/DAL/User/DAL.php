<?php

namespace Blog\RDB\DAL\User;

use GI\RDB\SQL\Constants;

use Blog\ServiceLocator\ServiceLocatorIntegralTrait;

class DAL implements DALInterface
{
    use ServiceLocatorIntegralTrait;


    /**
     * @param string $login
     * @param string $password
     * @return array
     */
    public function authenticate($login, $password)
    {
        $sql = '
            SELECT *
            FROM {{user}}
            WHERE {{login}} = :login
        ';

        try {
            $row = $this->blogGetRDBDriverFactory()->getMain()->fetch($sql, ['login' => $login]);

            $verified = $this->giGetPasswordVerifier()->verify($password, $row['password']);

            if (!$verified) {
                $row = [];
            }
        } catch (\Exception $e) {
            $row = [];
        }

        return $row;
    }

    /**
     * @param string $prefix
     * @return array[]
     */
    public function autocompleteLogin($prefix)
    {
        $sql = '
            SELECT {{id}}, {{login}}
            FROM {{user}}
            WHERE {{login}} LIKE CONCAT(:prefix, \'%\')
        ';

        $params = ['prefix' => $prefix];

        return $this->blogGetRDBDriverFactory()->getMain()->fetchAll($sql, $params);
    }

    /**
     * @param string $order
     * @param bool $direction
     * @return array[]
     * @throws \Exception
     */
    public function getStatisticTotal($order = '', $direction = true)
    {
        if (empty($order)) {
            $order = 'login';
        }

        try {
            $order = $this->blogGetRDBDriverFactory()->getMain()->getUser()
                ->getColumnList()->get($order)->getFullQualifiedName();
        } catch (\Exception $e) {}

        $directionString = $direction ? '' : Constants::ORDER_DESC_MODIFICATOR;

        $builder = $this->giGetSqlFactory()->createSQLBuilder()
            ->setTemplate($this->getStatisticTotalTemplate())
            ->setParam('order', $order)
            ->setParam('direction', $directionString);

        return $this->blogGetRDBDriverFactory()->getMain()->fetchAll($builder->toString());
    }

    /**
     * @return string
     */
    protected function getStatisticTotalTemplate()
    {
        return '
            SELECT {{user}}.*, 
                IFNULL({{posts.posts_total}}, 0) as {{postsTotal}}, 
                IFNULL({{comments.comments_total}}, 0) as {{commentsTotal}}, 
                IFNULL({{received_comments.received_comments_total}}, 0) as {{receivedCommentsTotal}}
            FROM {{user}}
            LEFT JOIN (
                SELECT {{author_id}}, COUNT(*) as {{posts_total}} FROM {{post}} GROUP BY {{author_id}}
            ) AS {{posts}}
                ON {{user.id}} = {{posts.author_id}}
            LEFT JOIN (
                SELECT {{author_id}}, COUNT(*) as {{comments_total}} 
                FROM {{comment}} GROUP BY {{author_id}}
            ) AS {{comments}}
                ON {{user.id}} = {{comments.author_id}}
            LEFT JOIN (
                SELECT {{post.author_id}}, COUNT(*) as {{received_comments_total}} 
                FROM {{post}}
                    INNER JOIN {{comment}} 
                    ON {{post.id}} = {{comment.post_id}}  
                GROUP BY {{post.author_id}}
            ) AS {{received_comments}}
                ON {{user.id}} = {{received_comments.author_id}}
            ORDER BY {{%order%}} %direction%
        ';
    }
}