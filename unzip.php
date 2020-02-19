<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm  navbar-dark" style="background-color: #d9534f">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Logo</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="firstpage.php">home</a>
        </li>


        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
               Albums
            </a>
            <div class="dropdown-menu">
                <?php

                $directory = "gallary/";

                if (is_dir($directory)){
                    if ($opendirectory = opendir($directory)){

                        while (($file = readdir($opendirectory)) !== false){
                            echo "<a class='dropdown-item' href='res.php?folder=" . "$file'>$file$</a>"."<br>";
                        }
                        closedir($opendirectory);
                    }
                }
                ?>

            </div>
        </li>
    </ul>
</nav>

</body>
</script>

</body>
</html>
