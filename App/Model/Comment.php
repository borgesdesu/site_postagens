<?php

class Comment
{
    public static function selectComments($idPost)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM comentario WHERE id_postagem = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':id', $idPost, PDO::PARAM_INT);
        $sql->execute();

        $result = array();

        while ($row = $sql->fetchObject('Comment')) {
            $result[] = $row;
        }

        return $result;
    }
}
