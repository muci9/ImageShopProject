<body>
    <ul>
        <?php foreach ($productCollection as $item): ?>
        <li>
            <img src='<?=$item->getThumbnailPath();?>' style="width: 400px; height: 300px;" />
            <a href="product/detail?id=<?=$item->getId() ?>">Buy</a>
            <h4><?=$item->getTitle() ?></h4>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>