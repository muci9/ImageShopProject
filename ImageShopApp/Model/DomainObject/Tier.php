<?php


namespace ImageShopApp\Model\DomainObject;


class Tier
{
    private $id;
    private $productID;
    private $size;
    private $price;
    private $pathWithWatermark;
    private $pathWithoutWatermark;

    /**
     * Tier constructor.
     * @param $productID
     * @param $size
     * @param $price
     * @param $pathWithWatermark
     * @param $pathWithoutWatermark
     */
    public function __construct(string $size, float $price, string $pathWithWatermark, string $pathWithoutWatermark, int $productID = null)
    {
        $this->productID = $productID;
        $this->size = $size;
        $this->price = $price;
        $this->pathWithWatermark = $pathWithWatermark;
        $this->pathWithoutWatermark = $pathWithoutWatermark;
    }

    /**
     * @return mixed
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getProductID() : int
    {
        return $this->productID;
    }

    /**
     * @return mixed
     */
    public function getSize() : string
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getPrice() : float
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getPathWithWatermark() : string
    {
        return $this->pathWithWatermark;
    }

    /**
     * @return mixed
     */
    public function getPathWithoutWatermark() : string
    {
        return $this->pathWithoutWatermark;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }




}