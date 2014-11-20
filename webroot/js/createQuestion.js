var addSelectionField = function() {
	$tmpSelectionField = $("#template").clone();
	$tmpSelectionField.removeAttr("id");
	$tmpSelectionField.addClass("selection");
	addRemoveSelectionButton($tmpSelectionField.find('label'));
	$("#selections").append($tmpSelectionField);
	resetSelectionIndex();
	return false;
}

var addRemoveSelectionButton = function(target) {
	jqlink = $("<a>").addClass("btn btn-xs btn-danger removeSelection").attr("href", "#").text("Delete");
	target.append(jqlink);
 	return false;
}

var addAllRemoveSelectionButton = function() {
	$("div#selections div.selection").each(function() {
		addRemoveSelectionButton($(this).find('label'));
	});
}

var removeSelectionField = function(target) {
    target.parents("div.selection").remove();
	resetSelectionIndex();
 	return false;
}

var resetSelectionIndex = function() {
	var i = 0;
	$("div#selections div.selection").each(function() {
		$(this).find('.selection').attr("name", "data[Selection][" + i + "][selection]");
		$(this).find('input').attr("name", "data[Selection][" + i + "][correct_flg]");
		i++;
	});
}
