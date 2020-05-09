<?php
if ($errors['email'] != 'Please fill This field' && $data['email'] != '') {
    if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Invalid E-mail';
}
?>
<div>
    <form action="/contact" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input value="<?php  if(isset($errors['email'])) echo $data['email'];  ?>" name="email" type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <div class="invalid-feedback">
                <?php echo $errors['email'] ?? '' ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">First Name</label>
            <input value="<?php  if(isset($errors['email'])) echo $data['firstName'];  ?>" name="firstName" type="text" class="form-control <?php echo isset($errors['firstName']) ? 'is-invalid' : '' ?>" id="exampleInputPassword1">
            <div class="invalid-feedback">
                <?php echo $errors['firstName'] ?? '' ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Last Name</label>
            <input value="<?php  if(isset($errors['email'])) echo $data['lastName'];  ?>" name="lastName" type="text" class="form-control <?php echo isset($errors['lastName']) ? 'is-invalid' : '' ?>" id="exampleInputPassword1">
            <div class="invalid-feedback">
                <?php echo $errors['lastName'] ?? '' ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Message</label>
            <input value="<?php  if(isset($errors['email'])) echo $data['message'];  ?>" name="message" type="text" class="form-control <?php echo isset($errors['message']) ? 'is-invalid' : '' ?>" id="exampleInputPassword1">
            <div class="invalid-feedback">
                <?php echo $errors['message'] ?? '' ?>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>