<?php
include('header.php');
?>
<article role="articlenain">
    <header>
        <h1>Fiche du nain <?php echo $nainObj->getNom() ; ?></h1>
    </header>
    <?php
        if( isset($nainObj) && is_object($nainObj) && get_class($nainObj)=='Nain' ) {
            echo 'Nom : ' . $nainObj->getNom();
            echo '<br>Taille de barbe : ' . $nainObj->getBarbe() . ' cm' ;
            echo '<br>Originaire de la ville de <a href="index.php?c=ville&a=showOne&id=' . $nainObj->getVille()->getId() . '" title="'. $nainObj->getVille()->getNom() .' "> ' . $nainObj->getVille()->getNom() . '</a>' ;


            if( !is_null($nainObj->getGroupe()->getTaverne()->getNom() ) ) {
            echo '<br>Boit dans la taverne : <a href="index.php?c=taverne&a=showOne&id=' . $nainObj->getGroupe()->getTaverne()->getId() . '" title="' . $nainObj->getGroupe()->getTaverne()->getNom() . ' "> ' . $nainObj->getGroupe()->getTaverne()->getNom() . '</a>' ;
            }

            if( !is_null($nainObj->getGroupe()->getTunnel()->getId() )) {
            echo '<br>Travaille de ' . $nainObj->getGroupe()->getDebuttravail() . ' à ' . $nainObj->getGroupe()->getFintravail()  . 'dans le tunnel de <a href="index.php?c=ville&id=' . $nainObj->getGroupe()->getTunnel()->getVilledepart()->getId() .'title='  ;
            }

            if( !is_null( $nainObj->getGroupe()->getTunnel()->getId() ) ) {
                echo '<br>Travaille de ' . $nainObj->getGroupe()->getDebuttravail() . ' à ' . $nainObj->getGroupe()->getFintravail() . ' dans le tunnel de <a href="index.php?c=ville&a=showOne&id=' . $nainObj->getGroupe()->getTunnel()->getVilledepart()->getId() . '" title="' . $nainObj->getGroupe()->getTunnel()->getVilledepart()->getNom() . '">' . $nainObj->getGroupe()->getTunnel()->getVilledepart()->getNom() . '</a> à <a href="index.php?c=ville&a=showOne&id=' . $nainObj->getGroupe()->getTunnel()->getVillearrivee()->getId() . '" title="' . $nainObj->getGroupe()->getTunnel()->getVillearrivee()->getNom() . '">' . $nainObj->getGroupe()->getTunnel()->getVillearrivee()->getNom() . '</a>';
            }

            if( !is_null( $nainObj->getGroupe()->getId() ) ) {
                echo '<br>Membre du <a href="index.php?c=groupe&a=showOne&id=' . $nainObj->getGroupe()->getId() . '" title="Groupe n° ' . $nainObj->getGroupe()->getId() . '">groupe numéro ' . $nainObj->getGroupe()->getId() . '</a>';
            } else {
                echo '<br>Membre d\'aucun groupe';
            }
        }
    ?>
</article>
<aside>
    <hr>
    <?php
        if(isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']) ;
        }
    ?>
    <form action="index.php?c=nain&a=modif&id=<?php echo $nainObj->getId() ; ?>" method="post">
        <label for="groupes"> Affectez a un nouveau groupe : </label>
        <select id="groupes" name="groupe">
            <?php
            foreach ($groupes as $groupe) {
                if( $groupe['g_id']==$nainObj->getGroupe()->getId() ) {
                    echo '<option selected="selected">' . $groupe['g_id'] . '</option>' ;
                 } else {
                    echo '<option>' . $groupe['g_id'] . '</option>';
                }
            }
            ?>
        </select>
        <input type="submit" value="Affecter">
    </form>
</aside>

<?php
include('footer.php');
?>
