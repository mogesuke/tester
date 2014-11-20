<h2>Test Exec</h2>
<h5>-<span id="testTitle"></span>-<h5>

<?php echo $this->element('test/test_area'); ?>

<hr>
<script src="/js/stringUtil.js"></script>
<script src="/js/questions.js"></script>
<script>
$(function() {
  $test = $("#test").val();
  $testJson = $.parseJSON($test);
  $("#testTitle").html($testJson.Test.title);
  question();

  $('#aBtn').click(function() {
    answer();
  });

  $('#nqBtn').click(function() {
    question();
  });
});
</script>
