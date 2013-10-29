<?php
session_start();
if (isset($_SESSION['Facture'])) {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'export') {
            require_once(dirname(__FILE__) . '/html2pdf/html2pdf.class.php');
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->WriteHTML($_SESSION['Facture']);
            $html2pdf->Output('test.pdf');
        }
    }
}
//header('Location : ./Commande7.php');
?>
