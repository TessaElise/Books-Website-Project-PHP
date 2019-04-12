<?php

require_once __DIR__ . '/Components/header.php';

?>

<div class="container">
    <h1>About</h1>
        <div class="row">
            <div class="col-12 col-xs-6 col-md-4">
                <img class="profile-image " src="images/tessa.jpg" alt="profielfoto Tessa Schel">
            </div>
            <ul class="col-12 col-xs-12 col-md-8 mt-3">
                <li >
                      Voornaam: <?= $viewModel['about']['voornaam']?>
                    </li>
                    <li>
                      Achternaam:  <?= $viewModel['about']['achternaam']?>
                    </li>
                    <li>
                      Functie:  <?= $viewModel['about']['functie']?>
                    </li>
                    <li>
                        Interesses:  <?php foreach ($viewModel['about']['interesses'] as $interesse) {
                                echo  "<li class='loop';>". "&nbsp"."&nbsp". $interesse. "</li>";
                            };

                            ?>
                    <li>
                         Favoriete boeken:  <?php foreach ($viewModel['about']['favorieteBookIds'] as $favorieteBookId) {
                           echo '<li class="loop">' . "&nbsp"."&nbsp".$viewModel['books'][$favorieteBookId]['title'] . ' geschreven door ' . $viewModel['books'][$favorieteBookId]['authorName'] . '</li>';


                           };

                           ?>
                    </li>
                 </ul>
                </div>

    <div class="mt-3">
        <a href="./" class="btn btn-light">Back</a>
    </div>
</div>
<?php

 require_once __DIR__ . '/Components/footer.php';

?>
