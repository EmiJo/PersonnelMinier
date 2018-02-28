<?php
include('header.php');
?>
<article role="articlegroupes">
    <header>
        <h1>Les Groupes</h1>
    </header>
            <?php
        if( isset($groupes) && is_array($groupes) && count($groupes)>0 ) {
            echo '<ul>' ;
            foreach( $groupes as $groupe ) {
            echo '<li><a href="index.php?c=groupe&a=showOne&id=' . $groupe['g_id'] . '" title="' . $groupe['g_id'] . '">' . $groupe['g_id'] . '</a></li>';
        }
            echo '</ul>' ;
        }
    ?>
</article>

<?php
include('footer.php');
?>