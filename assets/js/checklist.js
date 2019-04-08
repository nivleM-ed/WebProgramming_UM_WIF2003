$(document).ready(function () {
	var count = 1;
	var itemId;

	$(".header-btn").click(function () {
		count++;
		$(".modi-add").fadeIn(300);

	});

	$(".modi-add .modi-btn-cncl").click(function () {
		$(".modi-add").fadeOut(300);
	});

	$(".modi-add .modi-btn-save").click(function () {
		var value = $(".modi-add .modi-input-field:text").val();
		console.log(value);
		$("#item-cl").append('<div class="item-container">' +
			'<div class="item-box">' +
			'<input type="checkbox" class="cl-cb" id="check' + count + '"/>' +
			'<label for="check' + count + '">' + value + '</label>' +
			'<span class="edit-btn side-btn" for="check' + count + '"></span>' +
			'<span class="remv-btn side-btn" for="check' + count + '"></span>' +
			'</div>' +
			'</div>');

		clRemove(); //allow removal of items added via JQuery
		clEdit();
		$(".modi-add").fadeOut(300);
	});

	clRemove(); //allow removal of initial item before an item is added
	clEdit();

	function clRemove() {
		$(".remv-btn").click(function () {
			$(this).parents("div[class*='item-container']").remove();
			console.log(count);
		});
	}

	function clEdit() {
		$(".edit-btn").click(function () {
			$(".modi-edit").fadeIn(300);
			itemId = $(this).attr('for');
			var value = $("label[for='" + itemId + "']").text();
			$(".modi-edit .modi-input-field").val(value);
			console.log(value);
		});
	}

	$(".modi-edit .modi-btn-cncl").click(function () {
		$(".modi-edit").fadeOut(300);
	});

	$(".modi-edit .modi-btn-save").click(function () {
		var value = $(".modi-input-field:text").val();
		$(".modi-edit label[for='" + itemId + "']").text(value);
		$(".modi-edit label[for='" + itemId + "']").prepend("<div><i class='fa fa-check'></i></div>");
		$(".modi-edit").fadeOut(300);
		$(".modi-edit .modi-input-field").val("");
	});

});
