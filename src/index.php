<?php
include 'config.php';

try {
    $pdo->query("SELECT 1");
    $status = "Welcome to the PHP application. All connections successful.";
} catch (Exception $e) {
    $status = "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simple PHP Blog</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: #f9f9f9;
    }

    .container {
      max-width: 700px;
      margin: 40px auto;
      padding: 20px;
      background: #fff;
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
      border-radius: 10px;
    }

    h1 {
      color: #2b6cb0;
      margin-bottom: 10px;
    }

    .status {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 8px;
      background: #e6fffa;
      border: 1px solid #319795;
      color: #234e52;
      font-weight: bold;
    }

    a.button {
      display: inline-block;
      padding: 10px 16px;
      background: #2b6cb0;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      margin-bottom: 20px;
      transition: background 0.3s ease;
    }

    a.button:hover {
      background: #2c5282;
    }

    .post {
      border-top: 1px solid #ccc;
      padding-top: 20px;
      margin-top: 20px;
    }

    .post h2 {
      margin: 0 0 8px;
      color: #333;
    }

    .post p {
      margin: 0 0 12px;
      line-height: 1.6;
    }

    .post small {
      color: #666;
    }

    .delete-link {
      color: #e53e3e;
      text-decoration: none;
      font-size: 14px;
      margin-left: 10px;
    }

    .delete-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="status"><?php echo htmlspecialchars($status); ?></div>
    <a href="post.php" class="button">+ Create New Post</a>

    <?php
    $stmt = $pdo->query('SELECT * FROM posts ORDER BY created_at DESC');
    while ($row = $stmt->fetch()) {
        echo "<div class='post'>";
        echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo "<small>Posted on " . htmlspecialchars($row['created_at']) . "</small>";
        echo " <a class='delete-link' href='delete.php?id=" . $row['id'] . "'>Delete</a>";
        echo "</div>";
    }
    ?>
  </div>
</body>
</html>
