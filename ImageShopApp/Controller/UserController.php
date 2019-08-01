<?php


namespace ImageShopApp\Controller;


use ImageShopApp\Model\DomainObject\User;
use ImageShopApp\Model\Persistence\Finder\UserFinder;
use ImageShopApp\Model\Persistence\PersistenceFactory;
use ImageShopApp\Model\DomainObject\NullUser;
use ImageShopApp\View\Renderers\LoginFormRenderer;
use ImageShopApp\View\Renderers\RegisterFormRenderer;

class UserController
{
    public function show()
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

    public function login()
    {
        $renderer = new LoginFormRenderer();
        $renderer->render();
    }

    public function verifyLogin()
    {
        $userFinder = PersistenceFactory::createFinder("user");
        /**
         * @var UserFinder $userFinder
         */
        $email = $_POST['email'];
        //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password = $_POST['password'];
        $user = $userFinder->findUserByLogin($email, $password);
        if (get_class($user) === NullUser::class) {
            echo "Not found";
            die;
        }
        $_SESSION['user'] = $user->getId();
        echo "Logged in.";
    }

    public function register()
    {
        $renderer = new RegisterFormRenderer();
        $renderer->render();
    }

    public function verifyRegister()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userFinder = PersistenceFactory::createFinder("user");
        /**
         * @var UserFinder $userFinder
         */
        $user = $userFinder->findUserByEmail($email);
        if (get_class($user) !== NullUser::class) {
            echo "User already exists.";
            die;
        }
        echo "New user";
    }
}