<%@page language="java" %>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form" %>
<html>
<head>
	<title>RVR Library Management</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<form:form  action="/login" method="post">
<div class="logo">
      	<img src="logoLibrvry.png" alt="Home" onclickstyle="width:304px;height:228px;" onclick="location.href='login1.html'">
      	<span style="display:block; height: 40px;"></span>

</div>
<div class="container">
    <label><b>Username</b></label>
    <form:input path="username"/>

    <br><br><label><b>Password</b></label>
    <form:password path="password"/>

<%--<div  ="psw" a href="#">Forgot password?</a></span><br>--%>
</div>
	<button type="submit">Login</button><br>

    <%--<input type="checkbox" checked="checked"> Remember me--%>
</body>
</html>