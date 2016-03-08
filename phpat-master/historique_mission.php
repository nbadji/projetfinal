<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'historique_mission';
require_once 'common/_start.php';
require_once 'view_parts/_page_base.php';
?>
<head>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js'></script>
</head>
<script>/* <![CDATA[ */
    jQuery(document).ready(function() {
        $(".more").hide();
        jQuery('.button-read-more').click(function () {
            $(this).closest('.less').addClass('active');
            $(this).closest(".less").prev().stop(true).slideDown("1000");
        });
        jQuery('.button-read-less').click(function () {
            $(this).closest('.less').removeClass('active');
            $(this).closest(".less").prev().stop(true).slideUp("1000");
        });
    });

</script>
<main>


    <section id="section2">
        <div id="section1div">
            <img class="fleche" src="images/images%20(9).jpg" alt="image d'une fleche rouge">
            <strong>Historique et missions du centre</strong>
            <p>À Dakar , en 1943, un centre de récolte de sang est créé pour approvisionner en plasma pour approvisionner les troupes francaises.Cette tache est attribuée à l'intérieur pasteur de Dakar jusqu'en 1950.Initialement aux services des unités militaires, ce centre devient rapidement pourvoyeur des besoins civils.</p>
            <p>En Aout 1950, Le Rouzic, directeur de la santé publique en AOF décide de créer à Dakar un Centre Fédérel de Transfusion Sanguine .inauguré le 15 Avril 1951.La direction en est confiér à Linhard,biologiste des hopitaux coloniaux. Avec des installations très modernes ,ce centre s'avère rapidement performant.Dans les six premiers mois d'exercices en 1951,1936 donneurs sont inscrits dont les deux tiers sont africains et 3500 prélévements sont effectués.</p>
            <div class="toggle">
                <div class="more">
                    <p>Les produits délivrés consistent en sang entier dit "sang rouge" et en plasma, liquide ou sec.Tous les quinze jours, une douzaine de centre hospitalier d'AOF d'AOF et du Cameroun recoivent livraison de sang et de plasma en coffres isothermes, par train ou avion.Outreces expéditions fixes, des livraisons supplémentaires sont assurées en cas de besoin.</p>
                    <p>Aprés l'indépendance, le centre devient national et sénégalais.Il se modernise et s'agrandit.D'autres capitales,comme Abidjan,créent leur propre établissements.De plusieurs Etats d'Afrique, des médecins autochtones viennent se spécialiser à Dakar.</p>
                    <p>Au Sénégal meme, <em>le centre national de transfusion saguine(CNTS)de Dakar poursuit son Développement.</em>En 1972,il totalise 12622 donneurs.Chaque semaine, les hopitaux de l'intérieur sont approvisionnés en sang et plasma.Trois banques de sang suppléent le CNTS,l'une à l'hopital Principal de Dakar, les autres à Saint-Louis et Diourbel.Le seul probléme est le cout élevé du fonctionnement de ce type d'établissement à la charge des budgets nationaux.</p>
                    <p>Au fur et mesure que la santé se développe dans le pays,il a été créé treize banques de sang périphériques pour satisfaire aux besoins en sang de dérivés sanguins des stuctures sanitaires publiques et privées.Ces banques de sang périphériques sont placées sous la tutelle technique du CNTS par arreté n°004949/MSP du 04 Mai 1985.À la faveur de la réforme hospitaliére par loi 98.98 du Février 1998,le CNTS est devenu unétablissement public de Santé(loi 98.02 de Février 1998, article20).
                    </p>
                    <div id="mission">
                        <p>C est ainsi que le CNTS s'est forgé comme missions:</p>
                        <ul>
                            <li>collecter, traiter et distribuer le sang et ses dérivés sur toute l'étendu du territoire national;</li>
                            <li>superviser et centraliser l'ensemble des données techniques et administratives des banques de sang placées sous sa tutelle;</li>
                            <li>appliquer la politique gouvernementale en matière de transfusion sanguine</li>
                            <li>veiller à la mise en oeuvre du prograame d'assurance qualité et de sécuroté en matière de transfusion sanguine;</li>
                            <li>assurer la prise en charge des donneurs,de certaines maladies du sang nécessitant une hémothérapie;</li>
                            <li>developper la formation et la recherche en transfusion;</li>
                            <li>améliorer la santé des populations par des prestations de quqlité et des actions d'information,d'éducation et de communication.</li>
                        </ul>
                    </div>

                </div>

                <div class="less">
                    <a class="button-read-more button-read" class="button-read-less button-read" href="#read"><img src="images/images11.png"alt="en savoir plus sur L'historique du cnts et sa mission"></a>

                </div>
            </div>

    </section>
    <div id="container">





        <section id="accordion">
            <img class="fleche" src="images/images%20(9).jpg" alt="image d'une fleche rouge">
            <p id="cond">Conditions à respecter pour un don de sang </p>

            <div>
                <input type="checkbox" id="check-1" />
                <label for="check-1">
                    <h2>Être âgé de 18 à 60 ans</h2></label>
                <article>
                    <ul>
                       <li> Après 60 ans, le don est soumis à l'approbation d'un médecin de collecte de l'EFS. Pour un don de plasma ou de plaquettes, il faut être âgé de 18 à 65 ans.</li>
                    </ul>
                </article>
            </div>
            <div>
                <input type="checkbox" id="check-2" />
                <label for="check-2"><h2>Ne pas être à jeun</h2></label>
                <article>
                    <ul>
                        <li>Le don du sang est plutôt conseillé après une collation.  </li>

                    </ul>
                </article>
            </div>
            <div>
                <input type="checkbox" id="check-3" />
                <label for="check-3"><h2>Être en forme</h2></label>
                <article>
                    <ul>
                        <li>Il est préférable de faire un don du sang quand on est en forme. </li>
                    </ul>
                </article>
            </div>
            <div>
                <input type="checkbox" id="check-4" />
                <label for="check-4"><h2>Peser au minimum 50 kilos</h2></label>
                <article>
                    <ul>

                    </ul>
                </article>
            </div>
            <div>
                <input type="checkbox" id="check-5" />
                <label for="check-5"><h2>Ne pas être enceinte</h2></label>
                <article>
                    <ul>
                        <li>Ne pas avoir accouché au cours des 6 derniers mois.  </li>

                    </ul>
                </article>
            </div>
            <div>
                <input type="checkbox" id="check-6" />
                <label for="check-6"><h2>Antibiotiques et infections</h2></label>
                <article>
                    <ul>
                        <li>Il est également important de nee pas avoir pris d'antibiotique au cours des 2 dernières semaines, ni d'avoir eu d'infection au cours des 6 derniers jours (angine, bronchite, fièvre, rhino... ). </li>


                    </ul>
                </article>
            </div>
            <div>
                <input type="checkbox" id="check-7" />
                <label for="check-7"><h2>Absence d'intervention chirurgicale</h2></label>
                <article>
                    <ul>
                        <li>Ne pas avoir subi une intervention chirurgicale au cours des 4 derniers mois. </li>


                    </ul>
                </article>
            </div>
            <div>
                <input type="checkbox" id="check-8" />
                <label for="check-8"><h2>Relations sexuelles</h2></label>
                <article>
                    <ul>
                        <li>Ne jamais avoir eu de relations sexuelles homosexuelles. Ne pas avoir eut de rapports sexuels avec un nouveau partenaire au cours des 4 mois précédant le don. </li>

                    </ul>
                </article>
            </div>
            <div>
                <input type="checkbox" id="check-9" />
                <label for="check-9"><h2>Délai de 8 semaines entre 2 dons de sang</h2></label>
                <article>
                    <ul>
                        <li>Un délai de 8 semaines minimum est nécessaire entre 2 dons de sang total. </li>

                    </ul>
                </article>
            </div>
            <div>
                <input type="checkbox" id="check-10" />
                <label for="check-10"><h2>Prise de médicaments</h2></label>
                <article>
                    <ul>
                        <li>l est conseillé de respecter un délai de quatorze jours après la fin d'un traitement médicamenteux (antibiotiques, corticoïdes en comprimés...). </li>



                    </ul>
                </article>
            </div>


</main>
<?php
require_once 'view_parts/_page_bottom.php';
?>
