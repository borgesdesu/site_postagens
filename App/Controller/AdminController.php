<?php

class AdminController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');

        $objPosts = Post::selectAll();

        $parameters = array();
        $parameters['postagens'] = $objPosts;

        $content = $template->render($parameters);
        echo $content;
    }

    public function create()
    {
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('create.html');

        $parameters = array();

        $content = $template->render($parameters);
        echo $content;
    }

    public function insert()
    {
        try {
            Post::insert($_POST);
            echo '<script>alert("Publicação inserida com sucesso!");</script>';
            echo '<script>location.href="http://localhost/project_crud/?page=admin&method=index"</script>';
        } catch (Exception $e) {
            echo '<script>alert("' . $e->getMessage() . '");</script>';
            echo '<script>location.href="http://localhost/project_crud/?page=admin&method=create"</script>';
        }
    }
}
