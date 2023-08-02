<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div style="height: 100px; text-align: center;">
            <div style="font-size: 1.5rem; font-weight: 600; padding-top: 27px;">
                My Rent Buddy
            </div>
        </div>
        <h1>Login</h1>
        <form method="post" action="./actions.php?act=login">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div style="display: flex; gap: 0 50px;">
               
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>

    </div>
</body>

</html>