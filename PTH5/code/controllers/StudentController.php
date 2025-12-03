<?php
class StudentController {
    private $model;

    public function __construct($db) {
        require_once "./models/StudentModel.php";
        $this->model = new StudentModel($db);
    }

    public function index() {
        $students = $this->model->getAll();
        require "./views/student/list.php";
    }

    public function addForm() {
        require "./views/student/add.php";
    }

    public function add() {
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $this->model->add($ten, $email);
        header("Location: index.php");
    }

    public function editForm() {
        $id = $_GET['id'];
        $student = $this->model->getById($id);
        require "./views/student/edit.php";
    }

    public function update() {
        $id = $_POST['id'];
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $this->model->update($id, $ten, $email);
        header("Location: index.php");
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header("Location: index.php");
    }
}
