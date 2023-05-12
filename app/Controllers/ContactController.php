<?php

namespace App\Controllers;

use Database\Connection;
use App\Models\Contact;

class ContactController extends Controller
{
    private $table = "contacts";
    private $conn;

    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function index()
    {
        $contacts = array();
        $result = $this->conn->query("SELECT id, name, email, phone FROM  {$this->table}");


        while ($row = $result->fetch_assoc()) {
          $contact = new Contact($row['name'], $row['email'], $row['phone'], $row['id']);
          array_push($contacts, $contact);
        }

        // return $this->view('/contacts/index', ['contacts' => $contacts, 'mensaje' => 'index' ]);
        return $this->view('/contacts/index', ['contacts' => $contacts ]);

    }

    public function create()
    {
        return $this->view('/contacts/create');
    }

    public function store()
    {
        if (isset($_POST['form-contact'])) {

            $errores = [];

            $name = $this->sanitizeInput($_POST['name']);
            $email = $this->sanitizeInput($_POST['email']);
            $phone = $this->sanitizeInput($_POST['phone']);

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errores['error_email'] = 'email incorrecto';
            }

            if (empty($name) || empty($email) || empty($phone)) {
                $errores['error_valores'] = 'valores incorrectos';
            }


            if (empty($errores)) {
                $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email, phone) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $name, $email, $phone);
                $stmt->execute();
                

                header("location: /?mensaje=creado");
            } else {
                return $this->view('/contacs/create', $errores,);
            }
        }
    }

    public function show($id)  
    {

    }

    public function edit()
    {
        $id = $_GET['id'] ?? '';

        if (is_numeric($id)) {
            $stmt = $this->conn->query("SELECT id, name, email, phone FROM {$this->table} WHERE id=$id");
            $row = $stmt->fetch_assoc();
            $contact = new Contact($row['name'], $row['email'], $row['phone'], $row['id'],);

            if (isset($contact)) {
                return $this->view('/contacts/edit', ['contact' => $contact]);
            }else {
                header("location: /?mensaje=id no encontrado");
            }
        } else {
            header("location: /?mensaje=id incorrecto");
        }

    }

    public function update()
    {
        if (isset($_POST['form-edit'])) {

            $id = $_POST['id'] ?? '';
            $errores = [];

            $name = $this->sanitizeInput($_POST['name']);
            $email = $this->sanitizeInput($_POST['email']);
            $phone = $this->sanitizeInput($_POST['phone']);

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errores['error_email'] = 'email incorrecto';
            }

            if (empty($name) || empty($email) || empty($phone)) {
                $errores['error_valores'] = 'valores incorrectos';
            }

            if (is_numeric($id) && empty($errores)) {
                $stmt = $this->conn->prepare("UPDATE {$this->table} SET name=?, email=?, phone=? WHERE id=?");
                $stmt->bind_param("sssi", $name, $email, $phone, $id);
                $stmt->execute();
                header("location: /?mensaje=contacto actualizado");
    
            } else {
                header("location: /?mensaje=id incorrecto");
            }
        }
    }

    public function destroy()
    {
        if (isset($_POST['id']) && !empty($_POST["id"]) && is_numeric($_POST['id'])) {
            $id = $_POST['id'];

            $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            header("location: /?mensaje=eliminado");
        }
    }
}
