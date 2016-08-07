<?php

include './src/conn.php';
include './src/book.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET['id'])) {
        $sql = "SELECT `id` FROM `Books` WHERE `id` = " . $_GET['id'] . " ORDER BY `name` ASC";
        $result = $conn->query($sql);
            if (!$result){
                echo "Connection failure.";
                return false;
            } else {
                foreach($result as $book){
                    $newBook = new Book();
                    $newBook->loadFromDB($conn, $book['id']);
                }
                echo json_encode($newBook);
            }
    } else {
        $sql = "SELECT `id` FROM `Books` ORDER BY `name` ASC";
        $result = $conn->query($sql);
            if (!$result){
                echo "Connection failure.";
                return false;
            } else {
                $bookList = [];
                foreach($result as $book){
                    $newBook = new Book();
                    $newBook->loadFromDB($conn, $book['id']);
                    $bookList[] = $newBook;
                }
                echo json_encode($bookList) ;
            }
    }
}
