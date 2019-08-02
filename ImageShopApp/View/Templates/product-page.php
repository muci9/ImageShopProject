<body>
<br />
<br />
<div>
    <h2>
        <?php echo $product->getTitle(); ?>
    </h2>
    <img src='/<?=$product->getThumbnailPath(); ?>' style="max-width: 400px; max-height: 300px;" />
    <h4>
        <?php echo $product->getCaptureDate(); ?>
    </h4>
    <p>
        <?php echo $product->getDescription(); ?>
    </p>
</div>
</body>
</html>
