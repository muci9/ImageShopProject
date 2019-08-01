<?php

namespace ImageShopApp\Model\Persistence\Mapper;

use ImageShopApp\Model\DomainObject\Product;
use PDO;

class ProductMapper extends AbstractMapper
{
    public function save(Product $product)
    {
        if ($product->getId() === null) {
            $this->insert($product);
            $product->setId($this->getPdo()->lastInsertId());
        }
        //$this->update($product);
    }

    private function translateToArray(Product $product) : array
    {
        $row = [
            'id' => $product->getId(),
            'title' => $product->getTitle(),
            'description' => $product->getDescription(),
            'camera_specs' => $product->getCameraSpecs(),
            'capture_date' => $product->getCaptureDate(),
            'thumbnail_path' => $product->getThumbnailPath(),
            'user_id' => $product->getUserID()
        ];
        return $row;
    }

    private function insert(Product $product)
    {
        $row = $this->translateToArray($product);
        $sql = "INSERT INTO product (title, description, camera_specs, capture_date, thumbnail_path, user_id)
                VALUES (:title, :description, :camera_specs, :capture_date, :thumbnail_path, :user_id";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue("title", $row['title']);
        $statement->bindValue("description", $row['description']);
        $statement->bindValue("camera_specs", $row['camera_specs']);
        $statement->bindValue("capture_date", $row['capture_date']);
        $statement->bindValue("thumbnail_path", $row['thumbnail_path']);
        $statement->bindValue("user_id", $row['user_id']);
        $statement->execute();
    }
}