<?php


class Db
{

    public $pdo;

    public function __construct()
    {

        $settings = $this->getPDOSettings();
        $this->pdo = new \PDO($settings['dsn'], $settings['user'], $settings['pass'], null);

    }

    protected function getPDOSettings()
    {

        $config = include 'application/Config/Db.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }

    public function execute($query, array $params=null)
    {

        if(is_null($params)){
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function queryCount($query, array $params=null)
    {
        $stmt = $this->pdo->query($query);
        return $stmt->fetchColumn();
    }

    public function insertDatas($query, $params="")
    {
        $stmt = $this->pdo->prepare($query);
        try {
          $stmt->execute($params);
          return 'Данные внесены!';
        }catch (Exception $e){
          return $e;
        }
    }
}

?>
