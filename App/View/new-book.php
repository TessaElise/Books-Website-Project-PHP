<?php

require_once __DIR__ . '/Components/header.php';

?>

<div class="container new-book">
    <h1><?php echo $viewModel['pageTitle'] ?></h1>
    <p>Add your new book below.</p>

    <form method="post" action="index.php?route=new-book">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required /><br />
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control" /><br />
                </div>
                <div class="form-group">
                    <label for="author_id">Author</label>
                    <select name="author_id" id="author_id" class="form-control">
                        <?php
                        foreach ($viewModel['authors'] as $author) {
                            echo '<option value="' . $author['id'] . '">' . $author['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div><br />
                <div class="form-group">
                    <label for="publisher_id">Publisher</label>
                    <select name="publisher_id" id="publisher_id" class="form-control">
                        <?php
                        foreach ($viewModel['publishers'] as $publisher){

                            echo '<option value="' . '<selected>' . $publisher['id'] . '">'. $publisher['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div><br />
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="form-control" pattern="\d{10} required"/><br />
                </div>
                <div class="form-group">
                    <label for="pages">Pages</label>
                    <input type="number" name="pages" id="pages" class="form-control" min="1" max="9999" required /><br />
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" id="price" class="form-control" /><br />
                </div>
                <div class="form-group">
                    <label for="image filename">Image filename</label>
                    <input type="text" name="image filename" id="image filename" class="form-control" /><br />
                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
            </div>
        </div>


        <div class="mt-3">
            <a href="./" class="btn btn-light">Back</a>
            <input type="submit" class="btn btn-success float-right" value=" Add book" />
        </div>
    </form>
</div>
<?php

require_once __DIR__ . '/Components/footer.php';

?>