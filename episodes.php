<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
   <?php include "menu.php"; ?>
    <div class="container-fluid">

        
        <div class="mt-3 d-flex justify-content-center">
            <form  action="" method="post">
                    <?php if ($_SESSION["pageE"] > 0) { ?>
                        <input type="submit" value="Atras" name="atrasE" class="btn me-2">
                    <?php } ?>
                    <?php if ($_SESSION["pageE"] < 3) { ?>
                        <input type="submit" value="Adelante" name="adelanteE" class="btn me-2">
                    <?php } ?>
            </form>
        </div>
        <div class="wrapper w-100 vh-100 col-12 d-flex flex-wrap justify-content-center align-items-center">
            <?php
            AllEpisodes();
            ?>
            
        </div>
    </div>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>

