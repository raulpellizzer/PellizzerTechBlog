// Slide up alerts when shown
$( ".alert" ).delay(3000).slideUp("slow");

// Keep track of characters left in Create New Post view
$('#bodycontent').keyup(function() {    
    let characterCount = $(this).val().length;
    let charactersLeft = 65535 - characterCount;
    $('#charactersleft').text(charactersLeft);
});

// Search for user in the user control panel
function searchUser()
{
  var input, filter, table, tr, td, i, txtValue;
  input  = document.getElementById("namesearch");
  filter = input.value.toUpperCase();
  table  = document.getElementById("usergrid");
  tr     = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1)
        tr[i].style.display = "";
      else
        tr[i].style.display = "none";
    }
  }
}