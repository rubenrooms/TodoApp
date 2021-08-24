<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signuppage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</head>
<body>
    <div class="height-90 flex-c-c container">
        <div class="box-small ">
            <form class="m-auto" method="POST" action="">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" placeholder="First name" id="firstname" name="firstname">
                    </div>
                    <div class="col">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last name" id="lastname" name="lastname">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="username" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="password" id="password" name="password">
                    <small>already have an account? <a href="login.php">Login</a></small>
                </div>

                <button type="submit" class="btn btn-primary">Sign up</button>
            </form>
        </div>
    </div>
</body>
</html>