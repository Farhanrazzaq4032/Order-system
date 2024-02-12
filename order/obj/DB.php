<?php
class DB
{

    private $con;
    protected $result = null;

    function connection()
    {
        $this->con = mysqli_connect(HOST, USER, PASS, DATA_BASE);
    }
    function runQuery($sql)
    {
        $this->connection();
        if ($this->con) {
            $this->result = mysqli_query($this->con, $sql);
            return true;
        }
        return false;
    }

    function getRecord($is_single)
    {
        $data = array();
        if ($this->result) {
            if ($is_single) {
                $data = mysqli_fetch_assoc($this->result);
            } else {
                while ($row = mysqli_fetch_assoc($this->result)) {
                    $data[] = $row;
                }
            }
        }
        return $data;
    }

    function insert($sql)
    {
        $result = $this->runQuery($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    function select($sql, $is_single = false)
    {
        $this->runQuery($sql);
        return $this->getRecord($is_single);
    }
}
