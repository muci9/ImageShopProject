<?php


namespace ImageShopApp\Controller;


use ImageShopApp\Model\DomainObject\User;
use ImageShopApp\Model\Persistence\Finder\UserFinder;
use ImageShopApp\Model\Persistence\Mapper\UserMapper;
use ImageShopApp\Model\Persistence\PersistenceFactory;
use ImageShopApp\Model\DomainObject\NullUser;
use ImageShopApp\View\Renderers\HomepageRenderer;
use ImageShopApp\View\Renderers\LoginFormRenderer;
use ImageShopApp\View\Renderers\RegisterFormRenderer;

class UserController
{
    private $params = [];

    public function __construct(array $params)
    {
        $this->params = $params;
    }

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
        $password = $_POST['password'];
        $user = $userFinder->findUserByLogin($email, $password);
        if (get_class($user) === NullUser::class) {
            $renderer = new LoginFormRenderer();
            $renderer->render(["User not found."]);
        }
        session_start();
        $_SESSION['user'] = $user->getId();
        header("Location: /");
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
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $userFinder = PersistenceFactory::createFinder("user");
        /**
         * @var UserFinder $userFinder
         */
        $user = $userFinder->findUserByEmail($email);
        if (get_class($user) != NullUser::class) {
            header("Location: /user/show");
        }
        /**
         * @var UserMapper $userMapper
         */
        $userMapper = PersistenceFactory::createMapper("user");
        $userMapper->save(new User($name, $email, $password));
        header("Location: /");
    }

    public function logout()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header("Location: /");
    }
}