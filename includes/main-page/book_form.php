<?php
$book_title = "";
$book_year = "";
?>
<div class="modal fade" id="addbook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adding book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="add-book-form" method="POST" action="main_page/crud.php">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="BookTitle">Book Title</label>
                        <input type="text" name="bt" id="bt" class="form-control" require placeholder="Enter book Title">
                    </div>

                    <div class="form-group">
                        <label for="BookAuthor">Book Writer</label>
                        <input type="text" name="bw" id="bw" class="form-control" require placeholder="Enter book writer">
                    </div>


                    <div class="form-group">
                        <label for="BookGenre">Book Genre</label>
                        <select name="bg" id="bg" require class="form-control">
                            <option value=>Book Genre</option>
                            <?php
                            $book_genre = [
                                "Action", "Adventure", "Comedy", "Crime", "Classic", "Mystery",
                                "Fantasy", "Historical", "Horror", "Romance", "Satire", "Popular psihology", "Psihology",
                                "Science fiction", "Thriller", "Western", "Documentary", "Kids", "Drama"
                            ];
                            sort($book_genre);
                            foreach ($book_genre as $genre) {
                            ?>
                                <option><?= $genre; ?> </option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button onclick="addBook()" type="buttom" name="add_book" class="btn btn-primary" data-bs-dismiss="modal" id="add-book-btn">Add new book</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script>
    function addBook() {

        var book_title = $("#bt").val();
        var book_writer = $("#bw").val();
        var book_genre = $("#bg").val();

        $.ajax({
            url: "../index.php",
            type: "post",
            data: {
                title_send = book_title,
                writer_send = book_writer,
                genre_send = book_genre
            },
            success: function(data, status) {
                // function to displey data
                console.log(status);
            }
        })
    }
</script>