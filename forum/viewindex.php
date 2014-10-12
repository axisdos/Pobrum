<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style.css">
<div class="container">
<?php
include("db.php");

$sections = array();
$forums = array();

$stmt = $db->prepare("SELECT id, title FROM `sections`");
$stmt->execute();
$stmt->bind_result($id, $title);

while ($stmt->fetch()) {
	 $sections[$id] = $title;
}

$stmt = $db->prepare("SELECT id, title, section, posts FROM `forums`");
$stmt->execute();

$stmt->bind_result($id, $title, $sid, $posts);

while ($stmt->fetch()) {
	 $forums[$id] = array("id"=>$id, "title"=>$title, "section"=>$sid, "posts"=>$posts);
}

?>

<?php

foreach ($sections as $section=>$sname) {
	echo "<br><table class='cat'><tr><th>" . $sname . "</th></tr>";
	foreach ($forums as $forum=>$fdata) {
		if ($fdata["section"] == $section) {
			echo "<tr><td><a href='viewforum.php?id=" . $fdata['id'] . "'>". $fdata['title'] ."</a><br><br>";
			echo "<span style='font-size: 15px; color: #8C8C8C;'><i class='fa fa-comment'></i> " . $fdata['posts'] . "</span></td></tr>";
		}
	}
	echo "</table>";
}

?>
</div>
