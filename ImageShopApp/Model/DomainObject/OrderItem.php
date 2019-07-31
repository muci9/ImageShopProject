<?php


namespace ImageShopApp\Model\DomainObject;


class OrderItem
{
    private $userID;
    private $tierID;
    private $createdAt;

    function __construct(int $userID, int $tierID, \DateTime $createdAt)
    {
        $this->userID = $userID;
        $this->tierID = $tierID;
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUserID() : int
    {
        return $this->userID;
    }

    /**
     * @return mixed
     */
    public function getTierID() : int
    {
        return $this->tierID;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt() : \DateTime
    {
        return $this->createdAt;
    }
}