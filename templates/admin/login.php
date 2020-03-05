<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/toastify.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body>

<div class="container">
    <div class="dash">
        <h3>Login</h3>
        <?php if ($params['wrong']) { ?>
            <p style="text-align: center; margin-bottom: 5px; color: red">Invalid name or password!</p>
        <?php } ?>
        <form action="/admin/login" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input required type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input required type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" id="loginAdmin">Log In!</button>
        </form>
    </div>
</div>


<script src="/assets/js/jquery-3.4.1.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/toastify.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/admin.js"></script>
</body>



</body>
</html>
