$(document).ready(function(){

  $(".icon-desktop-reorder").click(function(){
    $("dragdrop-pane").fadeIn(300);
  });

  $("#sortable").sortable();  
});