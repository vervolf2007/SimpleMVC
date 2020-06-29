<?php
class Model_AddTask extends Model
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

  public function insert_data() {

	    $DB = new DB();
	    $name = strip_tags($_REQUEST['name']);
	    $email = strip_tags($_REQUEST['email']);
	    $text = strip_tags($_REQUEST['exampleFormControlTextarea']);
			if(empty($text)){
					$text = 'stag';
			}
	    $sql = "INSERT INTO tasks (`name`, `email`, `text`) VALUES (?,?,?)";
			$datas_ = [$name, $email, $text];
	    $stmt = $DB->insertDatas($sql,$datas_);
			return $stmt;
  }

	public function get_dataById()
	{
			$id = $_GET['id'];
			$DB = new DB();
			$sql = "SELECT * FROM tasks WHERE id=$id";
			$data = $DB->execute($sql);
			$data[0][result] = '';
			return $data;
	}

	public function save_data()
	{
			$DB = new DB();
			$id = strip_tags($_REQUEST['task_id']);
			$name = strip_tags($_REQUEST['name']);
			$email = strip_tags($_REQUEST['email']);
			$text = strip_tags($_REQUEST['exampleFormControlTextarea']);
			if(empty($text)){
					$text = 'stag';
			}
			$status = strip_tags($_REQUEST['status']);
			if($status == 'on'){
				$status = 1;
			}
			else {
				$status = 0;
			}

			$is_edited=0;
			$sql = "SELECT * FROM tasks WHERE id=$id";
			$data = $DB->execute($sql);
			foreach ($data as $value) {
				if ($value['name'] <> $name || $value['email'] <> $email || $value['text'] <> $text) {
					$is_edited=1;
				}
			}

			$sql = "UPDATE tasks SET name=?, email=?, text=?, status=?, edited=? WHERE id=?";
			$datas_ = [$name, $email, $text, $status, $is_edited, $id];
	    $stmt = $DB->insertDatas($sql,$datas_);

			$sql = "SELECT * FROM tasks WHERE id=$id";
			$data = $DB->execute($sql);
			$data[0][result] = $stmt;

			return $data;
	}

}

?>
