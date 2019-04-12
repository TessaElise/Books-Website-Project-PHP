
<?php

require_once __DIR__ . '/Components/header.php';

?>

<div class="container">

    <div class="alert alert-success">
        <?= $viewModel['successMessage'] ?>
    </div>

    <h1 class="detail "><?php echo $viewModel['book']['title'] ?></h1>

    <div class="subtitle"><?php echo $viewModel['book']['subtitle'] ?></div>
    <div class="details row mt-3">
        <div class="col-12 col-sm-6 col-md-3">
            <img class="img" src="images/<?php echo $viewModel['book']['image'] ?>"/>
        </div>
        <div class="col-12 col-sm-6 col-md-3 mt-3 mt-sm-0">
            <div class="form-group">
                <label>
                    ISBN
                </label>
                <?php echo $viewModel['book']['isbn'] ?>
                <p></p>
            </div>

            <div class="form-group">
                <label>
                    author
                </label>
                <?php echo $viewModel['book']['authorName'] ?>
                <p></p>
            </div>

            <div class="form-group">
                <label>
                    Publisher
                </label>
                <?php echo $viewModel['book']['publisherName'] ?>
                <p></p>
            </div>

            <div class="form-group">
                <label>
                    Pages
                </label>
                <?php echo $viewModel['book']['pages'] ?>
                <p></p>
            </div>

            <div class="form-group">
                <label>
                    Price
                </label>
                <?php echo $viewModel['book']['price'] ?>
                <p></p>
            </div>

        </div>
        <div class="detail description col-12 col-sm-12 col-md-6">
            <?php echo $viewModel['book']['description'] ?>
        </div>

    </div>

    <div class="mt-3">
        <a href="./" class="btn btn-light">Back</a>
        <div class="btn float-right">
            <form action="index.php?route=delete-book&id=<?= $viewModel['book']['id'] ?>" method="post" onSubmit="return window.confirm('Are you sure you want to delete this book?')">
                <a href="#" class="btn btn-success">Add to cart</a>
                <a href="index.php?route=edit-book&id=<?= $viewModel['book']['id'] ?>" class="btn btn-success">Edit book </a>
                <input type="submit" class="btn btn-danger" value="Delete Book"/>
            </form>
        </div>
    </div>
</div>
<?php

require_once __DIR__ . '/Components/footer.php';

?>