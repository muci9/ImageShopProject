<?php


namespace ImageShopApp\Model\Persistence\Finder;

use ImageShopApp\Model\DomainObject\OrderItem;
use PDO;

class OrderItemFinder extends AbstractFinder
{
    /*public function findByUserId(int $userId) : array
    {
        $sql = "SELECT * FROM order_item WHERE user_id=:user_id";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue("user_id", $userId);
        $statement->execute();
        $rows = $statement->fetchAll();
        if (!$rows)
            return [];
        return $this->translateToOrderItemsArray();
    }*/
}