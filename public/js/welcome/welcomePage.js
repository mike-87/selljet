$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
            text: 'Ispravno popunite sva neophodna polja i pokušajte ponovo.',
        })
    } else {

        $.ajax({
        type: 'POST',
        url: '/getOvertimeConsentInfo',
        data: {
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            email: $('#email').val(),
            pass: $('#pass').val(),
            repeatPass: $('#repeatPass').val()
        }
        }).done(function(response) {
            if(response === true){
                Swal.fire({
                    icon: 'success',
                    title: 'Obaveštenje',
                    text: 'Uspešno ste se registrovali. Možete se prijaviti sa email adresom i šifrom koju ste uneli prilikom registracije.',
                })
            } else {
                console.log('došlo je do greške');
            }
     });
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
    hideValidationMessages();
    var errorCounter = 0;
    var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

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
    } else if(!emailPattern.test($('#email').val())){
        $('span.email-remove').html('Format email adrese nije ispravan');
        $('span.email-remove').show();
        errorCounter++;
    }

    if($('#pass').val().length == 0){
        $('span.pass-remove').html('Unesite šifru');
        $('span.pass-remove').show();
        errorCounter++;
    } else if($('#pass').val().length < 8){
        $('span.pass-remove').html('Šifra mora imati bar 8 karaktera');
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


$("#fname").keyup(function() {
  $('span.fname-remove').hide();
});

$("#lname").keyup(function() {
  $('span.lname-remove').hide();
});

$("#email").keyup(function() {
  $('span.email-remove').hide();
});

$("#pass").keyup(function() {
  $('span.pass-remove').hide();
});

$("#repeatPass").keyup(function() {
  $('span.repeatPass-remove').hide();
  $('span.matchPass-remove').hide();
});