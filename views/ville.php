<?php
include( 'header.php' );
?>
<article role="article">
    <header>
        <h1>Fiche de la ville <?php echo $villeObj->getNom() ; ?></h1>
    </header>
     <?php
        if( isset($villeObj) && is_object($villeObj) && get_class($villeObj)=='Ville' ) {
            echo 'Nom : ' . $villeObj->getNom();
            echo '<br>Superficie : ' . $villeObj->getSuperficie() . ' km².' ;

            echo '<br>Liste des nains originaires de cette ville : <ul>';
            foreach( $nains as $nain ) {
                echo '<li><a href="index.php?c=nain&a=showOne&id=' . $nain['n_id'] . '" title="' . $nain['n_nom'] . '">' . $nain['n_nom'] . '</a></li>';
            }
            echo '</ul>';
            echo '<br>Liste des tavernes de la ville : <ul>';
            foreach( $tavernes as $taverne ) {
                echo '<li><a href="index.php?c=taverne&a=showOne&id=' . $taverne['t_id'] . '" title="' . $taverne['t_nom'] . '">' . $taverne['t_nom'] . '</a></li>';
            }
            echo '</ul>';
            echo '<br>Liste des tunnels de la ville : <ul>';
            foreach( $tunnels as $tunnel ) {
                if( $tunnel['v_depart']==$villeObj->getNom() ) {
                    $ville = $tunnel['v_arrivee'];
                    $id_ville = $tunnel['v_arrivee_id'];
                } else {
                    $ville = $tunnel['v_depart'];
                    $id_ville = $tunnel['v_depart_id'];
                }

                if( $tunnel['t_progres']==100 ) {
                    echo '<li>Tunnel vers <a href="index.php?c=ville&a=showOne&id=' . $id_ville . '" title="' . $ville . '">' . $ville . '</a> : Ouvert</li>';
                } else {
                    echo '<li>Tunnel vers <a href="index.php?c=ville&a=showOne&id=' . $id_ville . '" title="' . $ville . '">' . $ville . '</a> : ' . $tunnel['t_progres'] . '%</li>';
                }
            }
            echo '</ul>';
        }
    ?>
</article>

<?php
include( 'footer.php' );
?>