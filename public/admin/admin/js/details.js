
/*if ($('#nbre').val() === 2 ){
    $('#piece_valider').hide()
    $('#signer').hide()
}*/
//
if($('#libelleEtape').val() === "Identification du client"){
    $('.libelleVide2').show()
    $('.libelleVide3').show()
    $('.libelleVide4').show()
    $('.libelleVide5').show()
    $('.libelleVide6').show()
    $('.libelleVide7').show()
    $('.libelleVide8').show()
    $('.step-22').hide()
    $('.step-33').hide()
    $('.step-44').hide()
    $('.step-55').hide()
    $('.step-66').hide()
    $('.step-77').hide()
    $('.step-88').hide()
    $('#piece_valider').hide()
    $('#signer').hide()
    $('#enr').hide()
    $('#redaction_valider').hide()
    $('#obtention_valider').hide()
    $('#remise_valider').hide()
    $('#classification_valider').hide()
   // $('#enr').hide()
    //$('.libelleVide').show()
}else if($('#libelleEtape').val() === "Recueil des pièces" ) {
    $('.libelleVide2').hide()
    $('.libelleVide3').show()
    $('.libelleVide4').show()
    $('.libelleVide5').show()
    $('.libelleVide6').show()
    $('.libelleVide7').show()
    $('.libelleVide8').show()
    $('.sw-btn-next').click()
    $('.step-22').show()
    $('.step-33').hide()
    $('.step-44').hide()
    $('.step-55').hide()
    $('.step-66').hide()
    $('.step-77').hide()
    $('.step-88').hide()
    $('#piece_valider').show()
    $('#signer').hide()
    $('#ident').hide()
    $('#enr').hide()
    $('#redaction_valider').hide()
    $('#obtention_valider').hide()
    $('#remise_valider').hide()
    $('#classification_valider').hide()
}
else if($('#libelleEtape').val() === "Redaction" ) {

    $('.libelleVide2').hide()
    $('.libelleVide3').hide()
    $('.libelleVide4').show()
    $('.libelleVide5').show()
    $('.libelleVide6').show()
    $('.libelleVide7').show()
    $('.libelleVide8').show()
    $('.step-22').show()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.step-33').show()
    $('.step-44').hide()
    $('.step-55').hide()
    $('.step-66').hide()
    $('.step-77').hide()
    $('.step-88').hide()
    $('#piece_valider').hide()
    $('#signer').hide()
    $('#enr').hide()
    $('#redaction_valider').show()
    $('#obtention_valider').hide()
    $('#remise_valider').hide()
    $('#classification_valider').hide()
}
else if($('#libelleEtape').val() === "Signature" ) {

    $('.libelleVide2').hide()
    $('.libelleVide3').hide()
    $('.libelleVide4').hide()
    $('.libelleVide5').show()
    $('.libelleVide6').show()
    $('.libelleVide7').show()
    $('.libelleVide8').show()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.step-22').show()
    $('.step-33').show()
    $('.step-44').show()
    $('.step-55').hide()
    $('.step-66').hide()
    $('.step-77').hide()
    $('.step-88').hide()
    $('#piece_valider').hide()
    $('#signer').show()
    $('#enr').hide()
    $('#redaction_valider').hide()
    $('#obtention_valider').hide()
    $('#remise_valider').hide()
    $('#classification_valider').hide()
}
else if($('#libelleEtape').val() === "Enregistrement") {
    $('.libelleVide2').hide()
    $('.libelleVide3').hide()
    $('.libelleVide4').hide()
    $('.libelleVide5').hide()
    $('.libelleVide6').show()
    $('.libelleVide7').show()
    $('.libelleVide8').show()
    $('.step-22').show()
    $('.step-33').show()
    $('.step-44').show()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.step-55').show()
    $('.step-66').hide()
    $('.step-77').hide()
    $('.step-88').hide()
    $('#piece_valider').hide()
    $('#signer').hide()
    $('#enr').show()
    $('#redaction_valider').hide()
    $('#obtention_valider').hide()
    $('#remise_valider').hide()
    $('#classification_valider').hide()
}
else if($('#libelleEtape').val() === "Obtention") {
    $('.libelleVide2').hide()
    $('.libelleVide3').hide()
    $('.libelleVide4').hide()
    $('.libelleVide5').hide()
    $('.libelleVide6').hide()
    $('.libelleVide7').show()
    $('.libelleVide8').show()
    $('.step-22').show()
    $('.step-33').show()
    $('.step-44').show()
    $('.step-55').show()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.step-66').show()
    $('.step-77').hide()
    $('.step-88').hide()
    $('#piece_valider').hide()
    $('#signer').hide()
    $('#enr').hide()
    $('#redaction_valider').hide()
    $('#obtention_valider').show()
    $('#remise_valider').hide()
    $('#classification_valider').hide()
}
else if($('#libelleEtape').val() === "Remise") {
    $('.libelleVide2').hide()
    $('.libelleVide3').hide()
    $('.libelleVide4').hide()
    $('.libelleVide5').hide()
    $('.libelleVide6').hide()
    $('.libelleVide7').hide()
    $('.libelleVide8').show()
    $('.step-22').show()
    $('.step-33').show()
    $('.step-44').show()
    $('.step-55').show()
    $('.step-66').show()
    $('.step-77').show()
    $('.step-88').hide()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('#piece_valider').hide()
    $('#signer').hide()
    $('#enr').hide()
    $('#redaction_valider').hide()
    $('#obtention_valider').hide()
    $('#remise_valider').show()
    $('#classification_valider').hide()
}
else if($('#libelleEtape').val() === "Classification") {
    $('.libelleVide2').hide()
    $('.libelleVide3').hide()
    $('.libelleVide4').hide()
    $('.libelleVide5').hide()
    $('.libelleVide6').hide()
    $('.libelleVide7').hide()
    $('.libelleVide8').hide()
    $('.step-22').show()
    $('.step-33').show()
    $('.step-44').show()
    $('.step-55').show()
    $('.step-66').show()
    $('.step-77').show()
    $('.step-88').show()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('.sw-btn-next').click()
    $('#piece_valider').hide()
    $('#signer').hide()
    $('#enr').hide()
    $('#redaction_valider').hide()
    $('#obtention_valider').hide()
    $('#remise_valider').hide()
    $('#classification_valider').show()
    $(".readonly").prop("disabled", true);

}
else if($('#libelleEtape').val() === "Archive") {
    $('.libelleVide2').hide()
    $('.libelleVide3').hide()
    $('.libelleVide4').hide()
    $('.libelleVide5').hide()
    $('.libelleVide6').hide()
    $('.libelleVide7').hide()
    $('.libelleVide8').hide()
    $('.step-22').show()
    $('.step-33').show()
    $('.step-44').show()
    $('.step-55').show()
    $('.step-66').show()
    $('.step-77').show()
    $('.step-88').show()
    $('#piece_valider').hide()
    $('#signer').hide()
    $('#enr').hide()
    $('#redaction_valider').hide()
    $('#obtention_valider').hide()
    $('#remise_valider').hide()
    $('#classification_valider').hide()

}

$('#dossier_identifications_1_acheteur').closest('span').find('row').hide()
