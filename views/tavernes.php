<?php
include('header.php');
?>
<article role="articletavernes">
    <header>
        <h1>Les Tavernes</h1>
    </header>
    <?php
    if( isset( $tavernes ) && is_array( $tavernes ) && count( $tavernes )>0 ) {
        echo '<ul>';
        foreach( $tavernes as $taverne ) {
            echo '<li><a href="index.php?c=taverne&a=showOne&id=' . $taverne['t_id'] . '" title="' . $taverne['t_nom'] . '">' . $taverne['t_nom'] . '</a></li>';
        }
        echo '</ul>';
    }
    ?>
</article>

<?php
include('footer.php');
?>