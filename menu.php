
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
    <link rel="stylesheet" href="css/nav.css">
</head>

<body>
   

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Rick & Morty johan rojas<img src="" width="250px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">TODOS</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="episodes.php">Episodios</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

<?php
session_start();

function Characters()
{

    if (isset($_POST["search"])) {

        //all
        $urlAll="https://rickandmortyapi.com/api/character";
        $json = file_get_contents($urlAll);
        $data = json_decode($json, true);
        $characters = $data["results"];

       foreach ($characters as $key => $character) {
            if ($character["name"]==$_POST["dato"]) {
                echo '
                <div class="card text-bg-dark mb-5 me-5 mt-5" style="max-width: 18rem; border:none;">
                    <img src="' . $character['image'] . '" class="card-img-top" alt="..." style="max-width: 100%;">
                    <div class="card-body">
                        <h4>' . $character["name"] . '</h4>
                        <p>Status: ' . $character["status"] . '</p>
                        <p>Species: ' . $character["species"] . '</p>
                        <p>Gender: ' . $character["gender"] . '</p>
                    </div>
                </div>';
                break
                ;
            }
        }

   }else{
        if (!isset($_SESSION["pageC"])) {
            $_SESSION["pageC"] = 0;
        }else{
            if (isset($_POST["atras"])) {
                $_SESSION["pageC"]-=1;
            }else if(isset($_POST["adelante"])){
                $_SESSION["pageC"]+=1;
            }
        }
        //Se hace la consulta
        $url = "https://rickandmortyapi.com/api/character?page=".$_SESSION["pageC"];
        //Se guarda la consulta (JSON)
        $json = file_get_contents($url);
        //Se convierte JSON a un array
        $data = json_decode($json, true);
        //Se guarda el array de results 
        $characters = $data["results"];

        //Se recorreo
        foreach ($characters as $key => $character) {

            echo '
            <div class="card text-bg-dark mb-5 me-5 mt-5" style="max-width: 18rem; border:none;">
                <img src="' . $character['image'] . '" class="card-img-top" alt="..." style="max-width: 100%;">
                <div class="card-body">
                    <h4>' . $character["name"] . '</h4>
                    <p>Status: ' . $character["status"] . '</p>
                    <p>Species: ' . $character["species"] . '</p>
                    <p>Gender: ' . $character["gender"] . '</p>
                </div>
            </div>';
        }
   }

    

    



}

function AllEpisodes(){

    if (!isset($_SESSION["pageE"])) {
        $_SESSION["pageE"] = 0;
    }else{
        if (isset($_POST["atrasE"])) {
            $_SESSION["pageE"]-=1;
        }else if(isset($_POST["adelanteE"])){
            $_SESSION["pageE"]+=1;
            if ($_SESSION["pageE"]>3){
                $_SESSION["pageE"]=0;
            }
        }
    }

        //Se hace la consulta
    $url = "https://rickandmortyapi.com/api/episode?page=".$_SESSION["pageE"];
    //Se guarda la consulta (JSON)
    $json = file_get_contents($url);
    //Se convierte JSON a un array
    $data = json_decode($json, true);
    //Se guarda el array de results 
    $Episodes = $data["results"];

    //Se recorreo
    foreach ( $Episodes as $key => $Episode) {

        echo '
        <div class="card text-bg-dark mb-5 me-5 mt-5" style="max-width: 18rem; border:none;">
            
            <div class="card-body">
                <ul class="list-group list-group-flush card-body">
                <h4>' . $Episode["name"] . '</h4>
                <p>Status: ' . $Episode["air_date"] . '</p>
                <p>Species: ' . $Episode["episode"] . '</p>
            </div>
        </div>';
    }


}

?>

</html>

