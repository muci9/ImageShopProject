<?php


namespace ImageShopApp\Controller;


use ImageShopApp\Model\Persistence\Finder\UserFinder;
use ImageShopApp\Model\Persistence\PersistenceFactory;

class UserController
{
    public static function showUser()
    {
        $userFinder = PersistenceFactory::createFinder('User');
        /**
         * @var UserFinder $userFinder
         */
        $user = $userFinder->findUserByEmail('b');
        if (!$user) {
            echo "User not found";
            die;
        }
        echo $user->getName();
        die;
    }
}