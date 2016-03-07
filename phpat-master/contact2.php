<?php
require_once '_defines.php';
require_once 'data/_main_data.php';
$site_data[PAGE_ID] = 'Contact2';
require_once 'common/_start.php';
require_once 'view_parts/_page_base.php';
?>
<div id="main3">

    <h2 id="gueye">M'INSCRIRE AU REGISTRE DE DONNEURS DE SANG</h2>
    </html>
    <?php

    //var_dump($_POST); // Inspecter les données POST
    $in_post = array_key_exists('register', $_POST); // En est en réception
    //$in_post = ('POST' == $_SERVER['REQUEST_METHOD']); // On peut utiliser la méthode HTTP utilisée
    /**
     * ---------------------------------------Validation du prenom-------------------------------------------------*/
    $firstname_ok = false;
    $firstname_msg = ''; // Message de feedback validation, affiché si non vide
    if (array_key_exists('firstname', $_POST)) {
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        // Validation du prenom : min 2 caractères
        $firstname_ok = (1 === preg_match("/^[A-Za-z0-9]{2,}$/", $firstname));  // 1 siginifie que la condition est vraie et vérifiée
        if ( ! $firstname_ok) { // Si le prénom n'est pas valide
            $firstname_msg = 'Veuillez entrer votre prenom.';
        }
//    var_dump($firstname);
//    var_dump($firstname_ok);
//    var_dump($firstname_msg);
    }
    /**
     * ---------------------------------------Validation du nom----------------------------------------------*/
    $lastname_ok = false;
    $lastname_msg = ''; // Message de feedback validation, affiché si non vide
    if (array_key_exists('lastname', $_POST)) {
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        // Validation du nom: min 2 caracteres
        $lastname_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $lastname));
        if ( ! $lastname_ok) { // Si le nom n'est pas valide
            $lastname_msg = 'Veuillez entrer votre nom.';
        }
//    var_dump($lastname);
//    var_dump($lastname_ok);
    }
    /**
     * ---------------------------------------Validation des salutations---------------------------------------------------------------*/
    $gender_ok = array_key_exists('gender', $_POST);
    $gender_msg = ''; // Message de feedback validation, affiché si non vide
    if (array_key_exists('gender', $_POST)) {
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
// Validation du nom: min 2 caracteres
        $gender_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $gender));
        if ( ! $gender_ok) { // Si le prénom n'est pas valide
            $gender_msg = 'Le genre n\'est pas defini.';
        }else {
            $gender = $_POST['gender'];
        }
    }
    /**
     *--------------------------------------- Validation du numero d'appartement------------------------------------------------*/
    $numappart_ok = array_key_exists('numappart', $_POST);
    $numappart_msg = ''; // Message de feedback validation, affiché si non vide
    if (array_key_exists('numappart', $_POST)) {
        $numappart = filter_input(INPUT_POST, 'numappart', FILTER_SANITIZE_STRING);
// Validation du nom: min 2 caracteres
        $numappart_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $numappart));
        if ( ! $numappart_ok) { // Si le prénom n'est pas valide
            $numappart_msg = 'Le numero de cet appartement n\'est pas donne.';
        }
    }

    /*-------------------------------Validation rue------------------------------------------------------------------------------*/
    $rue_ok = array_key_exists('rue', $_POST);
    $rue_msg = ''; // Message de feedback validation, affiché si non vide
    if (array_key_exists('rue', $_POST)) {
        $rue = filter_input(INPUT_POST, 'rue', FILTER_SANITIZE_STRING);
// Validation du nom: min 2 caracteres
        $rue_ok = (1 === preg_match('/^[A-Za-z]{2,}$/', $rue));
        if ( ! $rue_ok) { // Si le prénom n'est pas valide
            $rue_msg = 'Le nom de la rue n\'est pas donne.';
        }
    }
    /**
     *--------------------- Validation du courriel--------------------------------------------------------------*/
    $email_ok = array_key_exists('email', $_POST);
    $email_msg = ''; // Message de feedback validation, affiché si non vide
    if (array_key_exists('email', $_POST)) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_ok = (false !== $email);
