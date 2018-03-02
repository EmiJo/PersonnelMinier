<?php
include( 'header.php' );
?>

<article role="articletaverne">
    <header>
        <h1>Fiche de la Taverne <?php echo $taverne['t_nom'] ; ?></h1>
    </header>
    <?php
    if( isset( $taverneObj ) && is_object( $taverneObj ) && get_class( $taverneObj )=='Taverne' ) {
        echo 'Nom : ' . $taverne['t_nom'] ;
        echo '<br>Nombre de chambres : ' . $taverneObj->getChambres() ;
        echo '<br>Liste des bières proposées :<br>Blondes : ' . $taverneObj->getBlonde() . '<br>Brunes : ' . $taverneObj->getBrune() . '<br>Rousses : ' . $taverneObj->getRousse() ;
        echo '<br>Se situe dans la ville de : <a href="index.php?c=ville&a=showOne&id=' . $taverneObj->getVille()->getId() . '" title="'. $taverneObj->getVille()->getNom() .' "> ' . $taverneObj->getVille()->getNom() . '</a>' ;
    }
    ?>
</article>

<?php
include( 'footer.php' );
?>