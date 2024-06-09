<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>piłka nożna</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <div id="baner">
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </div>
    <div id="blokLewy">
        <form method="POST" >
            <select name="pozycja">
                <option value="1">Bramkarze</option>
                <option value="2">Obrońcy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastnicy</option>
            </select>
            <input type="submit" value="Zobacz" name="formularz">
        </form>
        <img src="zad2.png" alt="piłka">
        <p>
            Autor: 00000000000
        </p>
    </div>
    <div id="blokPrawy">
        <ol>
            <?php
                if(isset($_POST["formularz"])){
                    if(isset($_POST["pozycja"])){
                        $connection = mysqli_connect("localhost", "root", "", "egzamin");

                        $query = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = ".$_POST["pozycja"];
                        $result = mysqli_query($connection, $query);
                        
                        while($row = mysqli_fetch_row($result)){
                            print("<li>".$row[0]." ".$row[1]."</li>");
                        }
    
                        mysqli_close($connection);
                    }
                }
            ?>
        </ol>
    </div>
    <div id="blokGlowny">
        <h3>Liga mistrzów</h3>
    </div>
    <div id="liga">
        <?php
            $connection = mysqli_connect("localhost", "root", "", "egzamin");

            $query = "SELECT zespol, punkty, grupa FROM liga ORDER BY punkty DESC;";
            $result = mysqli_query($connection, $query);

            while($row = mysqli_fetch_row($result)){
                print("<section class='blokDruzyna'>");
                print("<h2>".$row[0]."</h2>");
                print("<h1>".$row[1]."</h1>");
                print("<p>grupa: ".$row[2]."</p>");
                print("</section>");
            }

            mysqli_close($connection);
        ?>
    </div>
</body>
</html>