<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Form</title>
      </head>
      
      <body>
        <h2>form</h2>
        <form action="formproc.php" method="POST">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" required><br>

            <label for="secondname">Second Name</label>
            <input type="text" name="secondname" id="secondtname" required><br>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required><br>

            <label for="username">UserName</label>
            <input type="text" name="username" id="username" required><br>

            <input type="submit" name="submit" value="enlist">
        </form>
      </body>
</html>