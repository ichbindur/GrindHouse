<?php
/* if(isset($_SESSION['ID']) && isset($_SESSION['nom']) && $_SESSION['nom'] != '' && $_SESSION['ID'] != ''){
  header('Location: /Commande3.php');
  } */
?>
<script>
    function checkInfo() {
        var valide = true;
        if (document.getElementById("nom").value.length < 3) {
            document.getElementById("nom").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("nom").style.border = '';
        if (document.getElementById("prenom").value.length < 3) {
            document.getElementById("prenom").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("prenom").style.border = '';
        if (document.getElementById("mail").value == '') {
            document.getElementById("mail").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("mail").style.border = '';
        if (document.getElementById("paswd").value.length < 3 || document.getElementById("paswd").value !== document.getElementById("paswdConfirm").value) {
            document.getElementById("paswd").style.border = '2px solid red';
            document.getElementById("paswdConfirm").style.border = '2px solid red';
            valide = false;
        } else {
            document.getElementById("paswd").style.border = '';
            document.getElementById("paswdConfirm").style.border = '';
        }
        if (document.getElementById('adresse').value.length < 05) {
            document.getElementById("adresse").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("adresse").style.border = '';
        if (document.getElementById("cp").value.length < 5 || document.getElementById("cp").value.length > 5) {
            document.getElementById('cp').style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("cp").style.border = '';
        if (document.getElementById("pays").value.length < 3) {
            document.getElementById("pays").style.border = '2px solid red';
            valide = false;
        }
        else
            document.getElementById("pays").style.border = '';
        if (valide) {
            document.forms["inscriptionUtilisateur"].submit();
        }
    }
</script>
<div id='inscription'>
    <table>
        <tr>
            <td>
                <h2>Nouvel utilisateur?</h2>
                <h3>Inscrivez vous!</h3>
                <form name="inscriptionUtilisateur" id="inscriptionUtilisateur" method="POST" action="Commande3.php"></br>
                    nom<input type="text" id="nom" name="nom"/></br>
                    prenom<input type="text" id="prenom" name="prenom"/></br>
                    mail<input type="mail" id="mail" name="mail"/></br>
                    pass<input type="password" id="paswd" name="paswd"/></br>
                    passconf<input type="password" id="paswdConfirm" name="paswdConfirm"/></br>
                    adresse<input type="text" id="adresse" name="adresse"/></br>
                    compadresse<input type="text" id="adresseComp" name="adresseComp"/></br>
                    cp<input type="number" id="cp" name="cp"/></br>
                    pays<input type="text" id="pays" name="pays"/></br>
                    <input type="button" id="submit2" name="submit2" onclick='checkInfo();' value="Valider"></br>
                </form>
                <?php
                if (isset($_GET['action']) && $_GET['action'] == 'back') {
                    echo 'L\'adresse mail entree est deja utilisee. </br> Veuillez en saisir une autre.';
                }
                ?>
            </td>
            <td>
                <form method="POST" action="Commande3.php">
                    mail<input type="mail" id="connMail" name="connMail"/></br>
                    mot de passe<input type="password" name="connMdp" id="connMdp"/></br>
                    <input type="submit" name="submit3" id="submit3"/>
                    <label id="labelMailError"></label>
                </form>
            </td>
        </tr>
    </table>
</div>