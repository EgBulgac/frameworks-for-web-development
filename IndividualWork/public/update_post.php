<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../src/controllers/PostController.php';
    $post_id = $_POST['post_id'];
    PostController::updatePost($post_id);
    exit();
}

$post_id = $_GET['id'] ?? null;

if (!$post_id) {
    header("Location: index.php");
    exit();
}

require_once __DIR__ . '/../src/models/Post.php';
$post = Post::findById($post_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>
        <form action="update_post.php" method="POST">
            <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
            <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea>
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <button type="submit">Update Post</button>
        </form>
    </div>
</body>
</html>
