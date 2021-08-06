<table border="1">
   <caption>Таблица прайс лист</caption>
   <tr>
    <th>id</th>
    <th>name</th>
    <th>price</th>
    <th>quantity</th>
    <th>category</th>
   </tr>
      <?php
      foreach ($products as $id => $product) { ?>
        <tr><td><?= $id ?></td>
          <td><?= $product['name'] ?></td>
          <td><?= $product ['price'] ?></td>
          <td><?= $product ['quantity'] ?></td>
          <td><?= $product ['category'] ?></td></tr>
      <?php }
      ?>
</table>
