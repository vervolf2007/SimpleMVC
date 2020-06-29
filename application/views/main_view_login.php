<?php
$count=1;
$current_page = $data[0];
$pages = $data[1];
$data_s = $data[2];
$name_order = $data[3];
$order = $data[4];
$norder = 'ASC';
$eorder = 'ASC';
$sorder = 'ASC';
if($name_order == 'name'){
  if($order == 'ASC'){
    $norder = 'DESC';
  }else{
    $norder = 'ASC';
  }
} elseif ($name_order == 'email'){
  if($order == 'ASC'){
    $eorder = 'DESC';
  }else{
    $eorder = 'ASC';
  }
} elseif ($name_order == 'status'){
  if($order == 'ASC'){
    $sorder = 'DESC';
  }else{
    $sorder = 'ASC';
  }
}
 ?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" width="10px">#</th>
      <th scope="col" width="150px"><a href="/main/index?p=<?php echo $current_page; ?>&f_order=name&order=<?php echo $norder; ?>">Имя пользователя</a></th>
      <th scope="col" width="150px"><a href="/main/index?p=<?php echo $current_page; ?>&f_order=email&order=<?php echo $eorder; ?>">E-mail</a></th>
      <th scope="col" width="300px">Текст задчи</th>
      <th scope="col" width="100px"><a href="/main/index?p=<?php echo $current_page; ?>&f_order=status&order=<?php echo $sorder; ?>">Статус</a></th>
      <th scope="col" width="90px">&nbsp;&nbsp;</th>
      <th scope="col" width="100px">&nbsp;&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data_s as $value) { ?>
      <tr>
        <th scope="row"><?php echo $count; ?></th>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><?php echo $value['text']; ?></td>
        <td><?php
          if ($value['status'] == 0) {
            echo 'В работе';
          } else {
            echo 'Выполнено';
          }
        ?></td>
        <td><?php
          if ($value['edited'] == 0) {
            echo '';
          } else {
            echo 'Отредактировано администратором';
          }
        ?></td>
        <td><a href="/addtask/edittask?id=<?php echo $value['id']; ?>">Редактировать</a></td>
      </tr>
    <?php
      $count++;
    } ?>
  </tbody>
</table>
<div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php
          $prev_page = $current_page-1;
          if($prev_page == 0){
            echo '<li class="page-item disabled">';
            echo '<a class="page-link" href="#" aria-label="Previous">';
          }else{
            echo '<li class="page-item">';
            echo '<a class="page-link" href="/main/index?p='.$prev_page.'&f_order='.$name_order.'&order='.$order.'" aria-label="Previous">';
          }
         ?>
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <?php for ($i=1; $i<=$pages; $i++) {
          if($i == $current_page){
            $active = 'active';
          }else{
            $active = '';
          }
          ?>
          <li class="page-item <?php echo $active; ?>"><a class="page-link" href="/main/index?p=<?php echo $i; ?>&f_order=<?php echo $name_order; ?>&order=<?php echo $order; ?>"><?php echo $i; ?></a></li>
      <?php } ?>
        <?php
          $next_page = $current_page+1;
          if($next_page > $pages){
              echo '<li class="page-item disabled">';
              echo '<a class="page-link" href="#" aria-label="Next">';
          } else {
              echo '<li class="page-item">';
              echo '<a class="page-link" href="/main/index?p='.$next_page.'&f_order='.$name_order.'&order='.$order.'" aria-label="Next">';
          }
         ?>
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
</div>
