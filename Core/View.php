<?php
class View
{
    public function index()
    {
        include 'App/Views/Main.php';
    }
    // users`s Views
    public function mainUsers($users)
    {
        include 'App/Views/User/main.php';
    }

    public function createUsers($user, $errors)
    {
        include 'App/Views/User/create.php';
    }

    public function showUsers($user)
    {
        include 'App/Views/User/view.php';
    }

    public function updateUsers($user, $errors)
    {
        include 'App/Views/User/update.php';
    }

    public function deleteUsers()
    {
        include 'App/Views/User/delete.php';
    }
    // Articles Views
    public function mainArticles($articles)
    {
        include 'App/Views/Article/mainView.php';
    }

    public function createArticles($article, $errors)
    {
        include 'App/Views/Article/createView.php';
    }

    public function showArticles($article)
    {
        include 'App/Views/Article/ShowView.php';
    }

    public function updateArticles($article, $errors)
    {
        include 'App/Views/Article/updateView.php';
    }

    public function deleteArticles()
    {
        include 'App/Views/Article/deleteView.php';
    }

}
