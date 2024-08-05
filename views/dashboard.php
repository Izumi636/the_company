<?php 
session_start();

require '../classes/User.php';

$user = new User;
$all_users = $user-> getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    
            <title>dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>

            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name']?></span>
                <form action="../actions/logout.php" method="post" class="d-flext ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">
                        Log out
                    </button>
                </form>
            </div>
        </div>
    </nav>
    
    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h2 class="text-center">User List</h2>

            <table class="table table-hover align-middle">
                <thead>
                    <th><!--for photo--></th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User</th>
                    <th><!--for acction buttons--></th>
                </thead>
                <tbody>
                    <?php
                    while($user=$all_users->fetch_assoc()){ ?>
                    <tr> 
                        <td>
                            <?php if ($user['photo']){ ?>
                                <img src="../assets/images/<?= $user['photo'] ?>" alt="<?=$user['photo']?>" class="d-block mx-auto dashboard-photo img-thumbnail">
                                <?php 
                            }else{
                                ?>
                                <i class="fas fa-user text-secoondary d-block text-center dashboard-icon"></i>
                                <?php } ?>
                        </td>
                        <td><?= $user['id']?></td>
                        <td><?= $user['first_name']?></td>
                        <td><?= $user['last_name']?></td>
                        <td><?= $user['username']?></td>
                        <td>
                            <?php
                                if($_SESSION['id']==$user['id']){ ?>
                                    <a href="edit-user.php" class="btn btn-outline-warning" title="Edit">
                                        <i class="far fa-pen-to-square"></i>
                                    </a>
                                    <a href="delete-user.php" class="btn btn-outline-danger" title="Delete">
                                        <i class="far fa-trash-can"></i>
                                    </a>

                                
                                
                                    <?php } ?>
                           
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </main>
</body>
</html>