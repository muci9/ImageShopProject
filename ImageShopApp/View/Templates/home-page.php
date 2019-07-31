<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>
    <ul>
        <?php foreach ($productCollection as $item): ?>
        <li><?=$item->getTitle() ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>