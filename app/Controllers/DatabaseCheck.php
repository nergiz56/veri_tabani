<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DatabaseCheck extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        try {
            if ($db->connect()) {
                return "Database connection is successful!";
            }
        } catch (\Exception $e) {
            return "Database connection failed: " . $e->getMessage();
        }
    }
}