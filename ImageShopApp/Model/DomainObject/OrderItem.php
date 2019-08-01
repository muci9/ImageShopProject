<?php


namespace ImageShopApp\Model\DomainObject;


class OrderItem
{
    private $id;
    private $userID;
    private $tierID;
    private $createdAt;

    function __construct(int $userID, int $tierID, \DateTime $createdAt, int $id = null)
    {
        $this->id = $id;
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}