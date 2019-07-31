<?php


namespace ImageShopApp\Controller;


use ImageShopApp\Model\DomainObject\User;
use ImageShopApp\Model\Persistence\Finder\UserFinder;
use ImageShopApp\Model\Persistence\PersistenceFactory;
use ImageShopApp\Model\DomainObject\NullUser;

class UserController
{
    public static function showUser()
    {
        $userFinder = PersistenceFactory::createFinder('User');
        /**
         * @var UserFinder $userFinder
         */
        $user = $userFinder->findUserByEmail('b');
        if (get_class($user) === NullUser::class) {
            echo "User not found";
            die;
        }
        /**
         * @var User $user
         */
        echo $user->getName();
        die;
    }
}