<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyCostumFramework</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"
</head>
<body>
  <div class="wrapper">
    <!-- Navigation -->
    <nav class="main-nav">
      <ul>
        <li>
          <a href="/">Home</a>
        </li>
        <li>
          <a href="/about">About</a>
        </li>
        <li>
          <a href="/contact">Contact</a>
        </li>
          <?php
          if (!isset($_SESSION['currentUser'])) {
              echo '<li>';
              echo  '<a href="/login">Login</a>';
              echo '</li>';
          }
          else
          {
              echo '<li>';
              echo  '<a href="/logout">'.$_SESSION['currentUser'].' '.'Logout'.'</a>';
              echo '</li>';
          }
          ?>
          <?php
          if (!isset($_SESSION['currentUser'])) {
            echo  '<li>';
            echo  '<a href="/register">Register</a>';
            echo '</li>';
          }
          ?>
      </ul>
    </nav>
<?php echo $content; ?>
  
    <!-- Footer -->
    <footer>
      <p>All Rights Reserved &copy; 2018</p>
    </footer>

  </div>

</body>
</html>