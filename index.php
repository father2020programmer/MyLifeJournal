<?php include "inc/header.php"; ?>

<div class="page">
  <div class="title">
    <h1>My Life Journal</h1>
    <p>Telling your story one post at a time!</p>
  </div>

  <div class="form-box">
  <div class="error-box">
      <?php
        if(isset($_GET['error'])){
          if($_GET['error'] == "emptyinput"){
            echo "<p>Please fill in all fields.</p>";
          } else if($_GET['error'] == "wronglogin"){
            echo "<p>Incorrect Login Information.</p>";
          } 
        }
      ?>
    </div>
    <h3 class="login-title">Log In</h3>
    <form class="login" action="inc/login.inc.php" method="POST">
        <label class="login-item" for="email">Email</label>
        <input class="login-item" type="email" name="email" placeholder="Email">
        <label class="login-item" for="pwd">Password</label>
        <input class="login-item" type="password" name="pwd" placeholder="Password">
      <button class="form-btn" type="submit" name="submit">Log In</button>
    </form>  
    
  </div>  
</div> 

<?php include "inc/footer.html"; ?> 