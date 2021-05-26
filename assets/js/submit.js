/** Submit Form **/
function SubmitFormData() {
  var firstName = $("#first-name").val();
  var lastName = $("#last-name").val();
  var email = $("#email").val();
  var yourStory = $("#your-story").val();
  $.post("submit.php", { firstName: firstName, lastName: lastName, email: email, yourStory: yourStory },
  function(data) {
     $('#results').html(data);
     $('#pledgeForm')[0].reset();
  });
}