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
        if (!$rows) {
            return [];
        }
        $products = $this->translateToProductsArray($rows);
        return $products;
    }

    public function findProductById(int $id) : ?Product
    {
        $sql = "SELECT * FROM product WHERE id=:id";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue("id", $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        return $this->translateToProduct($row);
    }

    private function translateToProduct(array $row) : Product
    {
        $row['capture_date'] = new \DateTime($row['capture_date']);
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