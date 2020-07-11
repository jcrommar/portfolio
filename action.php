<?PHP
  // form handler
  if($_POST && isset($_POST['sendfeedback'], $_POST['nameZone'], $_POST['emailZone'], $_POST['subjectZone'], $_POST['messageZone'])) {

    $nameZone = $_POST['nameZone'];
    $emailZone = $_POST['emailZone'];
    $subjectZone = $_POST['subjectZone'];
    $messageZone = $_POST['messageZone'];

    if(!$nameZone) {
      $errorMsg = "Please enter your Name";
    } elseif(!$emailZone || !preg_match("/^\S+@\S+$/", $emailZone)) {
      $errorMsg = "Please enter a valid Email address";
    } elseif(!$messageZone) {
      $errorMsg = "Please enter your comment in the Message box";
    } else {
      // send email and redirect
      $to = "jcromualdo24@gmail.com";
      if(!$subjectZone) $subjectZone = "Contact from jcrommar.github.io";
      $headers = "From: info@jcrommar.github.io" . "\r\n";
      mail($to, $subjectZone, $messageZone, $headers);
      header("Location: https://jcrommar.github.io/portfolio/");
      exit;
    }

  }
?>