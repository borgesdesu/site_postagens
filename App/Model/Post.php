<?php

class Post
{
    public static function selectAll()
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $sql = $conn->prepare($sql);
        $sql->execute();

        $result = array();

        while ($row = $sql->fetchObject('Post')) {
            $result[] = $row;
        }

        if (!$result) {
            throw new Exception("Não foi encontrado nenhum registro no banco de dados");
        }

        return $result;
    }

    public static function selectById($idPost)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM postagem WHERE id = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $result = $sql->fetchObject('Post');

        if (!$result) {
            throw new Exception("Não foi encontrado nenhum registro no banco de dados");
        } else {
            $result->comentarios = Comment::selectComments($result->id);
        }

        return $result;
    }

    public static function insert($dataPost)
    {
        if (empty($dataPost['titulo']) or empty($dataPost['conteudo'])) {
            throw new Exception("Preencha todos os campos");

            return false;
        }

        $conn = Connection::getConn();

        $sql = $conn->prepare('INSERT INTO postagem (titulo, conteudo) VALUES (:tit, :cont)');
        $sql->bindValue(':tit', $dataPost['titulo']);
        $sql->bindValue(':cont', $dataPost['conteudo']);
        $result = $sql->execute();

        if ($result == 0) {
            throw new Exception("Falha ao inserir publicação");

            return false;
        }

        return true;
    }
}
