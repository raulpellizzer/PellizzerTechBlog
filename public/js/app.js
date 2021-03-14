// Slide up alerts when shown
$( ".alert" ).delay(3000).slideUp("slow");

// Keep track of characters left in Create New Post view
$('#bodycontent').keyup(function() {    
    let characterCount = $(this).val().length;
    let charactersLeft = 65535 - characterCount;
    $('#charactersleft').text(charactersLeft);
});