<?php
include('header.php');
?>
<article role="articlevilles">
    <header>
        <h1>Les Villes</h1>
    </header>
    <?php
        if( isset($villes) && is_array($villes) && count($villes)>0 ) {
            echo '<ul>' ;
            foreach( $villes as $ville ) {
            echo '<li><a href="index.php?c=ville&a=showOne&id=' . $ville['v_id'] . '" title="' . $ville['v_nom'] . '">' . $ville['v_nom'] . '</a></li>';
        }
            echo '</ul>' ;
        }
    ?>
</article>

<?php
include('footer.php');
?>