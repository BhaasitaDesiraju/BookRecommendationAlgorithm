<html>
<head>
    <title>RVR Library Management</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body>
<div class="vbox vbox-center">
     
	 <div class="hbox header">
	
    <div class="hbox-left left-header">
        <img style="width:50%;" src="../images/logoLibrvry.svg" alt="Home" onclick="location.href='../php/dashboard.php'">
    </div>

    <div class="hbox-right right-header">
        <div style="float:right;"><?php include 'session.php'?> |
            <form method="post" class="signout" action="logout.php">
                <button>Sign Out</button>
            </form>
        </div>
    </div>
</div> 

<div class="tilelayout">
      <div class="tile" onclick="location.href='mybooks.php'">
                <img src="../images/myBooks.png" alt="My Books">
      </div>
	  <div class="tile" onclick="location.href='bookscatalog.php'">
                <img src="../images/bookCatalog.png" alt="Books Catalog">
       </div>
	    <div class="tile" onclick="location.href='magazinecatalog.php'">
                <img src="../images/magazineCatalog.png" alt="Magazines Catalog">
        </div>
		 <div class="tile" onclick="location.href='newspapercatalog.php'">
                <img src="../images/newspaperCatalog.png" alt="Newspaper Catalog">
            </div>
		 <div class="tile" onclick="location.href='referencesection.php'">
                <img src="../images/referenceSection.png" alt="Reference Section">
            </div>
		 <div class="tile" onclick="location.href='wishlist.php'">
                <img src="../images/wishlist.png" alt="Wishlist">
            </div>
		<div class="tile" onclick="location.href='viewwishlist.php'">
                <img src="../images/viewWishlist.png" alt="View Wishlist">
            </div>
		<div class="tile" onclick="location.href='transactions.php'">
                <img src="../images/transactions.png" alt="Transactions">
            </div>
		<div class="tile" onclick="location.href='manageusers.php'">
                <img src="../images/manageUsers.png" alt="Manage Users">
            </div>
		<div class="tile" onclick="location.href='profile.php'">
                <img src="../images/profile.png" alt="Profile">
            </div>
		 <div class="tile" onclick="location.href='settings.php'">
                <img src="../images/settings.png" alt="Settings">
            </div>
		 <div class="tile" onclick="location.href='aboutlibrary.php'">
                <img src="../images/aboutLibrary.png" alt="About Library">
            </div>
    </div>

</div>
</body>
</html>

