<?php


namespace ImageShopApp\Model\DomainObject;


class Tag
{
    private $id;
    private $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getTagName() : string
    {
        return $this->name;
    }
}