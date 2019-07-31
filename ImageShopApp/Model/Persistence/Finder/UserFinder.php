<?php


namespace ImageShopApp\Model\Persistence\Finder;


use ImageShopApp\Model\DomainObject\AbstractUser;
use ImageShopApp\Model\DomainObject\NullUser;
use ImageShopApp\Model\DomainObject\User;
use PDO;

class UserFinder extends AbstractFinder
{
    public function findUserByEmail(string $email) : AbstractUser
    {
        $sql = "SELECT * FROM user WHERE email=:email";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue('email', $email, PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return new NullUser;
        }
        return $this->translateToUser($row);
    }

    private function translateToUser(array $row) : User
    {
        return new User($row['name'], $row['email'], $row['passwd'], $row['id']);
    }
}