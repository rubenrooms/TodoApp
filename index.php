<?php
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/List.php");

    session_start();
    if(isset($_SESSION["username"])){
        echo "welcome " . $_SESSION["username"];
    }else{
        echo "not logged in";
        header("Location: login.php");
    }

        if (!empty($_POST)) {
            $list = new TodoList();
            $list->setName($_POST['listname']);
            $list->setUser_id($_SESSION['id']);
            $list->save();
        }
    
    $list = new TodoList();

    try{
        $lists = $list->getAllTodoLists();
    } catch (Throwable $th){
        $error = $th->getMessage();
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</head>
<body class="p-3">
    <header>
        <nav>
            <a href="logout.php">Log out</a>
        </nav>
    </header>
    <h1>Todolists</h1>
    <a href="newTodo.php"><button class="mb-3 btn btn-warning">Add new todo</button> </a> 
    <form action="" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name of the list</label>
            <input type="name" class="form-control" placeholder="Name of the new list" id="listname" name="listname">
        </div>
        <div>
            <button class="btn btn-primary">Add new list</button>
        </div>
    </form>
    <?php foreach ($lists as $l): ?>
    <section id="Todolists">
        <a href="#" onclick="window.location='listpage.php?list=<?php echo $l['id']?>'"><div>
            <h4><?php echo $l['name'] ?></h4>
            
            <form action="" method="POST">
                <input id="delete" class="btn btn-secondary" type="submit" data-listid="<?php echo $l['id']?>" value="Delete" name="delete">
            </form>

        </div></a>

    </section>
    <?php endforeach; ?>

    <script src="./javascript/list.js"></script>
</body>
</html>



