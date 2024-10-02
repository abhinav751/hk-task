<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Add User</h1>
    <form id="userForm" method="POST" action="save_user.php">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" id="email" required><br>
        Mobile: <input type="text" name="mobile" required><br>
        <input type="submit" value="Add User">
    </form>

    <script>
    
    $(document).ready(function() {
        $("#userForm").submit(function(event) {
            var email = $("#email").val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Invalid Email format");
                event.preventDefault();
            }
        });
    });
    </script>
</body>

</html>