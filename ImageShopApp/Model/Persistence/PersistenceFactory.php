<?php


namespace ImageShopApp\Model\Persistence;
use ImageShopApp\Model\Persistence\Finder\AbstractFinder;
use ImageShopApp\Model\Persistence\Finder\ProductFinder;
use ImageShopApp\Model\Persistence\Finder\TagFinder;
use ImageShopApp\Model\Persistence\Finder\UserFinder;
use ImageShopApp\Model\Persistence\Mapper\AbstractMapper;
use ImageShopApp\Model\Persistence\Mapper\OrderItemMapper;
use ImageShopApp\Model\Persistence\Mapper\ProductMapper;
use ImageShopApp\Model\Persistence\Mapper\ProductTagMapper;
use ImageShopApp\Model\Persistence\Mapper\UserMapper;
use ImageShopApp\Model\Persistence\Finder\ProductTagFinder;
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

    public static function createMapper(string $entityClass): AbstractMapper
    {
        $mapperClass = self::getMapperClassName($entityClass);
        // we ensure we create a single mapper instance of this type per request
        if (!isset(self::$mappers[$mapperClass])) {
            self::$mappers[$mapperClass] = new $mapperClass(self::createPdo());
        }
        return self::$mappers[$mapperClass];
    }

    private static function getMapperClassName(string $entityClass) : string
    {
        $entityClass = mb_strtolower($entityClass);
        if ($entityClass === "product")
            return ProductMapper::class;
        if ($entityClass === "user")
            return UserMapper::class;
        if ($entityClass === "producttag")
            return ProductTagMapper::class;
        if ($entityClass === "orderitem")
            return OrderItemMapper::class;
        return null;
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
        $entityClass = mb_strtolower($entityClass);
        if ($entityClass === "product")
            return ProductFinder::class;
        if ($entityClass === "user")
            return UserFinder::class;
        if ($entityClass === "tag")
            return TagFinder::class;
        if ($entityClass === "producttag")
            return ProductTagFinder::class;
        //if ($entityClass === "orderitem")
        //  return OrderItemFinder::class;
        return null;
    }
}