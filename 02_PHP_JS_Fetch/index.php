<?php
require('user.class.php');

function renderLayout($result)
{
    echo <<<HTML
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <h1>Hello World!</h1>
    HTML;
                if (isset($result))
                {
                    renderBody($result);
                }
    echo <<<HTML
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
    HTML;
}

function renderBody($result) {
    echo('<div>');
    foreach ($result as $user)
    {
        echo('<ul>');
        echo('<li><a href="#" onclick=details(\'' . $user->guid . '\');>' . $user->username . '</a></li>');
        echo('</ul>');
    }
    echo('</div>');

    echo <<<HTML
    <div>
        <dt>User Name:</dt>
        <dd id="userName"></dd>
    </div>
    HTML;
}

$pdo = new PDO('sqlite:stores.db');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);

if (isset($_GET['action']))
{
    $action = $_GET['action'];
    switch ($action) {
        case 'allUsers':
                $result = $pdo->query("SELECT * FROM User")->fetchAll(PDO::FETCH_CLASS, 'User');
                renderLayout($result);
            break;
        case 'details':
                header("Content-Type: application/json");
                $guid = $_GET['guid'];
                $data = $pdo->query("SELECT * FROM User WHERE Guid = '$guid'")->fetch();
                echo(json_encode($data));
                exit(0);
            break;
        default:
            echo "<h1>404: Not Found!</h1>";
            break;
    }
}
else
{
    header('Location: '.'?action=allUsers');
}

?>