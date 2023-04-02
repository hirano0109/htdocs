<?php
require_once('./dbconnect.php');

/**
 * Summary of UserLogic
 */
class UserLogic
{
    /**
     * ユーザを登録する
     * @param array $userData
     * @return bool $result
     */
    public static function createUser($userData){
        $result = false;
        $sql = 'INSERT INTO users (name,  password) VALUES (?, ?)';

    $arr = [];
    $arr[] = $userData['username'];
    // $arr[] = $userData['email'];
    $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);

    try {
    $stmt = connect()->prepare($sql);
    $result = $stmt->execute($arr);
    return $result;

    } catch(\Exception $e) {
        echo $e;
        return $result;
    }
}
}
