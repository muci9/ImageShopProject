<?php


namespace ImageShopApp\Model\Persistence\Finder;

use ImageShopApp\Model\DomainObject\Product;
use PDO;

class ProductFinder extends AbstractFinder
{
    public function findAllProducts() : array
    {
        $sql = "SELECT * FROM product";
        $statement = $this->getPdo()->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll();
        $products = $this->translateToProductsArray($rows);
        return $products;
    }

    private function translateToProduct(array $row) : Product
    {
        return new Product($row['title'], $row['description'], $row['camera_specs'], $row['capture_date'], $row['thumbnail_path'], $row['user_id'], $row['id'], $row['tags']);
    }

    private function translateToProductsArray(array $resultRows) : array
    {
        $products = [];
        foreach ($resultRows as $row) {
            $row['tags'] = null;
            $product = $this->translateToProduct($row);
            $products[] = $product;
        }
        return $products;
    }
}