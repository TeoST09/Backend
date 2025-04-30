<?php if (isset($product)): ?>
	<h1><?= $product->nombre ?></h1>
	<div id="detail-product">
		<div class="image">
			<?php if ($product->imagen != null): ?>
				<img src="<?= base_url ?>uploads/images/<?= $product->imagen ?>" />
			<?php else: ?>
				<img src="<?= base_url ?>assets/img/camiseta.png" />
			<?php endif; ?>
		</div>
		<div class="data">
			<h2>Stock: <?= $product->stock ?></h2>
			<h3 class="description"><?= $product->descripcion ?></h3>
			<?php if ($product->oferta > 0): ?>
				<h3>Oferta: <?= $product->oferta?></h3>
			<?php else: ?>
				<h3 class="price"><?= $product->precio ?>$</h3>
			<?php endif; ?>
			<?php if ($product->stock > 0): ?>
			<a href="<?=base_url?>carrito/add&id=<?=$product->id?>"><button class="btn">Comprar</button></a>
			<?php else: ?>
				<button class="btna" disabled="disabled">No disponible</button>
			<?php endif; ?>
		</div>
	</div>
<?php else: ?>
	<h1>El producto no existe</h1>
<?php endif; ?>
