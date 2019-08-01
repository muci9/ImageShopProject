<?php


namespace ImageShopApp\Model\Persistence\Mapper;

use PDO;

abstract class AbstractMapper
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    protected function getPdo() : PDO
    {
        return $this->pdo;
    }
}