<?php

namespace App\Models;

class Contact
{
    public $id;
    public $name;
    public $email;
    public $phone;

    public function __construct($name, $email, $phone, $id=null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->id = $id;
    }

}