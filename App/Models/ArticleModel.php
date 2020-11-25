<?php
//namespace App\Models;

class ArticleModel
{
    function getArticles()
    {
        return json_decode(file_get_contents('jsons/articles.json'), true);

    }

    function getArticleById($id)
    {
        $articles = $this->getArticles();
        foreach ($articles as $article) {
            if ($article['id'] == $id) {
                return $article;
            }
        }
        return null;
    }

    function createArticle($data)
    {
        $articles = $this->getArticles();
        //$data['id'] = rand(1000000,2000000);
        $data['id'] = uniqid();
        $articles[] = $data;
        $this->putJson($articles);
        return $data;

    }

    function updateArticle($data, $id)
    {
        $articles = $this->getArticles();
        foreach ($articles as $i => $article) {
            if ($article['id'] == $id) {
                $articles[$i] = array_merge($article, $data);
            }
        }
        file_put_contents( 'jsons/articles.json', json_encode($articles), JSON_PRETTY_PRINT);
    }

    function deleteArticle($id)
    {
        $articles = $this->getArticles();

        foreach ($articles as $i => $article) {
            if ($article['id'] == $id) {

                array_splice($articles, $i, 1);
            }
        }

        $this->putJson($articles);

    }


    function putJson($articles)
    {
        file_put_contents( 'jsons/articles.json', json_encode($articles, JSON_PRETTY_PRINT));
    }

    function validateArticle($article, &$errors)
    {
        $isValid = true;

        //Начало валидации
        if (!$article['title']) {
            $isValid = false;
            $errors['title'] = 'Поле "Название статьи" обязательно';
        }
        if (!$article['body'] || strlen($article['body']) < 20 || strlen($article['body']) > 200) {
            $isValid = false;
            $errors['body'] = 'Поле "Тело статьи" обязательно и должно содержать от 20 до 200 символов ';
        }

        if (!$article['author']) {
            $isValid = false;
            $errors['author'] = 'Имя автора статьи обязательно';

        }
        // Конец валидации

        return $isValid;

    }

    public function getId()
    {
        $url = $_SERVER['REQUEST_URI'];
        $routeParts = explode('/', $url);
        $id = $routeParts[2];
        return $id;
    }

}