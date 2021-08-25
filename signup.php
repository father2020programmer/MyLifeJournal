<?php include "inc/header.php"; ?>

<div class="page">
  <div class="title">
    <h1>Sign Up</h1>
    <p>Please provide your info.</p>
  </div> 

  <div class="form-box">
    <div class="error-box">
      <?php 
      if(isset($_GET['error'])){
        if($_GET['error'] == "emptyinput"){
            echo "<p>Please fill in all fields.</p>";
          } else if($_GET['error'] == "valEmail"){
            echo "<p>Please enter a valid email.</p>";
          } else if($_GET['error'] == "pswnotMatch"){
            echo "<p>Your passwords do not match.</p>";
          } else if($_GET['error'] == "emailused"){
           echo "<p>This email already has an acount.</p>";
          } else if($_GET['error'] == "stmtfailed"){
            echo "<p>I'm sorry something went wrong.</p>";
          }
        }
      ?>
    </div>
    <form class="signup" action="inc/signup.inc.php" method="POST">
      <div class="admin-box">
        <p>Are You Admin?</p>
        <input type="radio" id="yes" name="admin" value="1">
        <label for="yes">Yes</label>
        <input type="radio" id="no" name="admin" value="0">
        <label for="no">No</label>
      </div>
      <input class="signup-item" type="text" name="first" placeholder="First Name">
      <br>
      <input class="signup-item" type="text" name="last" placeholder="Last Name">
      <br>
      <input class="signup-item" type="text" name="loc" placeholder="Location">
      <br>
      <input class="signup-item" type="text" name="dpt" placeholder="Dept">
      <br>
      <input class="signup-item" type="text" name="age" placeholder="Age">
      <br>
      <input class="signup-item" type="email" name="email" placeholder="Email">
      <br>
      <input class="signup-item" type="password" name="pwd" placeholder="Password">
      <br>
      <input class="signup-item" type="password" name="pwdcheck" placeholder="Repeat Password">
      <br>
      <button class="form-btn" type="submit" name="submit">Submit</button>
    </form>    
    
  </div>


  

  
</div>



  <?php include "inc/footer.html"; ?> 