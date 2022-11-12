<?php
session_start();
if (require_once "../../database/db.php") {
}
// $session_id = $_SESSION["id"];

$db = new Database();
//Adding books
if (isset($_POST["add_book"])) {

    $book_title = $_POST["bt"];
    $book_writer = $_POST["bw"];
    $book_genre = $_POST["bg"];
    // '" . $_SESSION['username'] . "'

    $stmt = $db->connect()->prepare("INSERT INTO books (book_title, book_writer, book_genre, user_id) VALUES (?, ? ,?, ?);");
    if (!$stmt->execute(array($book_title, $book_writer, $book_genre, $_SESSION["user_id"]))) {
        $stmt = null;
        header("Location:my_books_main_page.php?error=InsertStmtFaild");
    }
    header("Location:../../includes/personal-books/my_books_main_page.php?bookAddedSuccessfully");
}

//Updating book

if (isset($_POST["update_book"])) {


    $book_title  =  $_POST["bt"];
    $book_writer =  $_POST["bw"];
    $book_genre  =  $_POST["bg"];
    $book_id     =  $_POST["b_id"];

    $stmt = $db->connect()->prepare("UPDATE books 
     SET  book_title =   ?, 
          book_writer = ?,
          book_genre =  ? 
          WHERE book_id = ? ");

    if (!$stmt->execute(array($book_title, $book_writer, $book_genre, $book_id))) {
        $stmt = null;
        header("Location:my_books_crud.php?error=updateStmtFail");
        exit();
    }
    header("Location:../../includes/personal-books/my_books_main_page.php?Record-update-successfully");
}


// Deleteing books
if (isset($_GET['delete'])) {

    $id = $_GET["delete"];
    $stmt = $db->connect()->prepare("DELETE FROM books WHERE book_id=" . $id);

    if (!$stmt->execute()) {
        $stmt = null;
        header("Location:my_books_crud.php?error=deleteStmtFail");
        exit();
    } else {
        header("Location:../../includes/personal-books/my_books_main_page.php?Record-deleted-successfully");
    }
}
