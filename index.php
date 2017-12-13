<?php
    require_once "db/connect.php";
    $db = connect_db();

    $music = get_music($db, (isset($_GET['sort']) ? $_GET['sort'] : "artist"), (isset($_GET['search']) ? $_GET['search'] : null));

    if (isset($_GET['sort']) || isset($_GET['search'])) {
        exit(json_encode($music));
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Музыкальный каталог</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="script.js"></script>

</head>
<body>
<header>
    <div id="logo"><img src="logo.png"></div>
    <nav>
        <ul>
            <li><a href="#" id="all_list">Все композиции</a></li>
            <li>Поиск <input id="search"><img id="searchsubmit" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAEoSURBVDhPvdO9L0NhFMfx66URREQEi1g6qSYSxGIx1oBY2QwWm8XIYDBIJMJokS7eJlILm4GhBm9/Dv3+nhOJyHNvD2l9k096niZO7n0ayX/WiWUc4waX2MYY/tQiXrGDGQxjFCu4RRk9cLcG/WF/OMXT8gf0hlOdJnCPrnDKTldzYWN2FUza6Ooa0zbG0+s+2uhuAfs2xpvFoY3uBnFnY7x57NrorgNPNsabwomN7vLQvaaWwzvawsnXOjZtTG8PqzbWTa/+hqFwyqgPVYyHU3qt0FVthJOjAp6h/5oWffGjEegeP3GOdrgawBFecAA90RauoDdZwhm0WJ/uxaobJeie9eRFfD29Fn1f/JsfODMtatriU2ixPhu++ANz+qJRabHuv1klSQ2ZRC8/otzDrAAAAABJRU5ErkJggg=="></li>
            <li>Сортировка по
                <select>
                <option value="artist">Исполнителям</option>
                <option value="genre">Жанрам</option>
                </select>
            </li>
        </ul>
    </nav>
</header>
<div id="fon"></div>
<div id="load"></div>
<main>
    <div id="list">
        <?php if ($music)foreach ($music as $item) {?>
            <section>
                <h2><?=$item['artist'];?> - <?=$item['title'];?></h2>
                <p id="genre">Жанр: <?=$item['genre'];?></p>
                <audio controls>
                    <source src="songs/<?=$item['file'];?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </section>
        <?php } ?>
    </div>
</main>
</body>
</html>