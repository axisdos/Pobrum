<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<div class="container">
<?php
include("db.php");

if (isset($_GET['id'])) {
$forumid = $_GET['id'];

$posts = array();

$stmt = $db->prepare("SELECT id, title, section, posts FROM `forums` WHERE id=" . $forumid);
$stmt->execute();
$stmt->bind_result($id, $title, $section, $postcnt);
$stmt->fetch();
$forum = array("id"=>$id, "title"=>$title, "section"=>$section, "posts"=>$postcnt);

$stmt->close();

$stmt = $db->prepare("SELECT id, title, posts, user, lastuser FROM `posts` WHERE forum=" . $forumid);
$stmt->execute();

$stmt->bind_result($id, $title, $postcnt, $user, $lastuser);

while ($stmt->fetch()) {
	 $posts[$id] = array("id"=>$id, "title"=>$title, "forum"=>$forumid, "posts"=>$postcnt, "user" => $user, "lastuser" => $lastuser);
}
$stmt->close();

echo "<h1>" . $forum['title'] . "</h1>";
echo "<br><table class='cat'><tr><th>Topic</th><th>Last Post</th></tr>";
foreach ($posts as $post=>$pdata) {
	echo "<tr><td><a href='viewforum.php?id=" . $pdata['id'] . "'>". $pdata['title'] ."</a><br><span style='font-size: 15px; color: #8C8C8C;'>Created by " . $pdata['user'] . "</span><br>";
	echo "<span style='font-size: 15px; color: #8C8C8C;'><i class='fa fa-comment'></i> " . $pdata['posts'] . "</span></td><td>" . $pdata['lastuser'] . "</td></tr>";
}
echo "</table>";

}

?>
</div>
