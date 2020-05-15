<?php
$errors = $errors ?? false;
$data = $data ?? [];
$success = $success ?? true;
$head = false;
if ($data)
{
    if (!isset($errors['email'])) {
        if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid E-mail';
        }
    }
    if (!isset($errors['password']) and !isset($errors['confirmPassword'])) {
        if ($data['password'] != $data['confirmPassword']) {
            $errors['password']=$errors['confirmPassword'] = 'Passwords doesnt match';
        }
    }
}
if (!$errors) {
  if ($data) {
      $success = $this->database->register($data['firstName'],$data['lastName'],$data['email'],$data['password']);
      $head = $success;
  }
  if ($head) {
      header("Location:/login?register=yes");
  }
}
?>

<div class="container">
    <form action="/register" method="post">
        <?php if(!$success): ?>
        <div class="alert alert-danger">
            <?php echo "User with this email is already registered";?>
        </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="exampleInputPassword1">First Name</label>
            <input value="<?php  if($errors) echo $data['firstName'];  ?>" name="firstName" type="text" class="form-control  <?php echo isset($errors['firstName']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
                <?php echo $errors['firstName'] ?? '' ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input value="<?php  if($errors) echo $data['lastName'];  ?>" name="lastName" type="text" class="form-control <?php echo isset($errors['lastName']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
                <?php echo $errors['lastName'] ?? '' ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">E-mail</label>
            <input value="<?php  if($errors) echo $data['email'];  ?>" name="email" type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
                <?php echo $errors['email'] ?? '' ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
                <?php echo $errors['password'] ?? '' ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input name="confirmPassword" type="password" class="form-control <?php echo isset($errors['confirmPassword']) ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
                <?php echo $errors['password'] ?? '' ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>