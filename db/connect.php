<?php
function connect_db() {
    //Подключаемся к серверу базы данных
    $db = mysqli_connect('localhost','root','','musickr');
    if(!$db) {
        exit('Error'.mysqli_error());
    }
    //Устанавливаем кодировку запросов
    mysqli_query($db,"SET NAMES cp1251");

    return $db;
}
function get_music($db,$sort = "artist", $search = null) {
    //Запрос на выборку все товаров

    if ($search)
        $sql = 'SELECT * FROM music WHERE (title = "'.strtolower(mysqli_real_escape_string($db, $search)).'") ORDER BY '.mysqli_real_escape_string($db, $sort).' ASC';
    else
        $sql = 'SELECT * FROM music ORDER BY '.mysqli_real_escape_string($db, $sort).' ASC';

     $result = mysqli_query($db,$sql);
    if ( mysqli_num_rows($result) > 0) {
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
            $music[] = mysqli_fetch_array($result);
        }
        return $music;
    }

    return false;
}
?>