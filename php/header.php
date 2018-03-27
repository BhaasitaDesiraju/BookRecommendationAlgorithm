<div class="vbox vbox-center">
     
	 <div class="hbox header">
	
    <div class="hbox-left left-header">
        <img style="width:50%;" src="../images/logoLibrvry.svg" alt="Home" onclick="location.href='dashboard.php'">
    </div>

    <div class="hbox-right right-header">
        <div style="float:right;"><?php include 'session.php'?> |
            <form method="post" class="signout" action="logout.php">
                <button style=>Sign Out</button>
            </form>
        </div>
    </div>
</div> 
