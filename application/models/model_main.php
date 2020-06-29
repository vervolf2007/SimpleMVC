<?php
class Model_Tasks extends Model
{

	public function get_data()
	{
      $DB = new DB();
      $p = $_GET['p'];
      $f_order = $_GET['f_order'];
      $order = $_GET['order'];
      if(isset($p)){
        $pageno = $p;
      }else{
        $pageno = 1;
      }
      if(!isset($f_order)){
        $f_order = 'name';
        $order = 'ASC';
      }

      $no_of_records_per_page = 3;
      $offset = ($pageno-1) * $no_of_records_per_page;

      $total_pages_sql = "SELECT COUNT(*) FROM tasks";
      $total_rows = $DB->queryCount($total_pages_sql);
      $total_pages = ceil($total_rows / $no_of_records_per_page);

      $sql = "SELECT * FROM tasks ORDER BY $f_order $order LIMIT $offset, $no_of_records_per_page";
      $datas = array($pageno,$total_pages,$DB->execute($sql),$f_order,$order);

      return $datas;
  }

}

?>
