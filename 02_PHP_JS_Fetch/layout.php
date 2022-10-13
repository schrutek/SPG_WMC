<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Hello World!</h1>
<?php
        if (isset($result))
        {
            renderBody($result);
        }
?>
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
