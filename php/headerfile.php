<?php 
  session_start();
  $_SESSION['username']=$_GET['username'];
 ?>
 
<div class="hbox header">
    <div class="hbox-left left-header">
        <img style="width:50%;" src="../images/logoLibrvry.svg" alt="Home" onclick="location.href='../php/dashboard.php'">
    </div>

    <div class="hbox-right right-header">
        <div style="float:right;">Welcome ${username} |
            <form method="post" class="signout" action="logout.php" commandName="userForm">
                <button>Sign Out</button>
            </form>
        </div>
    </div>
</div>
