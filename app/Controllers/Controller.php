<?php

namespace App\Controllers;

class Controller
{
    public function view($route, $data = [])
    {

        // echo "<pre>";
        // var_dump($data);
        // echo "</pre>";

        //Desestructurar el array
        extract($data);
        
        $route = str_replace('.', '/', $route);

        if (file_exists("../resources/views/{$route}.php")) {


            ob_start();
            include "../resources/views/{$route}.php";
            $content = ob_get_clean();
            return $content;

        } else {
            return "El archivo no existe";
        }
    }

    public function sanitizeInput($input) {
        $input = trim($input);
        $input = strip_tags($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
}
