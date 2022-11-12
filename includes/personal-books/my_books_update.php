<div class="modal fade" id="updateBook" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="add-book-form" method="POST" action="../../main_page/personal_books/my_books_crud.php">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="b_id" id="b_id" class="form-control">

                    </div>

                    <div class="form-group">
                        <label for="BookTitle">Book Title</label>
                        <input type="text" name="bt" id="bt" class="form-control" require placeholder="Enter book Title">
                    </div>

                    <div class="form-group">
                        <label for="BookAuthor">Book writer</label>
                        <input type="text" name="bw" id="bw" class="form-control" require placeholder="Enter book writer">
                    </div>


                    <div class="form-group">
                        <label for="BookGenre">Book Genre</label>
                        <select name="bg" id="bg" class="form-control">
                            <option value=>Book Genre</option>
                            <?php
                            $book_genre = [
                                "Action", "Adventure", "Comedy", "Crime", "Mystery",
                                "Fantasy", "Historical", "Horror", "Romance", "Satire",
                                "Science fiction", "Thriller", "Western", "Documentary", "Kids", "Drama"
                            ];
                            sort($book_genre);
                            foreach ($book_genre as $genre) {
                            ?>
                                <option><?= $genre; ?> </option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="buttom" name="update_book" class="btn btn-primary" data-bs-dismiss="modal" id="add-book-btn">Update book</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- </div>
</div>
</div> -->