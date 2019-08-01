<?php


namespace ImageShopApp\Model\DomainObject;


class ProductTag
{
    private $id;
    private $productId;
    private $tagId;

    public function __construct(int $productId, int $tagId, int $id = null)
    {
        $this->productId = $productId;
        $this->tagId = $tagId;
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getTagId(): int
    {
        return $this->tagId;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}