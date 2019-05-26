$(document).ready(function () {
  var arrsize;
  var count;
  var itemId;

  $(".routeaddbtn").click(function () {
    arrsize = $(".route-main-pane .stay-row .marker").length;
    console.log(arrsize);
    $(".add-pane").fadeIn(300);
  });

  $(".ui-icon-closethick").click(function () {
    $(".add-pane").fadeOut(300);
  });

  $(".add-pane .addtoplan").click(function () {
    var value = $(".add-pane input[type='text']").val();

    count = arrsize + 1;
    $("#r" + arrsize).after(
      '<div id="r' + count + '" class="draggable route-row stay-row  first">' +
      '<div class="left">' +
      '<div class="marker notranslate">' + count + '</div>' +
      '<div class="line"></div>' +
      '</div>' +
      '<div class="content" >' +
      '<div class="title">' + value + '</div>' +
      '<span class="line-hr"></span>' +
      '<svg class="edit stay-icon" for="r' + count + '" title="Edit destination">' +
      '<use xlink:href="#icon-edit"></use>' +
      '</svg>' +
      '</div>' +
      '</div>  ');
    editRoute();
    removeRoute();
    $(".add-pane input[type='text']").val(null);
    $(".add-pane").fadeOut(300);

    $.ajax({
			url:'calendar/insert.php',
			type:'post',
			data:{type:"route",title:value},
			success:function(response){
				console.log(value);
				window.location.reload();
			}
		});
  });

  editRoute();
  removeRoute();

  function editRoute() {
    $(".edit").click(function () {
      $(".edit-pane").fadeIn(300);
      itemId = $(this).attr('for');
      var value = $("#" + itemId + " .title").text();
      $(".edit-pane input[type='text']").val(value);
    });
  }

  $(".edit-pane .editsavebtn").click(function () {
    var value = $(".edit-pane input[type='text']").val();

    $("#" + itemId + " .title").text(value);
    $(".edit-pane").fadeOut(300);
    $(".edit-pane input[type='text']").val("");
    console.log(value);

    $.ajax({
			url:'calendar/update.php',
			type:'post',
			data:{id:itemId,type:"route",title:value},
			success:function(response){
				console.log(id);
				window.location.reload();
			}
		});
  });

  $(".ui-icon-closethick").click(function () {
    $(".edit-pane").fadeOut(300);
  });

  function removeRoute() {
    $(".editremobtn").click(function () {
      $(".edit-pane").fadeOut(300);
      $("div[id*='" + itemId + "']").remove();
      
      console.log(itemId);
        
      $.ajax({
        url:'calendar/delete.php',
        type:'post',
        data:{id:itemId},
        success:function(response){
          console.log(itemId + " deleted");
          window.location.reload();
        }
      });
    });
  }
});