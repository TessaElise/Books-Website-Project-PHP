<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale-1, shrink-to-fit-no">
    <title><?= $viewModel['pageTitle']?></title>

    <link rel="stylesheet" href="css/layout.css" />
    <link rel="stylesheet" href="css/bootstrap-4.1.3.css" />

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-3">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?route=about">About</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php if (isset($viewModel['profile']) && $viewModel['profile']) {?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $viewModel['profile']['fullname']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="?route=logout">Logout</a>
                    </div>
                </li>

            <?php } else { ?>}

            <li class="nav-item active">
                <a class="nav-link" href="index.php?route=login">Login</a>
            </li>

            <?php } ?>
        </ul>
    </div>
</nav>

<div class="container">
    <?php if (isset($viewModel['errors']) && $viewModel['errors']) {
        $errorMessage = implode('<br />',$viewModel['errors']);
        ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $errorMessage; ?>
        </div>
    <?php } ?>

    <?php if (isset($viewModel['messages']) && $viewModel['messages']) {
        $message = implode('<br />',$viewModel['messages']);
        ?>

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $message; ?>
        </div>

    <?php } ?>
</div>
