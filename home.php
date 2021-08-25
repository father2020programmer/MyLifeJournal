<?php include "inc/header.php"; ?>

<div class="page">
    <div class="title">
        <h1>Hello, <?php echo $_SESSION['userInfo']['first_name']?></h1>
        <p>You are <?php echo $_SESSION['userInfo']['age']?> years old!</p>
        <p>You work in the <?php echo $_SESSION['userInfo']['dept']?> department.</p>
    </div>
    <div class='post-box'>
        <h2 class='post-title'>Recent Posts</h2>
        <?php
            require_once "inc/server.inc.php";
            $userId = $_SESSION['userInfo']['id'];
            $sql = "SELECT * FROM posts WHERE user_id != $userId ORDER BY posts.post_date DESC LIMIT 10;";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_object($result)){                
                 echo "<a href='read.php?article=$row->post_id'>$row->title</a><br>";                 
            }
        ?>
    </div>
    <div class='user-box'>
        <h2 class='user-title'>Your Posts</h2>
        <?php
            require_once "inc/server.inc.php";
            $userId = $_SESSION['userInfo']['id'];
            $sql = "SELECT * FROM posts WHERE user_id = $userId;";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_object($result)){                
                 echo "<a href='read.php?post=$row->post_id'>$row->title</a><br>";                 
            }
        ?>
    </div>
</div>





<?php include "inc/footer.html"; ?> 