<?php

class HomeController
{
    public function index()
    {
        try {
            $collectionPost = Post::selectAll();

            var_dump($collectionPost);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
