<?php
include('header.php');
?>

<article role="articlenains">
    <header>
        <h1>Les Nains</h1>
    </header>
    <?php
        if( isset($nains) && is_array($nains) && count($nains)>0 ) {
            echo '<ul>' ;
            foreach( $nains as $nain ) {
            echo '<li><a href="index.php?c=nain&a=showOne&id=' . $nain['n_id'] . '" title="' . $nain['n_nom'] . '">' . $nain['n_nom'] . '</a></li>';
        }
            echo '</ul>' ;
        }
    ?>
</article>

<?php
include('footer.php');
?>