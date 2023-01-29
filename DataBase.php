<?php

class DataBase
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "oopscrud";
    private $mysqli = "";
    public $sql;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
    }


    public function insert($table, $para = array())
    {
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);
        $sql = "INSERT INTO $table($table_columns) VALUES ('$table_value')";
        $this->mysqli->query($sql);
    }

    public function select($table, $where = null)
    {
        if ($where != null) {
            $sql = "SELECT * FROM $table WHERE $where";
        } else {
            $sql = "SELECT * FROM $table";
        }
        $this->sql = $this->mysqli->query($sql);
    }

    public function update($table, $para = array(), $id)
    {
        $args = array();
        foreach ($para as $key => $value) {
            $args[] = "$key='$value'";
        }
        $sql = " UPDATE $table SET " . implode(',', $args) . "WHERE Id =$id";
        $this->mysqli->query($sql);
    }

    public function delete($table,$id){
        $sql = "DELETE FROM $table WHERE Id = $id";
        $this->mysqli->query($sql);
    }
}
?>