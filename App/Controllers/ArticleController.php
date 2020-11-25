<?php
//namespace App\Controllers;
//use Core;
include 'App/Models/ArticleModel.php';
include 'Core/View.php';
//include 'App/Controllers/UserController.php';


class ArticleController
{
    public  $ArticleModel;
    public $View;

    public function __construct()
    {
        $this->ArticleModel = new ArticleModel();
        $this->View = new View();
    }

    public function MainAction()
    {
        $articles = $this->ArticleModel->getArticles();
        $this->View->mainArticles($articles);
    }

    public function CreateAction()
    {

        $article = [
            'id' => '',
            'title' => '',
            'body' => '',
            'date' => '',
            'author' => '',

        ];

        $errors = [
            'title' => '',
            'body' => '',
            'date' => '',
            'author' => '',

        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $article = array_merge($article, $_POST);
            $isValid = $this->ArticleModel->validateArticle($article, $errors);
            if ($isValid) {
                $article = $this->ArticleModel->createArticle($_POST);
                header("Location: /article");
            }
        }
        $this->View->createArticles($article,$errors);

    }

    public function ViewAction()
    {
        $id = $this->ArticleModel->getId();
        $article = $this->ArticleModel->getArticleById($id);
        $this->View->showArticles($article);
    }

    public function UpdateAction()
    {
        $id = $this->ArticleModel->getId();
        $article = $this->ArticleModel->getArticleById($id);
        $errors = [
            "title" => "",
            "body" => "",
            "author" => ""
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = array_merge($article, $_POST);

            $isValid = $this->ArticleModel->validateArticle($article, $errors);
            if ($isValid) {
                $article = $this->ArticleModel->updateArticle($_POST,$id);
                header("Location: /article");
            }

        }
        $this->View->updateArticles($article, $errors);
    }

    public function DeleteAction()
    {
        $id = $this->ArticleModel->getId();
        $this->ArticleModel->deleteArticle($id);
        $this->View->deleteArticles() ;


    }


}