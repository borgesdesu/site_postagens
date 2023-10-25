<?php

class PostController
{
    public function index($params)
    {
        try {
            $post = Post::selectById($params);

            $loader = new \Twig\Loader\FilesystemLoader('App/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('single.html');

            $parameters = array();
            $parameters['titulo'] = $post->titulo;
            $parameters['conteudo'] = $post->conteudo;
            $parameters['comentarios'] = $post->comentarios;

            $content = $template->render($parameters);
            echo $content;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
