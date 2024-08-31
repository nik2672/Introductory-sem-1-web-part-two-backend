<!DOCTYPE html>
<html>
  <head>
    <title>Enhancements</title>
 	<link rel="stylesheet" href="styles/styles_enhancement.css"
    </head>
  <body>
    <?php include 'menu.inc'; ?>

    <h1>PHP Enhancements</h1>
    <hr>
    <div class="description">

    <h2 align= "center"><u>Logout</u></h2>
    <h4 align="center">Logout Page</h4>
    <p align= "center">Located in the <a href="manage.php">"Manager"</a>, the 'logout.php' PHP script logs the user out and ends the session. Before erasing the session itself, it first clears all session variables. Additionally, if a session cookie was set, it is deleted. Finally, it ends script execution by using the header() function to route the user to the login page. By erasing any session data that may have been saved and ensuring that the user is sent to the login page for reauthentication, this capability makes sure that the user's session is correctly ended.</p>
        <img src="images/logout.jpg" alt="logout" class="image">
    <h2 align= "center"><u>Record Sorting</u></h2>
    <h4 align="center">EOI Records Sorting</h4>
    <p align="center">The <a href="manage.php">"Manage"</a> PHP script manages a variety of website manager-performed operations. It features the ability to list expressions of interest (EOIs) by job reference number, list EOIs by applicant name, delete EOIs by job reference number, and modify an EOI's status. Depending on the chosen action, the script conducts the necessary SQL queries. If the query is successful, it either shows the results or, for delete/change actions, a success message. In the event of a problem, a message is displayed along with the SQL query and the MySQLi error.</p>
        <img src="images/sort.jpg" alt="sort" class="image" >

    <hr>
    </div>

  <?php include 'footer.inc'; ?>
  </body>
</html>
