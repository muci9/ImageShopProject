<?php


namespace ImageShopApp\Model\Persistence\Mapper;

use ImageShopApp\Model\DomainObject\OrderItem;
use PDO;

class OrderItemMapper extends AbstractMapper
{
    public function save(OrderItem $orderItem)
    {
        if ($orderItem->getId() === null) {
            $this->insert($orderItem);
            $orderItem->setId($this->getPdo()->lastInsertId());
            return;
        }
        //$this->update($orderItem);
    }

    private function translateToArray(OrderItem $orderItem) : array
    {
        $row = [
            'id' => $orderItem->getId(),
            'created_at' => $orderItem->getCreatedAt(),
            'tier_id' => $orderItem->getTierID(),
            'user_id' => $orderItem->getUserID()
        ];
        return $row;
    }

    private function insert(OrderItem $orderItem)
    {
        $row = $this->translateToArray($orderItem);
        $sql = "INSERT INTO order_item (user_id, tier_id, created_at) VALUES (:user, :tier, :date)";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue("user", $row['user_id']);
        $statement->bindValue("tier", $row['tier_id']);
        $statement->bindValue("date", $row['created_at']);
        $statement->execute();
    }

}