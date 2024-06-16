<?php
include_once(__DIR__ . DIRECTORY_SEPARATOR . "../classes/Db.php");

class User {
    private $db;

    public function __construct() {
        $this->db = Db::getConnection();
    }

    public function getEmailByEmail($email) {
        $stmt = $this->db->prepare('SELECT email FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetchColumn();
    }
}
?>
