<?php

namespace App\Controllers;

use App\Models\Contact;
use App\Models\ContactModel;

class ContactController extends Controller
{
    private $model;

    public function __construct() {
        $this->model = new ContactModel();
    }

    public function index()
    {
        $contacts = $this->model->getAll();

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
                $contact = new Contact($name, $email, $phone);
                $this->model->create($contact);
                header("location: /?mensaje=Contacto creado");
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
            $contact = $this->model->getById($id);

            if (isset($contact)) {
                return $this->view('/contacts/edit', ['contact' => $contact]);
            } else {
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
                $contact = new Contact($name, $email, $phone, $id);
                $this->model->update($contact);
                header("location: /?mensaje=Contacto actualizado");
            } else {
                header("location: /?mensaje=id incorrecto");
            }
        }
    }

    public function destroy()
    {
        if (isset($_POST['id']) && !empty($_POST["id"]) && is_numeric($_POST['id'])) {
            $id = $_POST['id'];

            $this->model->delete($id);
            header("location: /?mensaje=Contacto eliminado");
        }
    }
}
