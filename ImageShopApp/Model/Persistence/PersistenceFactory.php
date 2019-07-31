<?php


namespace ImageShopApp\Model\Persistence;
use ImageShopApp\Model\Persistence\Finder\AbstractFinder;
use ImageShopApp\Model\Persistence\Finder\ProductFinder;
use PDO;

class PersistenceFactory
{
    private static $mappers = [];
    private static $finders = [];
    private static $pdo;

    private static function createPdo()
    {
        if (self::$pdo === null) {
            global $config;
            self::$pdo = new PDO($config['dsn'], $config['user'], $config['password']);
        }
        return self::$pdo;
    }

    public static function createFinder(string $entityClass) : AbstractFinder
    {
        $finderClass = self::getFinderClassName($entityClass);
        if (!isset(self::$finders[$finderClass])) {
            self::$finders[$finderClass] = new $finderClass(self::createPdo());
        }
        return self::$finders[$finderClass];
    }

    private static function getFinderClassName(string $entityClass) : string
    {
        if ($entityClass === "Product")
            return ProductFinder::class;
        if ($entityClass === "User")
            return null;
    }
}