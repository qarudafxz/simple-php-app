<?php include __DIR__ . '/../config/database.php'; ?>

<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://cdn.tailwindcss.com"></script>
 <title></title>
</head>
<body>
 <?php include 'components\navbar.php'; ?>
 <div class="m-auto mt-14">
 <h1 class='text-center text-2xl font-bold'>Feedbacks</h1>
  <div class="flex flex-col gap-8">
   <?php if (empty($feedbacks)): ?>
    <p class='text-center text-xl mt-6 '>There are no feedbacks</p>
    <?php endif; ?>

    <?php foreach ($feedbacks as $item): ?>
     <div class="flex flex-col gap-4 m-auto mt-4 border border-black rounded-md p-4 w-5/12">
      <h1 class='font-bold'><?php echo $item['name']; ?></h1>
      <p><?php echo $item['body']; ?></p>
      <p>On <?php echo $item['date']; ?></p>
    </div>
     <?php endforeach; ?>
  </div>
 </div>
</body>
</html>