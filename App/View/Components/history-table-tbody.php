<tbody>
  <?php 
    if(is_array($orders)):
      foreach($orders as $order):
  ?>
    <tr>
      <td><?=$order->getId()?></td>
      <td><?=$order->getUser()?></td>
      <td><a href="<?="/shop/" . $order->getCategory() . "/" . $order->getAlias()?>"><?=$order->getProduct()?></a></td>
      <td><?=$order->getQuantity()?></td>
      <td><?=$order->getPrice()?></td>
      <td><?=$order->getStatus()?></td>
      <td><?=$order->getCreatedAt()?></td>
      <td><?=$order->getUpdatedAt()?></td>
    </tr>
  <?php 
      endforeach;
    endif;
  ?>
  </tbody>