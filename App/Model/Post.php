<?php

class Post
{
    public static function selectAll()
    {
        $con = Connection::getConn();

        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $sql = $con->prepare($sql);
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
        $con = Connection::getConn();

        $sql = "SELECT * FROM postagem WHERE id = :id";
        $sql = $con->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $result = $sql->fetchObject('Post');

        if (!$result) {
            throw new Exception("Não foi encontrado nenhum registro no banco de dados");
        }

        return $result;
    }
}
