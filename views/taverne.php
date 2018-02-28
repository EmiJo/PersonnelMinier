<?php
include( 'header.php' );
?>

<article role="articletaverne">
    <header>
        <h1>Fiche de la Taverne</h1>
    </header>
    <?php
    if( isset( $taverneObj ) && is_object( $taverneObj ) && get_class( $taverneObj )=='Taverne' ) {
        echo 'Nom : ' . $taverneObj->getNom();
        echo '<br>Nombre de chambres : ' . $taverneObj->getChambres() ;
        echo '<br>Liste des bières proposées :<br>Blondes :' . $taverneObj->getBlonde() . '<br>Brunes :' . $taverneObj->getBrune() . '<br>Rousses :' . $taverneObj->getRousse() ;
        echo '<br>Se situe dans la ville de : ' . $taverneObj->getVille() ;
    }
    ?>
</article>

<?php
include( 'footer.php' );
?>