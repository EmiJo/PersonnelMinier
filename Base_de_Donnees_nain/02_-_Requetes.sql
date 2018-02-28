#1
SELECT * 
FROM `taverne` 
WHERE `t_brune`=1;

#2
SELECT * 
FROM `nain` 
WHERE `n_groupe_fk`=2;

#3
SELECT `g_debuttravail`,`g_fintravail` 
FROM `groupe` 
LEFT JOIN `nain` ON `g_id`=`n_groupe_fk` 
WHERE `n_id`=13;

SELECT `g_debuttravail`,`g_fintravail` 
FROM `groupe` 
LEFT JOIN `nain` ON `g_id`=`n_groupe_fk` 
WHERE `n_nom`="Kapabl";

#4
SELECT `nain`.* 
FROM `nain` 
INNER JOIN `groupe` ON `n_groupe_fk`=`g_id` 
INNER JOIN `taverne` ON `g_taverne_fk`=`t_id` 
WHERE `t_ville_fk`=1;

SELECT `nain`.* 
FROM `nain` 
INNER JOIN `groupe` ON `n_groupe_fk`=`g_id` 
INNER JOIN `taverne` ON `g_taverne_fk`=`t_id` 
WHERE `v_nom`="Svarkungor";

#5
SELECT `taverne`.*, `v_nom` 
FROM `taverne` 
INNER JOIN `ville` ON `t_ville_fk`=`v_id`;

#6
SELECT * 
FROM `nain` 
WHERE `n_groupe_fk` IS NULL;

#7
SELECT `nain`.* 
FROM `nain` 
INNER JOIN `ville` ON `n_ville_fk`=`v_id` 
INNER JOIN `taverne` ON `v_id`=`t_ville_fk` 
WHERE `t_id`=7;

SELECT `nain`.* 
FROM `nain` 
INNER JOIN `ville` ON `n_ville_fk`=`v_id` 
INNER JOIN `taverne` ON `v_id`=`t_ville_fk` 
WHERE `t_nom`="La bonne pioche";

# Si vous êtes certains de relier la même information, vous pouvez ignorer le schéma pour créer un nouveau lien virtuel ... un raccourci
SELECT `nain`.* 
FROM `nain` 
INNER JOIN `taverne` ON `n_ville_fk`=`t_ville_fk` 
WHERE `t_id`=7;

#8
SELECT `tunnel`.* 
FROM `tunnel` 
INNER JOIN `groupe` ON `tunnel`.`t_id`=`g_tunnel_fk` 
INNER JOIN `taverne` ON `g_taverne_fk`=`taverne`.`t_id` 
WHERE `t_blonde`=1 
GROUP BY `tunnel`.`t_id`;

SELECT DISTINCT `tunnel`.* 
FROM `tunnel` 
INNER JOIN `groupe` ON `tunnel`.`t_id`=`g_tunnel_fk` 
INNER JOIN `taverne` ON `g_taverne_fk`=`taverne`.`t_id` 
WHERE `t_blonde`=1;


#9
SELECT `taverne`.*, COUNT(`n_id`) AS `nbNains` 
FROM `taverne` 
LEFT JOIN `groupe` ON `t_id`=`g_taverne_fk` 
LEFT JOIN `nain` ON `n_groupe_fk`=`g_id` 
GROUP BY `t_id`;

#10
SELECT `taverne`.*, (`t_chambres` - COUNT(`n_id`)) AS `chambresLibres` 
FROM `taverne` 
LEFT JOIN `groupe` ON `t_id`=`g_taverne_fk` 
LEFT JOIN `nain` ON `g_id`=`n_groupe_fk` 
GROUP BY `t_id`;