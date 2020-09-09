<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Messaggi</h1>
        <div class="">
            @foreach ($messaggi as $messaggio)
                {{$messaggio->testo_messaggio}}
            @endforeach
        </div>
    </body>
</html>
