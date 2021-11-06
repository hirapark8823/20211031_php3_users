<?php

function connect_to_db()
{
    $dbn = 'mysql:dbname=gsacf_09_04;charset=utf8;
          port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}

function exec_query($stmt)
{
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        exit('sql error：' . $e->getMessage());
    }
}
