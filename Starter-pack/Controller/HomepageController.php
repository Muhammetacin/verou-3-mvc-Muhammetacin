<?php
declare(strict_types = 1);

class HomepageController
{
    public function index()
    {
        // Usually, any required data is prepared here
        // For the home, we don't need to load anything

        // Load the view
        require 'View/home.php';
    }
}