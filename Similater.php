<?php
    require 'function.php';
    if (isset($_COOKIE["matches"])) {
        $matches = json_decode($_COOKIE['matches'], true);
    } else {
        $matches = array( 
            "morrocoVCroatia" => array("MOROCCO" => 0, "CROATIA" => 0, "Status" => false),
            "morrocoVSBelgium" => array("MOROCCO" => 0, "BELGium" => 0, "Status" => false),
            "morrocoVSCanada" => array("MOROCCO" => 0, "CANADA" => 0, "Status" => false),
            "belgiuVSCanada" => array("BELGium" => 0, "CANADA" => 0, "Status" => false),
            "belgiumVSSpain" => array("BELGium" => 0, "CROATIA" => 0, "Status" => false),
            "CanadaVSCroatia" => array("CANADA" => 0, "CROATIA" => 0, "Status" => false),
        );
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulateur coupe du monde</title>
    <!-- link bootsrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- link CSS -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- NAV -->
    <nav id="nav">
        <div class="logo">
            <img src="images/logo.png" width="100px" height="80px" >
        </div>
    </nav>
    <div>
        <h1 class="text-center">World Cup Simulator</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == 'GET' && isset($_GET['matchName']) && isset($_GET['teamOne'])  && isset($_GET['teamTwo'])) {
            $matches[$_GET['matchName']][$_GET['teamOne'][0]] = $_GET['teamOne'][1];
            $matches[$_GET['matchName']][$_GET['teamTwo'][0]] = $_GET['teamTwo'][1];
            $matches[$_GET['matchName']]['Status'] = true;
            // print_r($matches);
            setcookie('matches', json_encode($matches));
        } elseif ($_SERVER["REQUEST_METHOD"] == 'GET' && isset($_GET['reset'])){
            echo "lmjeyf";
            $matches = array( 
                "morrocoVCroatia" => array("MOROCCO" => 0 , "CROATIA" => 0 , "Status" => false  ) ,
                "morrocoVSBelgium" => array("MOROCCO" => 0 , "BELGium" => 0   , "Status" => false )    ,
                "morrocoVSCanada" => array("MOROCCO" => 0 , "CANADA" => 0   , "Status" => false ) ,
                "belgiuVSCanada" => array("BELGium" => 0 , "CANADA" => 0   , "Status" => false ) ,
                "belgiumVSSpain" => array("BELGium" => 0 , "CROATIA" => 0   , "Status" => false ) ,
                "CanadaVSCroatia" => array("CANADA" => 0 , "CROATIA" => 0   , "Status" => false ) ,
            );
            setcookie('matches', json_encode($matches));
        }
        ?>
    </div>
    <main class="container d-flex gap-3 w-100">
        <section>
            <?php 
          foreach ($matches as $key => $value) :
            $contries = [];
                $values = [];
                $theKeys = [];
                foreach ($value as $Countrieskey => $CountriesVlues) {
                    array_push($contries, $Countrieskey);
                    array_push($values, $CountriesVlues);
                    array_push($theKeys, $key);


                }
                ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET"">
                <div class=" d-flex justify-content-between mb-3 card-color">
                    <div class="w-100">
                        <h3 class="bg-dark text-light text-aligne-center d-flex justify-content-center">23 NOV 11:00 H</h3>
                        <div class="d-flex  align-items-center justify-content-end m-2">
                            <img src="images/morocco.jfif" alt="" class="rounded-circle" width="90px" height="80px">
                            <h2><?php echo $contries[0] ?></h2>
                        </div>
                    </div>
                    <div class="w-100">
                        <h3 class="bg-dark text-light d-flex justify-content-center">FINAL</h3>
                        <div class="d-flex">
                            <input type="hidden" name="teamOne[]"  value="<?php echo $contries[0] ?>">
                            <input type="number" min="0" name="teamOne[]"  value="<?php echo $values[0] ?>" class="" width="45px" height="50px"  value="morocco">
                            <input type="hidden" name="teamTwo[]" value="<?php echo $contries[1] ?>">
                            <input type="number" min="0" name="teamTwo[]" value="<?php echo $values[1] ?>" width="45px" height="50px"  value="croatia">
                            <input type="hidden" name="matchName"  value="<?php echo $key ?>">
                        </div>
                        <input type="submit" class="btn btn-danger w-50 h-25 mb-3 mr-5" value="gool">
                    </div>
                    <div class="w-100">
                        <h3 class="bg-dark text-light text-aligne-center d-flex justify-content-center">MATCH 1</h3>
                        <div class="d-flex  align-items-center justify-content-end m-2">
                            <h2 class="inp-two"> <?php echo $contries[1] ?> </h2>
                            <img src="images/croitia.png" alt="" class="rounded-circle" width="90px" height="80px">
                        </div>
                    </div>
                </div>
            </form>
            
            <?php 
          endforeach;
            ?>
            <form method='GET' action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="reset" value="reset">
                <input type="submit"  class="btn text-center mx-auto btn-danger"  value="RESET ALL VALUES">
            </form>
        </section>
    <?php
    ?>
    <!-- Create Table -->
    <section class="col-md-6 px-3 py-4 w-50">
            <h2 class="  py-2 text-center text-danger  ">results Table</h2>
            <div class="table-responsive">
                <table class="table table-dark table-striped w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TEAM</th>
                            <th>POINTS</th>
                            <th>GAMES PLAYED</th>
                            <th>GAMES WON</th>
                            <th>GAMES EQUAL</th>
                            <th>GAME LOSTS</th>
                            <th>Goals Scored</th>
                            <th>Goals Recieved</th>
                            <th>DIFF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_REQUEST['simulate']) &&  $_REQUEST['simulate'] == "simulate") 
                        {
                            foreach(sortByTwoEquals(resultCouter($matches)) as  $game => $gameInfo){
                        ?>
                        <tr>
                            <td><?php echo $game + 1; ?> </td>
                            <td><?php echo $gameInfo["Team"];  ?></td>
                            <td><?php echo $gameInfo["POINTS"];  ?></td>
                            <td><?php echo $gameInfo["GAMES_PLAYED"];  ?></td>
                            <td><?php echo $gameInfo["GAMES_WON"];  ?></td>
                            <td><?php echo $gameInfo["GAMES_EQUAL"];  ?></td>
                            <td><?php echo $gameInfo["GAME_LOSTS"];  ?></td>
                            <td><?php echo $gameInfo["GOALS_SCORED"];  ?></td>
                            <td><?php echo $gameInfo["GOALS_RECEIVED"];  ?></td>
                            <td><?php echo $gameInfo["DIFF"]; ?></td>
                        </tr>
                        <?php
                    }    
                }
                ?>
                        <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="text-center">
                            <input type="hidden" name="simulate" value="simulate">
                            <input type="submit" class="btn text-center mx-auto btn-info text-light w-50 d-flex justify-content-center" value="simulate">
                        </form>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>