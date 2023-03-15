<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Rejestracja</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">


    <link rel="stylesheet" type="text/css" href="../css/index.css" />

</head>



<body>
<div class="main">
    <div class="loginForm">
        <form method="post">
            <div class="Panele">
                <h1>Rejestracja</h1>

                    <input type="text" placeholder="Nazwa użytkownika:" name="nazwaUzytkownik" required />
                    <input type="email" placeholder="Email:" name="email" required />
                    <input type="password" placeholder="Hasło:" name="haslo" required />
                    <input type="password" placeholder="Powtórz hasło:" name="haslo2" required />
                    <input type="submit" name="rejestracja" value="Zarejestruj"/>

                <?php
                // dane do polaczenia z baza
                $servername = "localhost";
                $username = "root";
                $password = "123";
                $dbname = "rejestracjatest";
                // polazcenie
                $conn = new mysqli($servername, $username, $password, $dbname);

                // sprawdz polaczenie
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // wysylanie formularza
                if(isset($_POST['rejestracja'])) {
                    // pobierz dane z formularza
                    $nazwaUzytkownik = $_POST['nazwaUzytkownik'];
                    $email = $_POST['email'];
                    $haslo = $_POST['haslo'];
                    $haslo2 = $_POST['haslo2'];

                    // sprawdzenie halsa
                    if($haslo !== $haslo2) {
                        $_SESSION['message'] = "Hasła nie są takie same.";
                    } else {
                        $sqlInsrt = "INSERT INTO rejestracja (nazwaUzytk, hasloUzytk,email) VALUES ('$nazwaUzytkownik', '$haslo', '$email')";

                        if ($conn->query($sqlInsrt) === TRUE) {
                            echo "Nowy użytkownik został dodany do bazy danych.";
                        } else {
                            echo  "Błąd: " . $sqlInsrt . "<br>" . $conn->error;
                        }
                    }
                }

                $conn->close();
                ?>
                </form>
            </div>
    <input type="submit" value="gry" onclick="auth()" />


    </div>
</div>
<script>
    function auth(){
        window.location.assign("gra.html");
    }

</script>



</body>

</html>
