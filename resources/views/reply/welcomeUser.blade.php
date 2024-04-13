<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anek+Tamil:wght@100..800&family=Belanosima:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Benvenuto in Future+</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Belanosima", sans-serif;
        }

        .container {
            max-width: 800px;
            margin: auto;
            text-align: center;
        }

        header {
            color: white;
            background-color: #4c1595;
            padding: 5rem 5px;
        }

        main {
            text-align: left;
            margin: 3rem 5px 10rem;
        }

        p {
            font-size: 1.1em;
            font-weight: 500;
            margin: 4rem 0;
        }

        p.first {
            font-size: 1.2em;
            font-weight: bold;
        }

        .setting {
            margin-top: 10px;
        }

        .preference {
            font-weight: bold;
            margin-bottom: 3rem;
        }

        footer {
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
            color: white;
            background-color: black;
            padding: 3rem 5px
        }

    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Benvenuto in Future+, {{ $newEmail['firstName'] }}</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <p class="first">
                Grazie {{$newEmail['name']}} per esserti rivolto a Future +
            </p>
            <p>
                La sua richiesta è stata ricevuta ed è ora fase in elaborazione <br>
                La ricontatteremo nel minor tempo possibile <br>
            </p>
            <p>
                In base alla sua preferenza verrà ricontattato tramite 
            </p>

            <div  class="preference">
                @if ($newEmail['reply'] == 1)
                    <span>Email</span>
                @elseif ($newEmail['reply'] == 2)
                    <span>Chiamata Telefonica</span>
                @elseif ($newEmail['reply'] == 3)
                    <span>WhatsApp</span>
                @endif
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <h3>Future +</h3>
            <div>P. IVA 
                <span>
                    02974730422
                </span>
            </div>
        </div>
    </footer>
</body>
</html>