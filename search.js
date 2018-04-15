$(document).ready(function(){
  var sel = document.getElementById("#category");
  var selval = sel.options[sel.selectedIndex].val();

  $('#submit').click(function() {

    $.post("catposts.php",
      {category: selval},
      function(data){
        $('#theposts').html(data);
    }
  );
  });

});
