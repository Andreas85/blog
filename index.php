<?php

include 'config/database.php';

if ($_GET['debug'] == 'true') {
    $where = "enabled = 0";
} else {
    $where = "enabled = 1";
}

if (isset($_GET['post'])) {
    $sql = "SELECT * FROM posts WHERE link = '" . $conn->real_escape_string($_GET['post']) . "' AND " . $where;
} else {
    $sql = "SELECT * FROM posts WHERE " . $where . " ORDER BY id DESC";
}

$result = $conn->query($sql);

?>
<html>
<head>
<title>Andreas Larsson Blog</title>

<?php include 'config/analytics.php'; ?>

<link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
</head>

<?php

  while ($row = $result->fetch_assoc()) { ?>
    <table class="post-table" data-id="<?php echo $row['id'] ?>" width="600">
      <tr>
        <td>
          <h1 style="margin:0px"><a href="index.php?post=<?php echo $row['link']?>"><?php echo $row['title'] ?></a></h1>
        </td>
      </tr>
      <tr>
        <td><?php echo $row['datetime'] ?></td>
      </tr>
      <tr>
        <td>
          <span class="post-body"><?php echo nl2br($row['body']) ?></span>
        </td>
      </tr>
    </table>
<?php
  } 
?>
