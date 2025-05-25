<?php include 'config.php'; ?>
<?php
$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$id]);
}
header("Location: index.php");
exit;
