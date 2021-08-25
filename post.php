<?php include "inc/header.php" ?>

<form action="inc/post.inc.php" method="POST">
<label for="title">Title</label>
<input type="text" name="title">
<label for="body">Your Post</label>
<textarea name="body" id="body" cols="30" rows="10"></textarea>
<button type="submit" name="submit">Post</button>
</form>

<?php
if(isset($_GET['error'])){
    if($_GET['error'] == "postempty"){
        echo "<p>Please fill in all fields.</p>";
      } else if($_GET['error'] == "stmtfailed"){
        echo "<p>I'm sorry something went wrong.</p>";
      }
    }
?>


<?php include "inc/footer.html"?>