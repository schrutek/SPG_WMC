<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="callback.js"></script>
        <title>Document</title>
    </head>

    <body>
        <h1>Welcome to WMC!</h1>
        <p>
            The great PHP & JS Sample
        </p>
        <hr>
            <?php
            renderBody();
            ?>
        <hr>
        <h4>Footer... (C)...</h4>
    </body>

    <script>
        function details(guid) {
            fetch("/?action=details&guid=" + guid)
            .then(result => result.json())
            .then(data => {
                console.log(data.username);
                const container = document.getElementById("userName");
                container.innerHTML = data.username + ' - ' + data.guid;
            })
            .catch(err => alert(err.message));
        }
    </script>
</html>
