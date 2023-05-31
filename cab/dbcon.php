<?php

function dbset($sql,$options)
{
    $conn=mysqli_connect("localhost","root","","cabne");
    if($conn)
    {
        $qry=mysqli_query($conn,$sql);
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
            return mysqli_error($conn);
        }
        
    }
}

?>