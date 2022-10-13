<?php
require('user.class.php');

function renderBody() {
    if (isset($GLOBALS['result']))
    {
        echo <<<HTML
        <h3>List all Users:</h3>
        <p>
            Klick one to show details
        </p>
        <div>
        <ul>
        HTML;

        foreach ($GLOBALS['result'] as $user)
            {
                echo('<li><a href="#" onclick=details(\'' . $user->guid . '\');>' . $user->username . '</a></li>');
            }
        echo <<<HTML
        </ul>
        </div>
        <div>
            <dt>User Name:</dt>
            <dd id="userName"></dd>
        </div>
        HTML;
    }
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
            require('layout.php');
            exit(0);
            break;
        case 'details':
            header("Content-Type: application/json");
            $guid = $_GET['guid'];
            $data = $pdo->query("SELECT * FROM User WHERE Guid = '$guid'")->fetch();
            echo(json_encode($data));
            exit(0);
            break;
        default:
            require('notFound.php');
            exit(0);
            break;
    }
}
else
{
    header('Location: '.'?action=allUsers');
}

?>