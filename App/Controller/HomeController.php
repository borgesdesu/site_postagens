<?php

class HomeController
{
    public function index()
    {
        try {
            $collectionPost = Post::selectAll();

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');

            $parameters = array();
            $parameters['postagens'] = $collectionPost;

            $content = $template->render($parameters);
            echo $content;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
