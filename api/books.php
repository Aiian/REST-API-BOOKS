<?php

include './src/conn.php';
include './src/book.php';

$book = new Book();

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    if (isset($_GET['id'])) {
        $sql = "SELECT `id` FROM `Books` WHERE `id` = " . $_GET['id'] . " ORDER BY `name` ASC";
        $result = $conn->query($sql);
            if (!$result){
                echo "Connection failure.";
                return false;
            } else {
                foreach($result as $data){
                    $book->loadFromDB($conn, $data['id']);
                }
                echo json_encode($book);
            }
    } else {
        $sql = "SELECT `id` FROM `Books` ORDER BY `name` ASC";
        $result = $conn->query($sql);
            if (!$result){
                echo "Connection failure.";
                return false;
            } else {
                $bookList = [];
                foreach($result as $data){
                    $book = new Book();
                    $book->loadFromDB($conn, $data['id']);
                    $bookList[] = $book;
                }
                echo json_encode($bookList) ;
            }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    sleep(0.5);
    
    function answer($result, $error = ''){
        echo json_encode([
            'result'=>$result,
            'error'=>$error
        ]);
        die();
    }
    
    $name = $_POST['name'];
    $author =$_POST['author'];
    $description = $_POST['description'];
    
    if (empty($name)){
        answer(false, 'Book title is empty.');
    }
    
    if (empty($author)){
        answer(false, 'Author not given.');
    }
    
    if (empty($description)){
        answer(false, 'Description not given.');
    }
    
    $result = $book->create($conn, $name, $author, $description);
    answer($result);
    
    
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    
    sleep(0.5);
    
    parse_str(file_get_contents("php://input"),$del_vars); 
    $id = $del_vars['id'];

    function answer($result){
        echo json_encode([
            'result'=>$result,
        ]);
        die();
    }
    
    $book->loadFromDB($conn, $id);
    $result = ($book->deleteFromDB($conn));

    answer($result);
}