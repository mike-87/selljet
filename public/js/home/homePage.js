$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

        /* SUBMIT AD START */
$(".adPost").click(function(){
    $("#postAdModal").modal('show');
});

$(".closeAd").click(function(){
    //clearRegistrationForm();
    $("#postAdModal").modal('hide');
});

// sklanja upozorenja za registraciju
function hideValidationMessages(){
    $('span.title-remove').hide();
    $('span.describe-remove').hide();
    $('span.price-remove').hide();
    $('span.condition-remove').hide();
    $('span.phone-remove').hide();
    $('span.location-remove').hide();
    $('span.section-remove').hide();
    $('span.category-remove').hide();
    $('span.subcategory-remove').hide();
}

// funckija koja prazni sva polja na registracionoj formi
function clearRegistrationForm(){
    hideValidationMessages();
    $('#title').val('');
    $('#describeAd').val('');
    $('#price').val('');
    $('#condition').val('0');
    $('#image').val('');
    $('#phone').val('');
    $('#location').val('');
    $('#section').val(0).trigger('change');
}

$(".submitAd").on('click', function(){
    if(validateFrom() === false){
        Swal.fire({
            icon: 'error',
            title: 'Greška',
            text: 'Ispravno popunite sva neophodna polja i pokušajte ponovo.',
        })
    } else {
        $("#postAdForm").submit();
    }
});

// validira formu
function validateFrom(){
    hideValidationMessages();
    // brojač grešaka
    var errorCounter = 0;

    // uklanja space-ove
    var title = $('#title').val().replace(/\s/g, '');
    var describeAd = $('#describeAd').val().replace(/\s/g, '');
    var price = $('#price').val();
    var condition = $('#condition').val();
    var phone = $('#phone').val();
    var location = $('#location').val();
    var section = $('#section').val();
    var category = $('#category').val();
    var subcategory = $('#subcategory').val();

    // provera da li je išta uneto i ako nije ispisuje grešku
    if(title.length == 0){
        $('span.title-remove').html('Unesite naslov oglasa');
        $('span.title-remove').show();
        errorCounter++;
    }

    if(describeAd.length == 0){
        $('span.describe-remove').html('Unesite opis oglasa');
        $('span.describe-remove').show();
        errorCounter++;
    }

    if(price.length == 0 || price == 0){
        $('span.price-remove').html('Unesite cenu');
        $('span.price-remove').show();
        errorCounter++;
    }

    if(condition == 0){
        $('span.condition-remove').html('Odaberite stanje');
        $('span.condition-remove').show();
        errorCounter++;
    }

    if(phone.length == 0 || !$.isNumeric(phone)){
        $('span.phone-remove').html('Unesite broj telefona');
        $('span.phone-remove').show();
        errorCounter++;
    }

    if(location == ""){
        $('span.location-remove').html('Odaberite lokaciju');
        $('span.location-remove').show();
        errorCounter++;
    }

    if(section == 0){
        $('span.section-remove').html('Odaberite sekciju');
        $('span.section-remove').show();
        errorCounter++;
    } else {
        if(category == 0){
            $('span.category-remove').html('Odaberite kategoriju');
            $('span.category-remove').show();
            errorCounter++;
        } else {
           if(subcategory == 0){
                $('span.subcategory-remove').html('Odaberite podkategoriju');
                $('span.subcategory-remove').show();
                errorCounter++;
            } 
        }
    }

    if(errorCounter > 0){
        return false;
    }

    return true;
}

$("#section").on('change', function() {
  $('span.section-remove').hide();
  if(this.value != 0){
    getChildrenSection(this.value, 'category');
    $(".sectionCategory").show();
  } else {
    $("#category").val(0);
    $(".sectionCategory").hide();
    $("#subcategory").val(0);
    $(".sectionSubcategory").hide();
  }
});

$('#category').on('change', function() {
  $('span.category-remove').hide();
  if(this.value != 0){
    getChildrenSection(this.value, 'subcategory');
    $(".sectionSubcategory").show();
  } else {
    $("#subcategory").val(0);
    $(".sectionSubcategory").hide();
  }
});

$('#subcategory').on('change', function() {
  $('span.subcategory-remove').hide();
});

$('#postAdModal').on('shown.bs.modal', function () {
  clearRegistrationForm();

});

function getChildrenSection(parentID, destination){
    $.ajax({
        type: 'GET',
        url: '/categoryChildren/' + parentID
    }).done(function(response) {
        if(response.length > 0){
            $("#" + destination).html("");
            if(destination == "category"){
                $("#" + destination).append("<option value='0'>Odaberite kategoriju</option>");
            } else {
                $("#" + destination).append("<option value='0'>Odaberite podkategoriju</option>");
            }
            response.forEach(function(item){
                $("#" + destination).append(`<option value='${item.categories_id}'>${item.name}</option>`);
            });
        }
        
    });
}


$("#title").keyup(function() {
  $('span.title-remove').hide();
});

$("#describeAd").keyup(function() {
  $('span.describe-remove').hide();
});

$("#price").keyup(function() {
  $('span.price-remove').hide();
});

$("#condition").keyup(function() {
  $('span.condition-remove').hide();
});

$("#phone").keyup(function() {
  $('span.phone-remove').hide();
});

$("#location").keyup(function() {
  $('span.location-remove').hide();
});
        /* SUBMIT AD END */