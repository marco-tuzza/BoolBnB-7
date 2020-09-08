<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
</head>
<body>
    <input type="search" id="address-input" placeholder="Where are we going?" />
    <div class="risultati">
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    <script>
        var placesAutocomplete = places({
        appId: 'plT92Q60ZYBJ',
        apiKey: 'b2d1f81e1e0aa1ead87da414255dda36',
        container: document.querySelector('#address-input')
    });
    </script>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>