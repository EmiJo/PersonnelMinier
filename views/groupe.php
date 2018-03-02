<?php
include('header.php');
?>

<article role="articlegroupe">
    <header>
        <h1>Fiche du Groupe <?php echo $groupe['g_id'] ; ?></h1>
    </header>
    <?php
        if( isset( $groupeObj ) && is_object( $groupeObj ) && get_class( $groupeObj )=='Groupe' ) {
            echo 'Groupe n° : ' . $groupeObj->getId();
            echo '<br>Liste nains du groupe : <ul>';

            foreach( $nains as $nain ) {
                echo '<li><a href="index.php?c=nain&a=showOne&id=' . $nain['n_id'] . '" title="' . $nain['n_nom'] . '">' . $nain['n_nom'] . '</a></li>';
            }

            echo '</ul>' ;

            if( !is_null($groupe['t_id'] )) {
                echo '<br>Boivent dans la Taverne : <a href="index.php?c=taverne&a=showOne&id=' . $groupe['g_id'] .'"title=' . $groupe['t_nom'] .'"> ' . $groupe['t_nom'] . "</a>" ;
            } else {
                echo 'Les Nains de ce groupe ne boivent dans aucune taverne' ;
            }


           /* if( !is_null($groupeObj->getTaverne()->getNom() ) ) {
            echo '<br>Boit dans la taverne : <a href="index.php?c=taverne&a=showOne&id=' . $groupeObj->getTaverne()->getId() . '" title="' . $groupeObj->getTaverne()->getNom() . ' "> ' . $groupeObj->getTaverne()->getNom() . '</a>' ;
            }*/



            if( $tunnel['t_progres']==100) {
                $travail = 'Entretiennent ' ;
            } else {
                $travail= 'Creusent ' ;
            }

            echo '<br>' . $travail . 'de ' . $groupeObj->getDebuttravail() . ' à ' . $groupeObj->getFintravail() . ' le tunnel de <a href="index.php?c=ville&a=showOne&id=' . $tunnel['v_depart_id'] . '" title="' . $tunnel['v_depart'] . '">' . $tunnel['v_depart'] . '</a> à <a href="index.php?c=ville&a=showOne&id=' . $tunnel['v_arrivee_id'] . '" title="' . $tunnel['v_arrivee'] . '">' . $tunnel['v_arrivee'] . '</a> (fini à ' . $tunnel['t_progres'] . '%)';
        }
    ?>
</article>


    <hr>
    <?php
    if( isset( $_SESSION['message'] ) ) {
        echo $_SESSION['message'];
        unset( $_SESSION['message'] );
    }
    ?>

    <form action="index.php?c=groupe&a=modif&id=<?php echo $groupeObj->getId() ; ?>" method="post">
        <label for="hDeb"> Horaire de Début : </label>
        <input type="time" id="hDeb" name="hDeb" value="<?php echo $groupeObj->getDebuttravail(); ?>">
        <br>
        <label for="hFin"> Horaire de Fin : </label>
        <input type="time" id="hFin" name="hFin" value="<?php echo $groupeObj->getFintravail(); ?>">
        <br>
        <label for="tunnels">Affectez à un nouveau Tunnel : </label>
        <select id="tunnels" name="tunnel">
            <?php
           /*foreach ($tunnels as $tunnel) {
                if( $tunnel['t_id']==$groupeObj->getTunnel() ) {
                    echo '<option selected="selected">' . $tunnel['t_id'] . '</option>' ;
                } else {
                    echo  '<option>' . $tunnel['t_id'] . '</option>' ;
                }*/
            ?>
        </select>
        <br>
        <label for="tavernes">Affectez à une nouvelle Taverne : </label>
        <select id="groupes" name="groupe">
            <?php
            foreach( $tavernes as $taverne ) {
                if( $taverne['t_id']==$groupeObj->getTaverne() ) {
                    echo '<option selected="selected" value="' . $taverne['t_id'] . '">' . $taverne['t_nom'] . '</option>' ;
                } else {
                    echo '<option value="' . $taverne['t_id'] . '">' . $taverne['t_nom'] . '</option>' ;
                }
            }

            ?>
        </select>
        <br>
        <input type="submit" value="Modifier">
    </form>



<?php
include('footer.php');

