<?php
// This file contains the HTML form for editing an existing post.

require_once '../../config/database.php';
require_once '../../models/Post.php';

$postId = $_GET['id'] ?? null;
$post = null;

if ($postId) {
    $database = new Database();
    $db = $database->getConnection();
    $postModel = new Post($db);
    $post = $postModel->getPostById($postId);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';

    if ($post) {
        $postModel->updatePost($postId, $title, $content);
        header('Location: /php-crud-app/public/dashboard.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post->title ?? ''); ?>" required>
        
        <label for="content">Content:</label>
        <textarea id="content" name="content" required><?php echo htmlspecialchars($post->content ?? ''); ?></textarea>
        
        <button type="submit">Update Post</button>
    </form>
    <a href="/php-crud-app/public/dashboard.php">Cancel</a>
</body>
</html>