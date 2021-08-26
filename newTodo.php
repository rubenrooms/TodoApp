<?php
include_once(__DIR__ . "/classes/Db.php");
include_once(__DIR__ . "/classes/List.php");
include_once(__DIR__ . "/classes/Todo.php");

session_start();
if(isset($_SESSION["username"])){
    echo "welcome " . $_SESSION["username"];
}else{
    echo "not logged in";
    header("Location: login.php");
}

        $list = new TodoList();

        try{
            $lists = $list->getAllTodoLists();
        } catch (Throwable $th){
            $error = $th->getMessage();
        }
        

        if (!empty($_POST)) {
            $todo = new Todo();
            $todo->setTitle($_POST['todoName']);
            $todo->setDescription($_POST['todoDescription']);
            $todo->setHoursneeded($_POST['todoHours']);
            $todo->setDeadline($_POST['todoDeadline']);
            $todo->setUser_id($_SESSION['id']);
            $todo->setList_id($_POST['listDropdown']);
            $todo->saveTodo();
            var_dump($_POST['todoName']);
            var_dump($_POST['todoDescription']);
            var_dump($_POST['todoHours']);
            var_dump($_POST['todoDeadline']);
            var_dump($_SESSION['id']);
            var_dump($_POST['listDropdown']);

        }


        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <title>Add Todo</title>
</head>
<body class="p-3">
    <header>
        <nav>
            <a href="logout.php">Log out</a>
        </nav>
    </header>
    <h2>Add new Todo to </h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Title of the Todo</label>
            <input type="name" class="form-control" placeholder="Title of the new Todo" id="todoName" name="todoName">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Description</label>
            <input type="text" class="form-control" placeholder="Description of the Todo" id="todoDescription" name="todoDescription">
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Amount of hours you need to complete the Todo</label>
            <input type="number" class="form-control" placeholder="Amount of hours you will spend" id="todoHours" name="todoHours">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Deadline</label>
            <input type="date" class="form-control" placeholder="deadline" id="todoDeadline" name="todoDeadline">
        </div>
        <div>
            <label for="List" class="form-label">Choose your todolist</label>
            <br>
            <select class="mb-3 btn border dropdown-toggle" name="listDropdown" id="dropdown">
                <?php foreach ($lists as $l): ?>
                    <option value="<?php echo $l['id'] ?>"><?php echo $l['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Add new Todo</button>
        </div>
    </form>
</body>
</html>