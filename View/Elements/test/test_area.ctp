<div id="testArea">
  <h4 class="title">Question</h4>
  <div id="testQuestions"></div><p></p>
  <h4 class="title">Selections</h4>
  <div id="testSelections"></div><p></p>

  <p>
    <button id="aBtn" class="btn btn-sm btn-success">Answer</button>
  </p>

  <div id="resultUnit">
    <h4 class="title">Result : <span id="testResult"></span></h4>
    <div id="testCorrect"></div>
    <h4 class="title">Comment</h4>
    <div id="testComment"></div>
    <p></p>
    <p>
      <button id="nqBtn" class="btn btn-sm btn-success">Next Question</button>
    </p>
  </div>
</div>

<input type="hidden" id="test" value='<?php echo isset($test) ? $test : "";  ?>'>