// Validation du courriel
        $email_ok = (1 === preg_match('/^[A-Za-z0-9%@.}{}$/', $email));
        if ( ! $email_ok) { // Si le prénom n'est pas valide
            $email_msg = 'Le courriel n\'est pas valide.';
        }
    }

    /* ----------------Validation telephone------------------------------------- */
    $tel_ok = array_key_exists('tel', $_POST);
    $tel_msg = ''; // Message de feedback validation, affiché si non vide
    if (array_key_exists('tel', $_POST)) {
        $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
// Validation du telephone
        $tel_ok = (1 === preg_match('/^[A-Za-z]{9,}$/', $tel));
        if ( ! $tel_ok) { // Si le numero de telephone n'est pas donne
            $tel_msg = 'Le numero de telephone n\'est pas bon.';
        }
    }

    /* ----------------Validation Ville------------------------------------- */
    $ville_ok = array_key_exists('ville', $_POST);
    $ville_msg = ''; // Message de feedback validation, affiché si non vide
    if (array_key_exists('ville', $_POST)) {
        $ville = filter_input(INPUT_POST, 'ville', FILTER_SANITIZE_STRING);
// Validation du nom: min 2 caracteres
        $ville_ok = (1 === preg_match('/^[A-Za-z]{9,}$/', $ville));
        if ( ! $ville_ok) { // Si le nom de la ville n'est pas donne
            $ville_msg = 'Le nom de la ville n\'est pas donne.';
        }
    }
    /*------------------------------------------------Validation du formulaire en entier--------------------------------------------------------------*/
    if ($firstname_ok && $lastname_ok && $gender_ok && $email_ok && $tel_ok && $numappart_ok && $rue_ok&& $ville_ok) {
        // On enregistre les données et s'en va sur une autre page
        require_once 'db/_user.php';
        $user_info = user_add($firstname, $lastname, $email,$gender,$tel,$rue,$numappart,$ville);
        header("Location:index.php");
        echo "Merci de vous être inscrit, " , $lastname , " " , $firstname;
        exit;
    }
    ?>
    <!------------------------------Code html-------------------------------------------------------->
    <h3 class="gueye1">*Champs Requis</h3>
    <h4 class="gueye2">Informations personnelles</h4>
    <form id="inscription" name="inscription" xmlns="http://www.w3.org/1999/html" method="post"  novalidate="novalidate">
        <fieldset class='form2'><ul><li>
                    <!--    Champ salutations-->
                    <label>Salutations:*<br />
                        <label for="male">M</label>
                        <input type="radio" name="gender" id="lab3" size="25" value="gender_male"/><br />
                        <?php echo (array_key_exists('gender', $_POST) && ($_POST['gender'] == 'gender_male')) ? 'checked="checked"' : '' ?>
                        <label for="gender_female" >Mme</label>
                        <input type="radio" name="gender" id="gender_female" value="gender_female"/><br />
                        <?php echo (array_key_exists('gender', $_POST) && ($_POST['gender'] == 'gender_female')) ? 'checked="checked"' : '' ?>
                        <?php if ($in_post && ! $gender_ok) {
                            echo "<p class='error_msg'>$gender_msg</p>";
                        } ?>

                        <!----------------------------   Champ prenom------------------------------>
                        <label for="firstname">Prénom :*<br />
                            <input type="text" size="25" name="firstname" id="lab1"
                                   class="<?php echo $in_post && ! $firstname_ok ? 'error' : '';?>"
                                   value="<?php echo array_key_exists('firstname', $_POST) ? $_POST['firstname'] : '' ?>"
                            />
                            <?php if ($in_post && ! $firstname_ok) {
                                echo "<p class='error_msg'>$firstname_msg</p>";
                            } ?>
                        </label><br />

                        <!------------------------    Champ nom------------------------------------->
                        <label for="lastname">Nom :*<br />
                            <input type="text" size="25" name="lastname" id="lab2"
                                   class="<?php echo $in_post && ! $lastname_ok ? 'error' : '';?>"
                                   value="<?php echo array_key_exists('lastname', $_POST) ? $_POST['lastname'] : '' ?>"
                            />
                            <?php if ($in_post && ! $lastname_ok) {
                                echo "<p class='error_msg'>$lastname_msg</p>";
                            } ?>
                        </label><br />
                        <h4 id="habibi">Adresse( Vous devez habitez au Senegal pour pouvoir vous inscrire)</h4>

                        <!---------------------------------    Champ No appartement----------------------------------- -->
                        <label for="numappart">No:*<br />
                            <input type="number" name="numappart" size="25" id="lab5"
                                   class="<?php echo $in_post && ! $numappart_ok ? 'error' : '';?>"
                                   value="<?php echo array_key_exists('numappart', $_POST) ? $_POST['numappart'] : '' ?>"
                            />
                            <?php if ($in_post && ! $numappart_ok) {
                                echo "<p class='error_msg'>$numappart_msg</p>";
                            } ?>
                        </label><br />

                        <!--    Champ Rue -->
                        <label for="rue">Rue:*<br />
                            <input type="text" name="rue" size="25" id="lab5"
                                   value="<?php echo array_key_exists('rue', $_POST) ? $_POST['rue'] : '' ?>"
                                   class="<?php echo $in_post && ! $rue_ok ? 'error' : '';?>"
                            />
                            <?php if ($in_post && ! $rue_ok) {
                                echo "<p class='error_msg'>$rue_msg</p>";
                            } ?>
                        </label><br />

                        <!--    Champ Appartement -->
                        <label for="appart">Appartement:<br />
                            <input type="number" name="rue" size="25" id="lab5"
                                   value="<?php echo array_key_exists('numappart', $_POST) ? $_POST['numappart'] : '' ?>"
                                   class="<?php echo $in_post && ! $numappart_ok ? 'error' : '';?>"
                            />
                            <?php if ($in_post && ! $numappart_ok) {
                                echo "<p class='error_msg'>$numappart_msg</p>";
                            } ?>
                        </label><br />

                        <!--    Champ Ville -->
                        <label for="ville">Ville:*<br />
                            <input type="text" name="ville" size="25" id="lab5"
                                   value="<?php echo array_key_exists('ville', $_POST) ? $_POST['ville'] : '' ?>"
                                   class="<?php echo $in_post && ! $ville_ok ? 'error' : '';?>"
                            />
                            <?php if ($in_post && ! $ville_ok) {
                                echo "<p class='error_msg'>$ville_msg</p>";
                            } ?>
                        </label><br />

                        <!--    Champ Telephone -->
                        <label for="tel">Telephone:*<br />
                            <input type="number" name="tel" size="25" id="lab5"
                                   value="<?php echo array_key_exists('tel', $_POST) ? $_POST['tel'] : '' ?>"
                                   class="<?php echo $in_post && ! $tel_ok ? 'error' : '';?>"
                            />
                            <?php if ($in_post && ! $tel_ok) {
                                echo "<p class='error_msg'>$tel_msg</p>";
                            } ?>
                        </label><br />

                        <!--    Champ  adresse courriel -->
                        <label for="courriel">Adresse courriel :*<br />
                            <input type="courriel" size="25" name="courriel" id="lab4"
                                   value="<?php echo array_key_exists('email', $_POST) ? $_POST['email'] : '' ?>"
                                   class="<?php echo $in_post && ! $email_ok ? 'error' : '';?>"
                            />
                            <?php if ($in_post && ! $email_ok) {
                                echo "<p class='error_msg'>$email_msg</p>";
                            } ?>
                        </label><br />

                        <h4 id="habibi">Qu'est ce qui vous a incite a joindre le Registre?</h4>
                        <input type="checkbox" name="macheckbox" id="checkbox01" /> Information sur une collecte de sang<br />
                        <input type="checkbox" checked="checked" name="macheckbox2" id="checkbox02" /> Autre information( depliant, affiche...)<br />
                        <input type="checkbox" name="macheckbox3" id="checkbox03" /> Experience personnelle<br />
                        <input type="checkbox" name="macheckbox3" id="checkbox04" /> Tele/Journal/Revue<br />
                        <input type="checkbox" name="macheckbox3" id="checkbox05" /> Ami/Travail<br />
                        <input type="checkbox" name="macheckbox3" id="checkbox06" /> Autre<br />

                        <!--    Submit -->
                <li class="boutonAlignCenter" > <a href="form.php"><input type="reset"  id="ins" value="Annuler" src="Bouton-Rouge.png"></a><li/><br />
                <li class="boutonAlignCenter" ><input type="submit" name="register" id="ins" value="S'inscrire" src="Bouton-Rouge.png"><li/>
                </li></ul>
            <?php if($in_post){ echo "<p>Merci de corriger les champs comportants un *.</p>"; } ?></fieldset>
</div>

<?php
require_once 'view_parts/_page_bottom.php';
?>
