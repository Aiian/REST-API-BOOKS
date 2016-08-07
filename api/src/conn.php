<?php

$conn = new mysqli('localhost', 'root', 'coderslab', 'books_db');
    
if ($conn->connect_error) {
    die("Polaczenie nieudane. Blad: " . $conn->connect_error);
}