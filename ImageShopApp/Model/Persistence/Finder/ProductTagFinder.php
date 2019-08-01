<?php


namespace ImageShopApp\Model\Persistence\Finder;

use ImageShopApp\Model\DomainObject\ProductTag;
use PDO;

class ProductTagFinder extends AbstractFinder
{
    public function findAllByProductId(int $productId) : array
    {
        $sql = "SELECT * FROM product_tag WHERE product_id=:product_id";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue("product_id", $productId, PDO::PARAM_INT);
        $statement->execute();
        $rows = $statement->fetchAll();
        if (!$rows) {
            return [];
        }
        return $this->translateToProductTagsArray($rows);
    }

    public function findAllByTagId(int $tagId) : array
    {
        $sql = "SELECT * FROM product_tag WHERE tag_id=:tag_id";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue("tag_id", $tagId, PDO::PARAM_INT);
        $statement->execute();
        $rows = $statement->fetchAll();
        if (!$rows) {
            return [];
        }
        return $this->translateToProductTagsArray($rows);
    }

    private function translateToProductTag(array $row) : ProductTag
    {
        return new ProductTag($row['product_id'], $row['tag_id'], $row['id']);
    }

    public function translateToProductTagsArray(array $rows) : array
    {
        $productTags = [];
        foreach ($rows as $row) {
            $productTags[] = $this->translateToProductTag($row);
        }
        return $productTags;
    }
}