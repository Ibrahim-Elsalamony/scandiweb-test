<div class="content">
    <div class="container">
        <div class="cart-container">
            <?php foreach ($products as $product): ?>
                <div class="cart-item" data-id="<?php echo htmlspecialchars($product['id']); ?>">
                    <input type="checkbox" class="delete-checkbox" />
                    <div class="product-info">
                        <p><?php echo htmlspecialchars($product['sku']); ?></p>
                        <p><?php echo htmlspecialchars($product['name']); ?></p>
                        <p><?php echo htmlspecialchars($product['price']); ?> $</p>
                        <?php if ($product['type'] === 'DVD'): ?>
                            <p>Size: <?php echo htmlspecialchars($product['size']); ?> MB</p>
                        <?php elseif ($product['type'] === 'Furniture'): ?>
                            <p>Dimension: <?php echo htmlspecialchars($product['height']); ?>x<?php echo htmlspecialchars($product['width']); ?>x<?php echo htmlspecialchars($product['length']); ?></p>
                        <?php elseif ($product['type'] === 'Book'): ?>
                            <p>Weight: <?php echo htmlspecialchars($product['weight']); ?> KG</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>