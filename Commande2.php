<?php
/*if(isset($_SESSION['ID']) && isset($_SESSION['nom']) && $_SESSION['nom'] != '' && $_SESSION['ID'] != ''){
    header('Location: /Commande3.php');
}*/
?>
<script>
    function checkInfo(){
        alert('attaque ' + typeof(document.inscriptionUtilisateur.nom.text));
       if(typeof(document.inscriptionUtilisateur.nom.text) == 'undefined')
           document.getElementById("nom").border = '2px solid red';
       else if(document.getElementById("nom").text.length < 3)
           document.getElementById("nom").border = '2px solid red';
       if(typeof(document.getElementById("prenom").text) == 'undefined')
           document.getElementById("prenom").border = '2px solid red';
       else if(document.getElementById("prenom").text.length < 3)
           document.getElementById("prenom").border = '2px solid red';
       if(typeof(document.getElementById("mail").text) == 'undefined')
           document.getElementById("mail").border = '2px solid red';
       if(typeof(document.getElementById("paswd").text) == 'unedefined' || typeof(document.getElementById("paswdConfirm").text) == 'unedefined'){
           document.getElementById("paswd").border = '2px solid red';
           document.getElementById("paswdConfirm").border = '2px solid red';
       }else if(document.getElementById("paswd").text.length < 3 && document.getElementById("paswd").text !== document.getElementById("paswdConfirm").text){
           document.getElementById("paswd").border = '2px solid red';
           document.getElementById("paswdConfirm").border = '2px solid red';
       }
       if(typeof(document.getElementById("adresse").text == 'unedefined')
           document.getElementById("adresse").border = '2px solid red';
           
       if(document.getElementById("cp").text === '' || document.getElementById("cp").text.leght > 5 || document.getElementById("cp").text < 5)
           document.getElementById("cp").border = '2px solid red';
       if(document.getElementById("pays").text === '' || document.getElementById("pays").text.length < 3)
           document.getElementById("pays").border = '2px solid red';
    }
    function ceckInfo2(){
        f
    }
</script>
<div id='inscription'>
    <table>
        <tr>
            <td>
                <h2>Nouvel utilisateur?</h2>
                <h3>Inscrivez vous!</h3>
                <form name="inscriptionUtilisateur" method="POST"></br>
                    nom<input type="text" id="nom" name="nom"/></br>
                    prenom<input type="text" id="prenom" name="prenom"/></br>
                    mail<input type="mail" id="mail" name="mail"/></br>
                    pass<input type="password" id="paswd" name="paswd"/></br>
                    passconf<input type="password" id="paswdConfirm" name="paswdConfirm"/></br>
                    adresse<input type="text" id="adresse" name="adresse"/></br>
                    compadresse<input type="text" id="adresseComp" name="adresseComp"/></br>
                    cp<input type="text" id="cp" name="cp"/></br>
                    pays<input type="text" id="pays" name="pays"/></br>
                    <input type="button" id="submit2" name="submit2" onclick='checkInfo();'/></br>
                </form>
            </td>
            <td>
                <form method="POST" onkeyup='ceckInfo2();'>
                    <input type="text" id="connMail" name="connMail"/></br>
                    <input type="password" name="connMdp" id="connMdp"/></br>
                    <input type="submit" name="submit3" id="submit3" disabled/>
                </form>
            </td>
        </tr>
    </table>
</div>