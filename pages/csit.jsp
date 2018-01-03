<html>
<head>
<style>
	body 
	{
		height: 1000px;
		background: linear-gradient(135deg, #2929a3 0%,#a50d9e 69%,#d7675b 100%) fixed;
		background-size: 100% 100%; 
		text-align:center;
		color:white;
                font-size:"20";
	}
        img
	{
		border-radius: 80%;
	}
	.container
	{
		padding: 16px;
	}
        span.psw
	{
		float:center;
		padding-top: 16px;
	}
        button
	{
		background-color: #4CAF50;
		color:white;
		padding: 14px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
               
	}
	button:hover
	{
		opacity: 0.8;
	}
        
</style>
</head>
<body>
<div class="logo">
      	<img src="logoLibrvry.png" alt="Home" onclickstyle="width:304px;height:228px;" onclick="location.href='home.html'" >
      	<span style="display:block; height: 30px;"></span>

</div>
<h1>CSE/IT books</h1>
<table border="1" align="center">
  <tr>
    <th>Book ISBN</th>
    <th>Name</th>
    <th>Author</th>
    <th>Add to wishlist</th>
  </tr>
  <tr>
    <td>0001</td>
    <td>DAA</td>
     <td>Bennett</td>
     
 <td><center><button type="button" onclick="location.href='add1.php'"> + </button></center></td>
  </tr>
	<tr>
    <td>0002</td>
    <td>DBMS</td>
     <td>Navathe</td>
     <td><center><button type="button" onclick="location.href='add2.php'"> + </button></center></td>
 
  </tr>
	<tr>
    <td>0003</td>
    <td>Os</td>
     <td>Martin</td>
     <td><center><button type="button" onclick="location.href='add3.php'"> + </button></center></td>
 
  </tr>

</table>
<span style="display:block; height: 30px;"></span>

<h2>Borrow book form</h2>
<form method=POST action="issuebook.php">
<label><b>Your Name</b></label></br>
      <input type="text" placeholder="Enter  name" name="name" required></br>
	<span style="display:block; height: 20px;"></span>
	<label><b>Date</b></label></br>
      <input type="text" placeholder="Enter today's date" name="date" required></br>
       <span style="display:block; height: 20px;"></span>
<label><b>Enter Book ISBN</b></label></br>

      <input type="name" placeholder="Enter ISBN" name="ISBN" required></br>
       <span style="display:block; height: 20px;"></span>
<button type="submit">Submit</button>
	
</form>	


</html>
