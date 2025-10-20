<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars(trim($_POST["name"]));
  $email = htmlspecialchars(trim($_POST["email"]));
  $subject = htmlspecialchars(trim($_POST["subject"]));
  $message = htmlspecialchars(trim($_POST["message"]));

  $to = "micamyang@gmail.com";  // 📩 받는 메일 주소
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

  $body = "
  <html>
    <body style='font-family: Arial, sans-serif; background-color:#f9f9f9; padding:20px;'>
      <div style='background:#ffffff; border-radius:8px; padding:20px; box-shadow:0 0 10px rgba(0,0,0,0.05);'>
        <h2 style='color:#556b8b;'>📩 New Message from Your Portfolio Site</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Subject:</strong> {$subject}</p>
        <p style='margin-top:20px;'><strong>Message:</strong></p>
        <div style='white-space: pre-wrap; background:#f2f2f2; padding:15px; border-radius:8px;'>{$message}</div>
      </div>
    </body>
  </html>
  ";

  if (mail($to, $subject, $body, $headers)) {
    $success = "✅ Your message has been sent successfully!";
  } else {
    $error = "❌ Sorry, something went wrong. Please try again later.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact</title>
  <link rel="icon" href="./assets/images/mica.png" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <div class="contact-container">
    <div class="contact-inner">
      <h1>Contact Me</h1>

      <?php if (!empty($success)): ?>
        <p class="success-msg"><?= $success ?></p>
      <?php elseif (!empty($error)): ?>
        <p class="error-msg"><?= $error ?></p>
      <?php endif; ?>

      <form action="contact.php" method="POST" class="contact-form">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
      </form>

      <div class="social-links">
        <a href="https://github.com/micamyang" target="_blank">
          <img src="./assets/images/GitHub.png" alt="GitHub" class="social-icon">
        </a>
        <a href="https://www.linkedin.com/in/youngmin-sinn-b7bb93247/" target="_blank">
          <img src="./assets/images/Linkedin.png" alt="LinkedIn" class="social-icon">
        </a>
      </div>
    </div>
  </div>
</body>
</html>
