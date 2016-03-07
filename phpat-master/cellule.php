<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'cellule';
require_once 'common/_start.php';
require_once 'view_parts/_page_base.php';
?>
<main>
    <script>/* <![CDATA[ */
        /*
         |-----------------------------------------------------------------------
         |  jQuery Multiple Toggle Script, one at a time by Matt - www.skyminds.net
         |-----------------------------------------------------------------------
         |
         | Affiche et cache le contenu de blocs multiples. Bloc après le texte.
         | Un seul élément à la fois.
         |
         */
        jQuery(document).ready(function() {
            $(".more").hide();
            jQuery('.button-read-more').click(function () {
                // one at a time
                $('.more').hide();
                $('.less').removeClass('active');
                //
                $(this).closest('.less').addClass('active');
                $(this).closest(".less").next().stop(true).slideDown("1000");
            });
            jQuery('.button-read-less').click(function () {
                $(this).closest('.less').removeClass('active');
                $(this).closest(".less").next().stop(true).slideUp("1000");
            });
        });
        /* ]]> */ </script>



    <div id="team">

        <a href="#"><span id="pi">M'inscrire au registre</span></a>
        <section id="quote1">
            <h2 id="quoteprime">DONNEURS DE CELLULES SOUCHES</h2>
            <img src="images/317x153-trousse.jpg" alt="photo trousse" width="300" />
            <p id="pi2">Des centaines de malades au Sénégal comptent sur le Registre de donneurs de cellules souches pour trouver un donneur compatible.
                Vous pouvez peut-être les aider...</p>
            <a href="#"><span class="pi2">VOIR LA SECTION <img src="images/arrow_off.png" alt="photo de la petite fleche" CLASS="pi2"/></span></a>
        </section>
        <section id="quote2"
        ><h2 id="quotesecond">DONNEUSES DE SANG DE CORDON</h2>
            <img src="images/SC-317-153-3.jpg" alt="photo de poche de sang"  width="300" />
            <p id="pi3">Le sang provenant du cordon ombilical peut être recueilli après la naissance de votre enfant pour aider quelqu'un qui souffre d'une maladie grave.</p>
            <a href="#"><span class="pi3">VOIR LA SECTION<img src="images/arrow_off.png" alt="photo de la petite fleche" class="pi3"/></span></a>
        </section>
        <section id="quote3"><h2 id="quotethird">PROFESSIONNELS DE SANTE</h2>
            <img src="images/Dr-Reiter.jpg" alt="Docteur Femme" width="300"  />
            <p id="pi4">Le Centre National de Transfusion Sanguine fournit des cellules souches.
                Ses services comprennent l’ensemble des étapes liées à la demande de cellules souches : de la recherche jusqu’au don.</p>
            <a href="#"><span class="pi4">VOIR LA SECTION<img src="images/arrow_off.png" alt="photo de la petite fleche" class="pi4"/></span></a>
        </section>
    </div>
</main>
<?php
require_once 'view_parts/_page_bottom.php';
?>
