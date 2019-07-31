<?php


namespace ImageShopApp\Model\Persistence\Finder;
use PDO;

class AbstractFinder
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