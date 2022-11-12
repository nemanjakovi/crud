<?php
session_start();
?>
<!doctype html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Your books</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/">
    <!-- Bootsrap javascript -->
    <script type="text/javascript" src="../../style/bootstrap.min.js"></script>

    <!-- Jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    <!-- Bootstrap  CSS -->
    <link href="../../style/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
</head>

<body>
    <?php
    if (isset($_SESSION["user_id"])) {
    } else {
        header("Location:../../login_sistem/login_form.php?error=sessionfaild");
    }
    ?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Books</title>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
        </symbol>

    </svg>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">



                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="../../index.php" class="nav-link px-2 text-white   ">Home</a></li>

                </ul>


                <div class="text-end">
                    <a href="../../login_sistem/sign_out.php">
                        <button type="button" class="btn btn-outline-secondary" style="margin-left: 30px;">Sign-out</button></a>
                </div>
            </div>
        </div>

    </header>
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
                                require_once "../../database/db.php";
                                $db = new Database();
                                $stmt = $db->connect()->prepare("SELECT
            books.book_title, 
            books.book_writer, 
            books.book_genre, 
            books.book_id,
            users.username  
            FROM books  
            LEFT JOIN users ON books.user_id = users.user_id WHERE users.username = '" . $_SESSION['username'] . "'");
                                if (!$stmt->execute()) {
                                    $stmt = null;
                                    // header("Location:../index.php?error=stmtFaild");
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

                                            <a href="../../main_page/personal_books/my_books_crud.php?delete=<?= $book["book_id"]; ?>">
                                                <button class="btn btn-danger btn-sm" name="delete_book">Delete Book</button>
                                            </a>
                                        </td>
                                    </tr>

                                <?php
                                    require "my_books_update.php";
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

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
require_once "my_books_form.php";
require_once "my_books_update.php";
