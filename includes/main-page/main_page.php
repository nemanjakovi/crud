<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-book"></i>
                    <button type="button" class="btn btn-success btn-md " style="float: right" data-bs-toggle="modal" data-bs-target="#addbook">
                        Add Book
                    </button>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width=15%>N0</th>
                                <th width=15%>Book Title</th>
                                <th width=15%>Writer</th>
                                <th width=15%>Genre</th>
                                <th width=15%>Manage Books</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            include_once "database/db.php";
                            $db = new Database();

                            $stmt = $db->connect()->prepare("SELECT
                            books.book_title, 
                            books.book_writer, 
                            books.book_genre, 
                            books.book_id,
                            users.username  
                            FROM books 
                            LEFT JOIN users  ON books.user_id = users.user_id");
                            if (!$stmt->execute()) {
                                $stmt = null;
                                header("Location:../index.php?error=stmtFaild");
                                exit();
                            }
                            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($books as $book) {
                            ?>
                                <tr>

                                    <td><?= $book["book_id"]; ?></td>
                                    <td><?= $book["book_title"]; ?></td>
                                    <td><?= $book["book_writer"]; ?></td>
                                    <td><?= $book["book_genre"]; ?></td>


                                    <td><button class="btn btn-primary btn-sm edit">Update Book</button>

                                        <a href="main_page/crud.php?delete=<?= $book["book_id"]; ?>">
                                            <button class="btn btn-danger btn-sm" name="delete_book">Delete Book</button>
                                        </a>
                                    </td>
                                </tr>

                            <?php
                                include "update_book.php";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="update_book.php"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $(".edit").on("click", function() {
            $("#updateBook").modal("show");

            $tr = $(this).closest("tr");

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);

            $("#b_id").val(data[0]);
            $("#bt").val(data[1]);
            $("#bw").val(data[2]);
            $("#bg").val(data[3]);
        });
    });



    function addBook() {

        var book_title = $("#bt").val();
        var book_writer = $("#bw").val();
        var book_genre = $("#bg").val();
    }
</script>

<?php
require_once "book_form.php";
require_once "update_book.php";
