var question = function() {
  $('button#aBtn').show();
  $('div#resultUnit').hide();
  $questionCount = $testJson.Question.length;
  $questionRand = Math.floor(Math.random() * $questionCount);
  $question = $testJson.Question[$questionRand];
  $("#testQuestions").html(replaceLineFeed($question.question));
  $("#testComment").html(replaceLineFeed($question.comment));

  $selectionCount = $question.Selection.length;
  $selectionRand = Math.floor(Math.random() * $selectionCount);
  $selections = $question.Selection;

  $selections.sort(function() {
    return Math.random() - 0.5;
  });

  $("#testSelections").empty();
  $.each($selections, function(idx, selection) {
    $tag = $("<div class='testSelection'>");
    $tag.append($("<input type='checkbox' class='in'>"));
    $tag.append($("<span>").html((idx + 1) + "）　"));
    $tag.append($("<span>").html(replaceLineFeed(selection.selection)));
    $tag.append($("<input type='hidden' class='ans'>").val(selection.correct_flg));
    $("#testSelections").append($tag)
  });
}

var answer = function() {
  $result = true;
  $(this).find("input#testCorrect").empty();
  $("div#resultUnit").show();
  $("button#aBtn").hide();
  var correct = "";

  $("div#testSelections .testSelection").each(function(idx) {
    $(this).find("input.in").attr("disabled", true);
    $in = $(this).find("input.in").prop("checked");
    $ans = $(this).find("input.ans").val();
    if (Boolean(Number($ans))) {
      if (correct == "") {
        correct = (idx + 1);
      } else {
        correct = correct + "," + (idx + 1);
      }
    }
    if ($in != $ans) {
      $result = false;
    }
  });
  $("div#testCorrect").html("correct : " + correct);
  if ($result) {
    $("span#testResult").html("Correct");
  } else {
    $("span#testResult").html("Incorrect");
  }
}