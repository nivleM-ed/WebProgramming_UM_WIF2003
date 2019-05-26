$(document).ready(function () {
  var arrsize;
  var count;
  var id;


  $(".routeaddbtn").click(function () {
    arrsize = $(".route-main-pane .stay-row .marker").length;
    console.log(arrsize);
    $(".add-pane").fadeIn(300);
  });

  $(".ui-icon-closethick").click(function () {
    $(".add-pane").fadeOut(300);
  });

  $(".add-pane .addtoplan").click(function () {
    var type="tambah";
    id = $(this).attr('for');
    var value = $(".add-pane input[type='text']").val();
    $.ajax({
			url:'modifyRoute.php',
			type:'post',
			data:{type:type,value:value},
			success:function(response){
				console.log(type);
				window.location.reload();
			}
    });
    //hs

    count = arrsize + 1;
    $("#r" + arrsize).after(
      '<div id="r' + id + '" class="draggable route-row stay-row  first">' +
      '<div class="left">' +
      '<div class="marker notranslate">' + count + '</div>' +
      '<div class="line"></div>' +
      '</div>' +
      '<div class="content" >' +
      '<div class="title">' + value + '</div>' +
      '<span class="line-hr"></span>' +
      '<svg class="edit stay-icon" id="'+id+ '"for="r' + id + '" title="Edit destination">' +
      '<use xlink:href="#icon-edit"></use>' +
      '</svg>' +
      '</div>' +
      '</div>  ');
    editRoute();
    removeRoute();
    $(".add-pane input[type='text']").val(null);
    $(".add-pane").fadeOut(300);
  });

  editRoute();
  removeRoute();

  function editRoute() {
    $(".edit").click(function () {
      $(".edit-pane").fadeIn(300);
      id = $(this).attr('for');
      var value = $("#" + id + " .title").text();
      $(".edit-pane input[type='text']").val(value);
    });
  }

  $(".edit-pane .editsavebtn").click(function () {
    var value = $(".edit-pane .flat ui-autocomplete-input:text").val();

    $("#" + id + " .title").text(value);
    $(".edit-pane").fadeOut(300);
    $(".edit-pane input[type='text']").val("");
console.log('eh');
    var type="edit";
		$.ajax({
			url:'cubaddRoute.php',
			type:'post',
			data:{type:type,id:id,value:value},
			success:function(response){
				console.log(type);
			}
		});
  });


  $(".ui-icon-closethick").click(function () {
    $(".edit-pane").fadeOut(300);
  });

  function removeRoute() {
    $(".editremobtn").click(function () {
      $(".edit-pane").fadeOut(300);
      $("div[id*='" + id + "']").remove();

      var type="buang";
		$.ajax({
			url:'cubaddRoute.php',
			type:'post',
			data:{type:type,id:id},
			success:function(response){
        alert('dah buang');
				console.log(type);
				window.location.reload();
			}
		});
    });

  }



});