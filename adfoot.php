<script src="assets/js/popper.min.js" ></script>
<script src="assets/js/bootstrap.min.js" ></script>
<script src="assets/js/script.js"></script>


<script>
    $( document ).ready(function() {
        
    });
    setInterval(function() {check()}, 1000);

    function check()
    {
        $.get( "request.php?",{ tid: "<?php echo $tripid ?>"}, function( data ) {
       if(data==1)
       {
            $('#cabsts').html("<a href='cabinfo.php?tpid=<?php echo $tripid ?>'>View Cab info</a>");
            $('#sts').html("<img src='img.icons8.png'/>")
       }
        //alert(data );
      });
     
    }
    </script>
</body>
</html>