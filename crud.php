<?php
    include_once "connection.php";
    $object = new Connection();
    $connection = $object->Connect();

    $noteName = (isset($_POST['name'])) ? $_POST['name']:'';
    $noteDescription = (isset($_POST['description'])) ? $_POST['description']:'';
    $option = (isset($_POST['option'])) ? $_POST['option']:'';
    $id = (isset($_POST['id'])) ? $_POST['id']:'';

    switch($option)
    {
        case 1: 

            $query = "INSERT INTO tb_persona(note,note_description) VALUES('$noteName','$noteDescription')";
            $res = $connection->prepare($query);
            $res->execute();

            $query = "SELECT id, note, note_description FROM tb_persona ORDER BY id DESC LIMIT 1";
            $res = $connection->prepare($query);
            $res->execute();
            $date = $res->fetchALL(PDO::FETCH_ASSOC);

        break;

        case 2:
            
            $query = "UPDATE tb_persona SET note='$noteName', note_description='$noteDecription' WHERE id='$id'";
            $res = $connection->prepare($query);
            $res->execute();

            $query = "SELECT id, note, note_description FROM tb_persona WHERE id = '$id'";
            $res = $connection->prepare($query);
            $res->execute();
            $date = $res->fetchALL(PDO::FETCH_ASSOC);

        break;    

        case 3:

            $query = "SELECT id, note, note_description FROM tb_persona WHERE id = '$id'";
            $res = $connection->prepare($query);
            $res->execute();
            $date = $res->fetchALL(PDO::FETCH_ASSOC);

            $query = "DELETE FROM tb_persona WHERE id='$id'";
            $res = $connection->prepare($query);
            $res->execute();

        break;

    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);
    $connection = null;
    
?>