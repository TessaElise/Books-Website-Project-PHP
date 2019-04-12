<?php

require_once __DIR__ . '/Components/header.php';

?>

    <div class="container new-book">
        <h1><?php echo $viewModel['pageTitle'] ?></h1>

        <form method="post" action="index.php?route=edit-book&id=<?= $viewModel['book']['id'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value= "<?= $viewModel['book']['title'] ?>" class="form-control" /><br />
                    </div>
                    <div class="form-group">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle" value= "<?= $viewModel['book']['subtitle'] ?>" class="form-control" /><br />
                    </div>
                    <div class="form-group">
                        <label for="author_id">Author</label>
                        <select name="publisher_id" id="publisher_id" class="form-control">
                            <?php
                            foreach ($viewModel['authors'] as $author){

                                $selected = ($author['id'] === $viewModel['book']['author_id'] ) ? 'selected' : '';

                                /*
                              '/  if ($viewModel['book']['author_id'] === $author['id']) {
                                    $selected = 'selected';
                                echo '<option value="' . $author['id'] . '" . $selected>' . $author['name'] . '</option>';
                            } else { */
                                echo '<option value="' . $author['id'] . '" ' . $selected . '>' . $author['name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div><br />

                    <div class="form-group">
                        <label for="publisher_id">Publisher</label>
                        <select name="publisher_id" id="publisher_id" class="form-control">
                            <?php
                            foreach ($viewModel['publishers'] as $publisher){
                                if ($viewModel['book']['publisher_id'] === $publisher['id']) {
                                    echo '<option value="' . $publisher['id'] . '" selected>' . $publisher['name'] . '</option>';
                                    } else {
                                        echo '<option value="' . $publisher['id'] . '">' . $publisher['name'] . '</option>';
                                    }
                            }
                            ?>
                        </select>
                    </div><br />

                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" name="isbn" id="isbn" value= "<?= $viewModel['book']['isbn'] ?>" class="form-control" /><br />
                    </div>
                    <div class="form-group">
                        <label for="pages">Pages</label>
                        <input type="text" name="pages" id="pages" value= "<?= $viewModel['book']['pages'] ?>" class="form-control" /><br />
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" value= "<?= $viewModel['book']['price'] ?>" class="form-control" /><br />
                    </div>
                    <div class="form-group">
                        <label for="image">Image filename</label>
                        <input type="text" name="image" id="image" value= "<?= $viewModel['book']['image'] ?>" class="form-control" /><br />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control"><?= $viewModel['book']['description'] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <a href="./" class="btn btn-light">Back</a>
                <div class="float-right">
                    <input type="submit" class="btn btn-success" value="Save Book" />
                </div>
            </div>

            <br clear="all" />
        </form>

    </div>
<?php

require_once __DIR__ . '/Components/footer.php';

?>