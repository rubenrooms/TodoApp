<?php
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "classes/List.php");
include_once(__DIR__ . "/classes/Todo.php");

    session_start();
    if(isset($_SESSION["username"])){
        echo "welcome " . $_SESSION["username"];
    }else{
        echo "not logged in";
        header("Location: login.php");
    }

    if (!empty($_GET)) {
        $list = new TodoList();
        $list->setId($_GET["list"]);
        $currentList = $list->getListById();
        $list_id = $list->getId();
        $todo = new Todo();
        $todos = $todo->getAllTodosFromList($list_id);
        var_dump($todos);
    }

    /*try{
        $todos = $todo->getAllTodosFromList($list_id);
        //var_dump($todos);
    } catch (Throwable $th) {
        $error = $th->getMessage();
    }*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <title>Listpage</title>
</head>
<body class="p-3">
    <header>
        <nav>
            <a href="logout.php">Log out</a>
        </nav>
    </header>
    <h1>Todolist: <?php echo $currentList['name'] ?></h1>

    <?php foreach ($todos as $t): ?>
    <section id="Todos">    
        <a href="#" ><div>
            <h4><?php echo $t['title'] ?></h4>
            
            <form action="" method="POST">
                <input id="delete" class="btn btn-secondary" type="submit" data-listid="<?php echo $t['id']?>" value="Delete" name="delete">
            </form>

        </div></a>
    </section>
    <?php endforeach; ?>
    
</body>
</html>