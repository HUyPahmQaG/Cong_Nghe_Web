<?php
class StudentModel {
    private $conn;
    private $table = "sinhvien";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
    $sql = "SELECT id, ten_sinh_vien AS ten, email, created_at FROM sinhvien ORDER BY id ASC";
    $stmt = $this->conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function getById($id) {
        $sql = "SELECT * FROM sinhvien WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([ ':id' => $id ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($ten, $email) {
        $sql = "INSERT INTO sinhvien (ten_sinh_vien, email) VALUES (:ten, :email)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':ten' => $ten,
            ':email' => $email
        ]);
    }

    public function update($id, $ten, $email) {
        $sql = "UPDATE sinhvien SET ten_sinh_vien = :ten, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':ten' => $ten,
            ':email' => $email,
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM sinhvien WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
