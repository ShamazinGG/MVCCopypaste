<?php
//namespace App\Controllers;
//use Core;
include 'App/Models/UserModel.php';
include 'Core/View.php';
//include 'App/Controllers/UserController.php';


class UserController
{
    public  $UserModel;
    public $View;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->View = new View();
    }

    public function MainAction()
    {
        $users = $this->UserModel->getUsers();
        $this->View->mainUsers($users);
    }

    public function CreateAction()
    {

        $user = [
            'id' => '',
            'login' => '',
            'name' => '',
            'surname' => '',
            'birthdate' => '',
            'email' => '',
            'address' => '',
        ];

        $errors = [
            'login' => '',
            'name' => '',
            'birthdate' => '',

        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = array_merge($user, $_POST);
            $isValid = $this->UserModel->validateUser($user, $errors);

            if ($isValid) {

                $user = $this->UserModel->createUser($_POST);
                header("Location: /user");
            }

        }
        $this->View->createUsers($user,$errors);

    }

    public function ViewAction()
    {
        $id = $this->UserModel->getId();
        $user = $this->UserModel->getUserById($id);
        $this->View->showUsers($user);
    }

    public function UpdateAction()
    {
        $id = $this->UserModel->getId();
        $user = $this->UserModel->getUserById($id);
        $errors = [
            "login" => "",
            "name" => "",
            "birthdate" => ""
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = array_merge($user, $_POST);

            $isValid = $this->UserModel->validateUser($user, $errors);
            if ($isValid) {
                $user = $this->UserModel->updateUser($_POST,$id);
                //$user = $this->UserModel->updateUser($_POST, $user);
                header("Location: /user");
            }

        }
        $this->View->updateUsers($user, $errors);
    }

    public function DeleteAction()
    {
        $id = $this->UserModel->getId();
        $this->UserModel->deleteUser($id);
        $this->View->deleteUsers();


    }


}

