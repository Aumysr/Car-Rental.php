<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
<div style="height: 100px; text-align: center;">
    <div style="font-size: 1.5rem; font-weight: 600; padding-top: 27px;">
        Welcome a newbie to My Rent Buddy
    </div>
</div>
<h1>Register</h1>
<form method="post" action="./actions.php?act=register">
    <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" name="firstName" placeholder="First name">
    </div>
    <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lastName" placeholder="Last name">
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" placeholder="Phone">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="mb-3">
        <label class="form-label">Type: Admin (1) or Renter (2)</label>
        <input type="text" class="form-control" name="levelId" placeholder="('1' for Admin '2' for Renter )">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm password">
    </div>
    
    <input type="submit" class="btn btn-primary" name="submit" value="Register" />
</form>
</body>
</html>