<?php


namespace ImageShopApp\Model\DomainObject;


class User extends AbstractUser
{
    private $id;
    private $name;
    private $email;
    private $password;

    /**
     * User constructor.
     * @param $id
     * @param $name
     * @param $email
     * @param $password
     */
    public function __construct(string $name, string $email, string $password, int $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}