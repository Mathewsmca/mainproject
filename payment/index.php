<?php
session_start();

include "../dbcon.php";
$ids=$_GET['id'];
$sql = "SELECT *  FROM `ride` WHERE `rideid` LIKE '$ids';";
$kls=dbset($sql,4);
$_SESSION['amttrip']=$ids;

?>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body { margin-top:20px; }
.panel-title {display: inline;font-weight: bold;}
.checkbox.pull-right { margin: 0; }
.pl-ziro { padding-left: 0px; }
</style>
<centre>
<div class="container ">
    <div class="row mx-auto">
        <div class="col-xs-12 col-md-4 mx-auto">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                 
                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" pattern="[4-9]{1}[0-9]{15}" 
       title="Enter Valid card Number" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expityMonth">
                                    EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right">&#x20B9; <?php echo $kls['total_fare'] ?></span> Final Payment</a>
                </li>
            </ul>
            <br/>
            <a href="progrees.php" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
        </div></form>
        <div class="col-xs-8 col-md-8 ">
            <img  class="img-fluid" src="../online-payments_mode-banner.jpg"/>
        </div> 
    </div>
</div>
</centre>