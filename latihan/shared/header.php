<div class="mt-3 p-3 bg-primary text-white rounded">
	
	<h1 style="font-size:60px; font-weight: bold;">YEID Pelatihan</h1>
	<p style="font-size:20px";>Web based Information System</p>	
	<h4 style="text-align: right;"> <?php echo date("l, d-m-y") ?></h4>	
	<h4 style="text-align: right;">Time: <b><span id="jam" style="font-size:30"></span></b></h4>
	
</div>
<html>
<head>
    <title></title>
</head>
<body>
	<?php date_default_timezone_set("Asia/jakarta"); ?> 
    <script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>
</body>
</html>