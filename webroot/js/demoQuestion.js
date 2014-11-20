var demoPreparation = function () {
	$("#demoArea").removeClass("hide");
	$("#cover").height($("html").height());
	var offset = ($("h2").offset());
	$("#demoTestArea").css("top", offset.top);
}

var createDemoJson = function() {
	var question = converdJsonUseString($("#QuestionQuestion").val());
	var comment = converdJsonUseString($("#QuestionComment").val());

	var quot = '"'
	var demoJson = "{" + quot + "Test" + quot + ":{" + 
			quot + "title" + quot + ":" + quot + "demo" + quot + "}," +
			quot + "Question" + quot + ":[{" + 
			quot + "question" + quot + ":" + quot + question + quot + "," +
			quot + "comment" + quot + ":" + quot + comment + quot + "," +
			quot + "Selection" + quot + ":[";

	var selections = "";
	$("div#selections div.selection").each(function() {
		var selection = converdJsonUseString($(this).find('.selection').val());
		var correctFlg = $(this).find('.correct').prop("checked") ? "1" : "0";
		selections += "{" + quot + "selection" + quot  + ":" + quot + selection + quot + "," +
				quot + "correct_flg" + quot  + ":" + quot + correctFlg + quot +"}" + ",";
	});
	selections = selections.substring(0, selections.length - 1);

	demoJson += selections + "]}]}";
	return demoJson;
}