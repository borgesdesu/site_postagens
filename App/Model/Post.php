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
}
