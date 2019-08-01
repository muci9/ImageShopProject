<?php


namespace ImageShopApp\Model\Persistence\Mapper;

use ImageShopApp\Model\DomainObject\ProductTag;
use PDO;

class ProductTagMapper extends AbstractMapper
{
    public function save(ProductTag $productTag)
    {
        if ($productTag->getId() === null) {
            $this->insert($productTag);
            $productTag->setId($this->getPdo()->lastInsertId());
            return;
        }
        //$this->update($productTag);
    }

    private function translateToArray(ProductTag $productTag) : array
    {
        $row = [
            'product_id' => $productTag->getProductId(),
            'tag_id' => $productTag->getTagId(),
            'id' => $productTag->getId()
        ];
        return $row;
    }

    private function insert(ProductTag $productTag)
    {
        $row = $this->translateToArray($productTag);
        $sql = "INSERT INTO product_tag (product_id, tag_id) VALUES (:product_id, :tag_id)";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue("product_id", $row['product_id']);
        $statement->bindValue("tag_id", $row['tag_id']);
        $statement->execute();
    }
}