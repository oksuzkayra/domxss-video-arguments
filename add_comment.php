<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "mydb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $user = $_GET['username'] ?? '';
    $comment = $_GET['comment'] ?? '';

    if ($user && $comment) {
        $stmt = $conn->prepare("INSERT INTO comments (username, comment) VALUES (:username, :comment)");
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':comment', $comment);
        $stmt->execute();
    }

    $stmt = $conn->prepare("SELECT * FROM comments");
    $stmt->execute();
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($comments);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
