//console.log('Heeey');
//hideValidationMessages();
$(".registerUser").click(function(){
    $("#registerModal").modal('show');
});

$(".closeRegister").click(function(){
    clearRegistrationForm();
    $("#registerModal").modal('hide');
});



$(".submitRegister").click(function(){
    if(validateFrom() === false){
        Swal.fire({
            icon: 'error',
            title: 'Greška',
            text: 'Ispravite greške koje su nastale prilikom registracije i pokušajte ponovo.',
        })
    }
});

// sklanja upozorenja za registraciju
function hideValidationMessages(){
    $('span.fname-remove').hide();
    $('span.lname-remove').hide();
    $('span.email-remove').hide();
    $('span.pass-remove').hide();
    $('span.repeatPass-remove').hide();
    $('span.matchPass-remove').hide();
}

// funckija koja prazni sva polja na registracionoj formi
function clearRegistrationForm(){
    hideValidationMessages();
    $('#fname').val('');
    $('#lname').val('');
    $('#email').val('');
    $('#pass').val('');
    $('#repeatPass').val('');
}

// validira formu
function validateFrom(){
    console.log($('#pass').val(), $('#repeatPass').val(),'šifre');
    hideValidationMessages();
    var errorCounter = 0;

    if($('#fname').val().length == 0){
        $('span.fname-remove').html('Unesite ime');
        $('span.fname-remove').show();
        errorCounter++;
    }

    if($('#lname').val().length == 0){
        $('span.lname-remove').html('Unesite prezime');
        $('span.lname-remove').show();
        errorCounter++;
    }

    if($('#email').val().length == 0){
        $('span.email-remove').html('Unesite email');
        $('span.email-remove').show();
        errorCounter++;
    }

    if($('#pass').val().length == 0){
        $('span.pass-remove').html('Unesite šifru');
        $('span.pass-remove').show();
        errorCounter++;
    }

    if($('#repeatPass').val().length == 0){
        $('span.repeatPass-remove').html('Ponovite šifru');
        $('span.repeatPass-remove').show();
        errorCounter++;
    }

    if($('#pass').val() !== $('#repeatPass').val()){
        $('span.matchPass-remove').html('Šifre moraju biti identične');
        $('span.matchPass-remove').show();
        errorCounter++;
    }

    if(errorCounter > 0){
        return false;
    }

    return true;
}

$('#registerModal').on('shown.bs.modal', function () {
  clearRegistrationForm();
});

