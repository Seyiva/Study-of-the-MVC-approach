<div id="content">
	<table>
		<tr>
			<th>id</th>
			<th>name</th>
      <th>price</th>
      <th>quantity</th>
      <th>description</th>
			<th>link</th>
		</tr>
		<?php foreach ($products as $product): ?>
		<tr>
			<td><?= $product['id']; ?></td>
			<td><?= $product['name']; ?></td>
      <td><?= $product['price']; ?></td>
      <td><?= $product['quantity']; ?></td>
      <td><?= $product['description']; ?></td>
			<td><a href="/product/<?= $product['id']; ?>/">link on product</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
