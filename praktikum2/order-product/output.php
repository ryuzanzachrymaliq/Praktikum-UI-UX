<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $title = htmlspecialchars($_POST['title']);
  $description = htmlspecialchars($_POST['description']);
  $account = htmlspecialchars($_POST['account']);
  $bank = htmlspecialchars($_POST['bank']);
  $holder = htmlspecialchars($_POST['holder']);
  $transaction = htmlspecialchars($_POST['transaction']);
  $phone = htmlspecialchars($_POST['phone']);
  $email = htmlspecialchars($_POST['email']);
  $price = htmlspecialchars($_POST['price']); // Price sebagai teks biasa

  // Upload gambar
  $picture = "";
  if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) mkdir($targetDir);
    $picture = $targetDir . basename($_FILES['picture']['name']);
    move_uploaded_file($_FILES['picture']['tmp_name'], $picture);
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Order Result</title>
    <link rel="stylesheet" href="assets/css/output.css">
  </head>
  <body>
    <fieldset>
      <h1>THANK YOU!</h1>
      <p>We have received the following information:</p>
      <ul>
        <li><b>Title:</b> <?= $title ?></li>
        <li><b>Description:</b> <?= $description ?></li>
        <li><b>Account Number:</b> <?= $account ?></li>
        <li><b>Bank:</b> <?= $bank ?></li>
        <li><b>Account Holder:</b> <?= $holder ?></li>
        <li><b>Price:</b> <?= $price ?></li> <!-- 💬 price teks biasa -->
        <li><b>Transaction:</b> <?= $transaction ?></li>
        <li><b>Phone:</b> <?= $phone ?></li>
        <li><b>Email:</b> <?= $email ?></li>
        <?php if ($picture): ?>
          <li><b>Uploaded Picture:</b><br><img src="<?= $picture ?>" width="200"></li>
        <?php endif; ?>
      </ul>
    </fieldset>
  </body>
  </html>
<?php
} else {
  echo "<script>alert('Please fill out the form first.'); window.location.href='index.html';</script>";
  exit();
}
?>
