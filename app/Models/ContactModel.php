<?php

namespace App\Models;

use Database\mysqli\Connection;

class ContactModel 
{
    private $conn;
    private $table = 'contacts';

    public function __construct()
    {
        $this->conn = new Connection();
    }

    public function getAll()
    {
        $result = $this->conn->query("SELECT id, name, email, phone FROM  {$this->table}");
        
        $contacts = array();

        while ($row = $result->fetch_assoc()) {
          $contact = new Contact($row['name'], $row['email'], $row['phone'], $row['id']);
          array_push($contacts, $contact);
        }

        return $contacts;
    }

    public function getById($id)
    {
        $stmt = $this->conn->query("SELECT id, name, email, phone FROM {$this->table} WHERE id=$id");
        $row = $stmt->fetch_assoc();
        $contact = new Contact($row['name'], $row['email'], $row['phone'], $row['id'],);
        return $contact;
    }
    public function create($contact)
    {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $contact->name, $contact->email, $contact->phone);
        $stmt->execute();
    }

    public function update($contact)
    {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name=?, email=?, phone=? WHERE id=?");
        $stmt->bind_param("sssi", $contact->name, $contact->email, $contact->phone, $contact->id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
    

}