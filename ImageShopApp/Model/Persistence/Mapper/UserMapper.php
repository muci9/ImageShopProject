<?php


namespace ImageShopApp\Model\Persistence\Mapper;

use ImageShopApp\Model\DomainObject\User;

class UserMapper extends AbstractMapper
{
    public function save(User $user)
    {
        if ($user->getId() === null) {
            $this->insert($user);
            $user->setId($this->getPdo()->lastInsertId());
            return;
        }
        $this->update($user);
    }

    private function translateToArray(User $user) : array
    {
        $row = [
            'id'    => $user->getId(),
            'name'  => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ];
        return $row;
    }

    private function insert(User $user)
    {
        $row = $this->translateToArray($user);
        $sql = "INSERT INTO user (name, email, passwd) VALUES (:name, :email, :password)";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue("name", $row['name']);
        $statement->bindValue("email", $row['email']);
        $statement->bindValue("password", $row['password']);
        $statement->execute();
    }

    private function update(User $user)
    {
        $row = $this->translateToArray($user);
        $sql = "UPDATE user SET name=:name, email=:email, passwd=:password";
        $statement = $this->getPdo()->prepare($sql);
        $statement->bindValue('name', $row['name']);
        $statement->bindValue('email', $row['email']);
        $statement->bindValue('password', $row['password']);
        $statement->execute();
    }
}