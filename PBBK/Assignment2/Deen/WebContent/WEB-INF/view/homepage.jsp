<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>HomePage</title>
</head>
<body>
	<form:form method="POST" action="output_name" modelAttribute="models">
		<table>
			<tr>
                <td><form:label path="name">Give Your Name</form:label></td>
            	<td><form:input path="name"/></td>
            </tr>
            <tr>
            	<td><input type="submit" value="Submit"/></td>
            </tr>
		</table>
	</form:form>
</body>
</html>