<?php
class Database{
    public $host="localhost";
    public $user="root";
    public $password="";
    public $database="simple_shop";
    public $connection;
    /**
     * phương thức khởi tạo
     *
     * database constructor.
     */

    public function __construct()
    {
        $this->connection=$this->connectdatabase();
    }
    /**
     * phương thức kết nối dữ liệu
     * return sql
     */
    public function connectDatabase(){
        $connection=mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $connection;
    }

    /**
     * phương thức chạy câu truy vấn trong sql
     * @param $sql
     * @return array
     */
    public function runQuery($sql){
        $data= array();
        $result=mysqli_query($this->connection,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        return $data;
    }

    /**
     * phương thức đếm số bàn nghi trong câu lệnh query
     * @param $sql
     * @return int
     */
    public function numRows($sql){
        $result= mysqli_query($this->connection,$sql);
        $count=mysqli_num_rows($result);
        return $count;

    }
}