<?php
    class dbcon
    {

    public $dbhost;
    public $dbuser;
    public $dbpass;
    public $dbname;
    public $server;
    public $db;
    public $conn;

    function __construct(){

    $this->conn = new mysqli("localhost","root","", "cabne");
       

    if ($this->conn->connect_error) {
    die("Connection failed: " . $this->conn->connect_error);
    }
    }

    }

    function dbset($sql,$options)
{
    $con=mysqli_connect("localhost","root","","cabne");
    if($con)
    {
        $qry=mysqli_query($con,$sql);
        if($options==1)
        {
            return $qry;
        }
        elseif($options==2)
        {
            $row=mysqli_num_rows($qry);
            return $row;

        }
        elseif($options==3)
        {
            $rlt=mysqli_fetch_array($qry,MYSQLI_NUM);
            return $rlt;

        }
        elseif($options==4)
        {
            $rlt=mysqli_fetch_array($qry);
            return $rlt;

        }
        else
        {
            return mysqli_error($con);
        }
        
    }
}
    ?>