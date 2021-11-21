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
        // prosleđuje podatke za registraciju
        $.ajax({
        type: 'POST',
        url: '/registerUser',
        data: {
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            email: $('#email').val(),
            pass: $('#pass').val(),
            repeatPass: $('#repeatPass').val()
        }
        }).done(function(response) {
            console.log(response, 'response');
            if(response == true){
                Swal.fire({
                    icon: 'success',
                    title: 'Obaveštenje',
                    text: 'Uspešno ste se registrovali. Možete se prijaviti sa email adresom i šifrom koju ste uneli prilikom registracije.',
                })
                $("#registerModal").modal('hide');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Greška',
                    text: 'Došlo je do greške prilikom registracije. Osvežite stranu i pokušajte ponovo da se registrujete uz unos svih neophodnih podataka.',
                })
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
    // brojač grešaka
    var errorCounter = 0;
    // regex za proveru mejla
    var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    // uklanja space-ove
    var fname = $('#fname').val().replace(/\s/g, '');
    var lname = $('#lname').val().replace(/\s/g, '');
    var pass = $('#pass').val().replace(/\s/g, '');
    var repeatPass = $('#repeatPass').val().replace(/\s/g, '');

    // provera da li je išta uneto i ako nije ispisuje grešku
    if(fname.length == 0){
        $('span.fname-remove').html('Unesite ime');
        $('span.fname-remove').show();
        errorCounter++;
    }

    if(lname.length == 0){
        $('span.lname-remove').html('Unesite prezime');
        $('span.lname-remove').show();
        errorCounter++;
    }

    // proverava da li je išta uneto i da li je u odgovarajućem formatu
    if($('#email').val().length == 0){
        $('span.email-remove').html('Unesite email');
        $('span.email-remove').show();
        errorCounter++;
    } else if(!emailPattern.test($('#email').val())){
        $('span.email-remove').html('Format email adrese nije ispravan');
        $('span.email-remove').show();
        errorCounter++;
    }

    // proverava da li je uneta šifra i da li je odgovarajuće dužine
    if(pass.length == 0){
        $('span.pass-remove').html('Unesite šifru koja sadrži slova, brojeve i/ili znakove');
        $('span.pass-remove').show();
        errorCounter++;
    } else if(pass.length < 8){
        $('span.pass-remove').html('Šifra mora imati bar 8 karaktera');
        $('span.pass-remove').show();
        errorCounter++;
    }

    if(repeatPass.length == 0){
        $('span.repeatPass-remove').html('Ponovite šifru');
        $('span.repeatPass-remove').show();
        errorCounter++;
    }

    if(pass !== repeatPass){
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