<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Contact';
require_once 'common/_start.php';
require_once 'view_parts/_page_base.php';
?>
<div id="main3">
    <h2 id="gueye">M'INSCRIRE AU REGISTRE DE DONNEURS DE SANG</h2>

    <?php

    //var_dump($_POST); // Inspecter les données POST
    $in_post = array_key_exists('register', $_POST); // En est en réception
    //$in_post = ('POST' == $_SERVER['REQUEST_METHOD']); // On peut utiliser la méthode HTTP utilisée

    /**---------------------* Validation de l age----------------------------------*/
    $age_ok = false;
    $age_msg = ''; // Message de feedback validation, affiché si non vide
    if (array_key_exists('age', $_POST)) {
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
        // Validation du prenom : min 2 caractères
        $age_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $age));
        if ( ! $age_ok) { // Si le prénom n'est pas valide
            $age_msg = 'Veuillez saisir votre age.';
        }
//    var_dump($firstname);
//    var_dump($firstname_ok);
//    var_dump($firstname_msg);
    }
    /*------------------------Validation etat de sante---------------------------------*/
    $sante_ok = array_key_exists('sante', $_POST);
    $sante_msg = ''; // Message de feedback validation, affiché si non vide
    if ( ! $sante_ok) { // Si l age n est pas donne
        $sante_msg = 'Vous devez indiquez si vous etes en bonne sante.';

    }
    /*-------------------------Validation don--------------------------------*/
    $don_ok = array_key_exists('don', $_POST);
    $don_msg = ''; // Message de feedback validation, affiché si non vide
    if ( ! $don_ok) { // Si l age n est pas donne
        $don_msg = 'Ce champ n\'est pas rempli.';

    }
    /*---------------------------------------Validation du tout----------------------------------------------*/
    if ( $age_ok && $sante_ok && $don_ok ) {
        // On enregistre les données et s'en va sur une autre page
        /**/require_once 'db/_user.php';
        $user_info = user_add($age, $sante, $don);
        header("Location:index.php");
        exit;
    }
    ?>
    <h3 class="gueye1" >*Champs requis</h3>
    <h4 class="gueye2">Questionnaire medical</h4>
    <form  method="post" novalidate="novalidate" action="contact2.php" >
        <fieldset class="fieldform">

            <!--    Champ age       -->
            <label id="labo1">*Avez-vous entre 18 et 60 ans
                <input type="radio" name="age" id="lab3" size="25" value="age_oui"/>Oui
                <?php echo (array_key_exists('age', $_POST) && ($_POST['age'] == 'age_oui')) ? 'checked="checked"' : '' ?></label>
            <label for="age_non" id="no">Non</label>
            <input type="radio" name="age" id="age_non" value="age_non"/></br>
            <?php echo (array_key_exists('age', $_POST) && ($_POST['age'] == 'age_non')) ? 'checked="checked"' : '' ?>
            <?php if ($in_post && ! $age_ok) {
                echo "<p class='error_msg'>$age_msg</p>";
            } ?></br>

            <!--    Champ sante     -->
            <label>*Etes-vous en bonne sante?

                <input type="radio" name="sante"  size="25" value="sante_oui"/>Oui
                <?php echo (array_key_exists('sante', $_POST) && ($_POST['sante'] == 'sante_oui')) ? 'checked="checked"' : '' ?></label>
            <label for="sante_non" >Non</label>
            <input type="radio" name="sante" id="sante_non" value="sante_non"/></br>
            <?php echo (array_key_exists('sante', $_POST) && ($_POST['sante'] == 'sante_non')) ? 'checked="checked"' : '' ?>
            <?php if ($in_post && ! $sante_ok) {
                echo "<p class='error_msg'>$sante_msg</p>";
            } ?></br>

            <!--    Taille poids     -->
            <tr>
                <td  colspan="3">
                    * Veuillez indiquer votre taille et poids<div></br>
                        <input type="text"  maxlength="10" value="taille" />
                        <select >
                            <option value="cm">cm</option>
                            <option value="pieds">pieds</option>
                        </select>
                        <input type="text"maxlength="10" value="poids"   />
                        <select >
                            <option value="kg">kg</option>
                            <option value="lbs">lbs</option>
                        </select></div>
                </td>
            </tr></br>
            <tr>
                <!--     Sang      -->
                <label>*Avez-vous deja donne du sang?

                    <input type="radio" name="don"  size="25" value="don_oui"/>Oui
                    <?php echo (array_key_exists('don', $_POST) && ($_POST['don'] == 'don_oui')) ? 'checked="checked"' : '' ?></label>
                <label for="don_non" >Non</label>
                <input type="radio" name="don" id="don_non" value="don_non"/>
                <?php echo (array_key_exists('don', $_POST) && ($_POST['don'] == 'don_non')) ? 'checked="checked"' : '' ?>
                <?php if ($in_post && ! $don_ok) {
                    echo "<p class='error_msg'>$don_msg</p>";
                } ?>
                <!--    Souffert    -->
            <tr>
                <th><h4 class="gueye3">Avez-vous déjà souffert de l'une des conditions suivantes :</h4></th>

            </tr>
            <tr  >
                <td >Cancer, sauf carcinome de la peau ou du col de l'utérus traité avec succès</td>
                <td colspan="2" class="col">
                    <input type="radio"  value="true" />
                    <label for="etape1">oui</label>
                    <input type="radio" value="false" />
                    <label >non</label></br>
                </td>
            </tr></br>
            <tr>
                <td>Diabète insulinodépendant</td>
                <td colspan="2" class="col">
                    <input type="radio"  value="true" />
                    <label for="oui">oui</label>
                    <input type="radio" value="false" />
                    <label>non</label></br>
                </td>
            </tr></br>
            <tr>
                <td>Maladie du cœur ou chirurgie cardiaque ou greffe de valve cardiaque</td>
                <td colspan="2" class="col">
                    <input type="radio"  value="true" onchange="hideShowDrawer(this.value,'sufferedFromDiabetesRadio')"/>
                    <label for="oui">oui</label>
                    <input type="radio" value="false" onchange="hideShowDrawer(this.value,'sufferedFromDiabetesRadio')"/>
                    <label>non</label></br>
                </td>
            </tr></br>
            <tr>
                <td>Maladies pulmonaires chroniques ou asthme traité avec stéroïdes ou entraînant une réaction anaphylactique</td>
                <td colspan="2" class="col">
                    <input type="radio"  value="true"/>
                    <label for="oui">oui</label>
                    <input type="radio" value="false" onchange="hideShowDrawer(this.value,'sufferedFromDiabetesRadio')"/>
                    <label>non</label></br>
                </td>
            </tr></br>
            <tr>
                <td>Épilepsie entraînant la prise de médicaments et/ou crise dans les 2 dernières années</td>
                <td colspan="2" class="col">
                    <input type="radio"  value="true" onchange="hideShowDrawer(this.value,'sufferedFromDiabetesRadio')"/>
                    <label for="oui">oui</label>
                    <input type="radio" value="false" onchange="hideShowDrawer(this.value,'sufferedFromDiabetesRadio')"/>
                    <label>non</label></br>
                </td>
            </tr></br>
            <tr>
                <td>Anémie avec prescription continue de fer ou symptômes importants</td>
                <td colspan="2" class="col">
                    <input type="radio"  value="true" />
                    <label for="oui">oui</label>
                    <input type="radio" value="false" />
                    <label>non</label></br>
                </td>
            </tr></br>
            <tr>
                <td>Anémie avec prescription continue de fer ou symptômes importants</td>
                <td colspan="2" class="col">
                    <input type="radio"  value="true" />
                    <label for="oui">oui</label>
                    <input type="radio" value="false" />
                    <label>non</label></br>
                </td>
            </tr></br>


            <div><input type="hidden"  />
                <div class="separateur"></div>
                <!--    Submit -->

                <li class="boutonAlignCenter" id="ins">
                    <input type="submit"  id="ins" value="Etape 2" src="Bouton-Rouge.png"><li/>
        </fieldset>

    </form>
</div>
<?php
require_once 'view_parts/_page_bottom.php';
?>
