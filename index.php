<?php 

    include_once "./connection.php";
    $object = new Connection();
    $connection = $object->Connect();

    $query = "SELECT id, note, note_description FROM tb_persona";
    $result = $connection->prepare($query);
    $result->execute();
    $data=$result->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>CRUD</title>
</head>
<body>
    <nav>
        <div class="container">
            <a href="#" class="brand-logo">APP CRUD</a>
        </div>
    </nav>

    <br>

    <div class="container">
        <a data-target="modal1" id="new" class="waves-effect waves-light btn modal-tigger" href="#modal1">New note <i class="material-icons right">add</i> </a>
        
        <br>
        <br>

        <table id="tableNotes" class="centered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Note</th>
                    <th>Description</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($data as $note){
                ?>
                <tr>
                    <td><?php echo $note ['id']?></td>
                    <td><?php echo $note ['note']?></td>
                    <td><?php echo $note ['note_description']?></td>
                    <td></td>
                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal" id="modal1">
        <div class="modal-content">
            <div class="container">
                <form action="">
                    <input type="text" id="noteName">
                    <input type="text" id="noteDescription">

                    <br>
                    <br>

                    <button class="btn modal-close waves-effect waves-light" type="submit" name="action">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="main.js"></script>
</body>
</html>