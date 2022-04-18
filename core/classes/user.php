<?php

class User
{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function checkInput($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripcslashes($data);
        return $data;
    }

    public function create($table, $fields = array())
    {
        $columns = implode(',', array_keys($fields));
        $values  = ':' . implode(', :', array_keys($fields));
        $sql     = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

        if ($stmt = $this->pdo->prepare($sql)) {
            foreach ($fields as $key => $data) {
                $stmt->bindValue(':' . $key, $data);
            }
            $stmt->execute();
            return $this->pdo->lastInsertId();
        }
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy();
        header('Location: ../index.php');
    }

    public function loggedIn()
    {
        return (isset($_SESSION['user_id'])) ? true : false;
    }

    public function login($email, $password)
    {
        $stmt = $this->pdo->prepare('SELECT `user_id` FROM `users` WHERE `email` = :email AND `password` = :password');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();
        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if ($count > 0) {
            $_SESSION['user_id'] = $user->user_id;
            header('Location: home.php');
        } else {
            return false;
        }
    }

    public function userData($user_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `users` WHERE `user_id` = :user_id');
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function uploadImage($file)
    {
        $filename   = $file['name'];
        $fileTmp    = $file['tmp_name'];
        $fileSize   = $file['size'];
        $errors     = $file['error'];

        $ext = explode('.', $filename);
        $ext = strtolower(end($ext));

        $allowed_extensions  = array('jpg', 'png', 'jpeg');

        if (in_array($ext, $allowed_extensions)) {

            if ($errors === 0) {

                if ($fileSize <= 2097152) {

                    $root = 'users/' . $filename;
                    move_uploaded_file($fileTmp, $_SERVER['DOCUMENT_ROOT'] . '/tw/' . $root);
                    return $root;
                } else {
                    $GLOBALS['imgError'] = "File Size is too large";
                }
            }
        } else {
            $GLOBALS['imgError'] = "Only alloewd JPG, PNG JPEG extensions";
        }
    }

    public function delete($table, $array)
    {
        $sql   = "DELETE FROM " . $table;
        $where = " WHERE ";

        foreach ($array as $key => $value) {
            $sql .= $where . $key . " = '" . $value . "'";
            $where = " AND ";
        }
        $sql .= ";";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function update($table, $post_id, $fields)
    {

        $columns = '';
        $i       = 1;

        foreach ($fields as $name => $value) {
            $columns .= "`{$name}` = :{$name} ";
            if ($i < count($fields)) {
                $columns .= ', ';
            }
            $i++;
        }

        $sql = "UPDATE {$table} SET {$columns} WHERE `postID` = {$post_id}";
        if ($stmt = $this->pdo->prepare($sql)) {
            foreach ($fields as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            $stmt->execute();
        }
    }
}
