<?php include 'config/database.php'; ?>

<?php
$name = $email = $body = '';
$nameError = $emailError = $bodyError = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['name'])) {
        $nameError = 'Name is required';
    } else {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($_POST['email'])) {
        $emailError = 'Email is required';
    } else {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_SANITIZE_SPECIAL_CHARS
        );
    }

    if (empty($_POST['body'])) {
        $bodyError = 'Body is required';
    } else {
        $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
    }

    if (empty($nameError) && empty($emailError) && empty($bodyError)) {
        $sql = "INSERT INTO feedback (name, email, body) VALUES('$name', '$email', '$body')";
        if (mysqli_query($conn, $sql)) {
            header('Location: http://localhost:3000/views/feedback.php');
        } else {
            echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
        }
    }
}

try {
} catch (Exception $err) {
    $nameError = $err->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://cdn.tailwindcss.com"></script>
 <title>Garuda Feedback</title>
</head>
<body>
 <?php include 'views\components\navbar.php'; ?>
 <div class='w-7/12 m-auto mt-14'>
  <h1 class='font-bold text-4xl text-center mb-4'>Feedback</h1>
  <p class='text-center text-xl'>Leave feedback for Almighty Garuda</p>
  <form action="<?php echo htmlspecialchars(
      $_SERVER['PHP_SELF']
  ); ?>" method="POST" class="flex flex-col gap-4 mt-10">
   <label for="name">Name</label>
   <input type="text" placeholder="Enter your name" name="name" class='py-4 pl-2 border border-black rounded-md focus:outline-none'/>
   <p class='text-red-500 font-semibold'><?php echo $nameError; ?></p>
   <label for="email">Email</label>
   <input type="email" placeholder="Enter your email" name="email" class='py-4 pl-2 border border-black rounded-md focus:outline-none'/>
   <p class='text-red-500 font-semibold'><?php echo $emailError; ?></p>
   <label for="body">Feedback</label>
   <textarea name="body" id="feedback" cols="30" rows="10" class='py-4 pl-2 border border-black rounded-md focus:outline-none'></textarea>
   <p class='text-red-500 font-semibold'><?php echo $bodyError; ?></p>
   <button type="submit" name="submit" class='text-white font-bold bg-black py-2 rounded-md hover:bg-red-500 duration-150'>Submit</button>
  </form>
 </div>
</body>
</html>