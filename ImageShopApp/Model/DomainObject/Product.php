<?php


namespace ImageShopApp\Model\DomainObject;


class Product
{
    private $id;
    private $userID;
    private $title;
    private $description;
    private $tags;
    private $cameraSpecs;
    private $captureDate;
    private $thumbnailPath;

    /**
     * Product constructor.
     * @param $title
     * @param $description
     * @param $cameraSpecs
     * @param $captureDate
     * @param $thumbnailPath
     * @param $userID
     * @param $id
     * @param $tags
     */
    public function __construct(string $title, string $description, string $cameraSpecs, \DateTime $captureDate, string $thumbnailPath, int $userID, int $id = null, array $tags = null)
    {
        $this->id = $id;
        $this->userID = $userID;
        $this->title = $title;
        $this->description = $description;
        $this->tags = $tags;
        $this->cameraSpecs = $cameraSpecs;
        $this->captureDate = $captureDate;
        $this->thumbnailPath = $thumbnailPath;
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
    public function getUserID() : int
    {
        return $this->userID;
    }

    /**
     * @return mixed
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getTags() : array
    {
        return $this->tags;
    }

    /**
     * @return mixed
     */
    public function getCameraSpecs() : string
    {
        return $this->cameraSpecs;
    }

    /**
     * @return mixed
     */
    public function getCaptureDate() : \DateTime
    {
        return $this->captureDate;
    }

    /**
     * @return mixed
     */
    public function getThumbnailPath() : string
    {
        return $this->thumbnailPath;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



}