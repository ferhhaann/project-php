<?php include 'config.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create New Post</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f9f9f9;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      background: #fff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }

    h1 {
      color: #2b6cb0;
      margin-bottom: 20px;
    }

    label {
      font-weight: 600;
      display: block;
      margin: 15px 0 5px;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      box-sizing: border-box;
    }

    button {
      margin-top: 20px;
      padding: 10px 16px;
      background-color: #2b6cb0;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
    }

    button:hover {
      background-color: #2c5282;
    }

    a.back-link {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      color: #2b6cb0;
      font-weight: bold;
    }

    a.back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>📝 Create New Post</h1>
    <form method="post">
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" required>

      <label for="content">Content:</label>
      <textarea name="content" id="content" rows="5" required></textarea>

      <button type="submit">➕ Post</button>
    </form>
    <a class="back-link" href="index.php">← Back to Posts</a>
  </div>
</body>
</html>
