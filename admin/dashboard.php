<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Admin Dashboard</title>
   
   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>

<header class="header">
   <div class="flex">
      <a href="dashboard.php" class="logo">Admin Panel</a>
      <nav class="navbar">
         <a href="dashboard.php">Dashboard</a>
         <a href="users_accounts.php">User Accounts</a>
         <!-- Add more links as needed -->
      </nav>
      <div class="icons">
         <a href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
   </div>
</header>

<section class="dashboard">
   <h1 class="heading">Admin Dashboard</h1>
   <div class="box-container">
      <div class="box">
         <h3>Users</h3>
         <a href="users_accounts.php" class="btn">Manage Users</a>
      </div>
      <!-- Add more boxes as needed -->
   </div>
</section>

<script src="../assets/js/script.js"></script>

</body>
</html>
