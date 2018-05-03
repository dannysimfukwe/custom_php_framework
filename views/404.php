<!DOCTYPE html>
<html>
<head>
    <title><?php echo $data['title'] ;?></title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.2.3/css/bulma.css">
    
    <style>
        body { padding-top: 40px; }
    </style>
</head>
<body>
<section class="hero">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
       <?php echo $data['title'] ?>
      </h1>
      <h2 class="subtitle">
        <?php echo $data['msg'] ?>
      </h2>
    </div>
  </div>
</section>
<div class="container is-fluid">
  <div class="notification">
   <p>Developed by <strong>Danny Simfukwe</strong></p>
  </div>
</div>
</body>
</html>
