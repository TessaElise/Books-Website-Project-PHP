<?php

require_once __DIR__ . '/Components/header.php';

?>
<div class="container">

    <h1>Books</h1>

    <p>Overview of available books.</p>

    <table class="table mt-5">
        <thead class="thead-dark">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th class="d-none d-sm-table-cell">ISBN</th>
            <th class="d-none d-sm-table-cell">Price</th>
        </tr>
        </thead>
        <?php

        foreach ($viewModel['books'] as $book) {
            echo '<tr>
                    <td><a href="index.php?route=book&id=' . $book['id'] . '">' . $book['title'] . '</a></td>
                    <td>'. $book['authorName'] . '</td>
                    <td class="d-none d-sm-table-cell">'. $book['isbn'] . '</td>
                    <td class="d-none d-sm-table-cell">&euro; '. $book['price'] . '</td>
               </tr>';
        }

        ?>
    </table>
    <div class="mt-3">
        <a href="index.php?route=new-book" class="btn btn-success float-right">New Book</a></p>
        <br clear="all">
    </div>
</div>


    <?php

    require_once __DIR__ . '/Components/footer.php';

    ?>
