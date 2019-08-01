
<body>
    <ul>
        <?php foreach ($productCollection as $item): ?>
        <li><?=$item->getTitle() ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>