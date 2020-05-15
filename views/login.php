<?php
$errorMessage = $errorMessage ?? false;
$data = $data ?? [];
?>

<?php if(!isset($_SESSION['currentUser'])): ?>
<div class="container">
    <form action="/login" method="post">
        <?php
         if ($this->request->requestMethod === 'GET') {
             $data = $this->request->getBody();
         }
         if (isset($data['register'])) {
            echo '<div class="alert alert-success">';
            echo 'You have been succesfully registered. Please log in';
            echo '</div>';
         }
        ?>
        <?php
        if($errorMessage) {
            echo '<div class="alert alert-danger">';
            echo $errorMessage;
            echo '</div>';
        }
        ?>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input value="<?php
            if(isset($errorMessage) and isset($data['userEmail'])){
                echo $data['userEmail'];
            } ?>" name="userEmail" type="email" class="form-control">
            <div class="invalid-feedback"></div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control">
            <div class="invalid-feedback"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php endif?>
<?php  if (isset($_SESSION['currentUser'])) header("Location:/");?>

