<?PHP
  // form handler
  if($_POST && isset($_POST['sendfeedback'], $_POST['nameZone'], $_POST['emailZone'], $_POST['subjectZone'], $_POST['messageZone'])) {

    $name = $_POST['nameZone'];
    $email = $_POST['emailZone'];
    $subject = $_POST['subjectZone'];
    $message = $_POST['messageZone'];

    if(!$name) {
      $errorMsg = "Please enter your Name";
    } elseif(!$email || !preg_match("/^\S+@\S+$/", $email)) {
      $errorMsg = "Please enter a valid Email address";
    } elseif(!$message) {
      $errorMsg = "Please enter your comment in the Message box";
    } else {
      // send email and redirect
      $to = "jcromualdo24@gmail.com";
      if(!$subject) $subject = "Contact from jcrommar.github.io";
      $headers = "From: info@jcrommar.github.io" . "\r\n";
      mail($to, $subject, $message, $headers);
      header("Location: https://jcrommar.github.io/portfolio/");
      exit;
    }

  }
?>