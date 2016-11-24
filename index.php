<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>购物车</title>
<script type="text/javascript" src="./js/jquery.js"></script>
</head>
<body>
<div style="width:200px; margin:0 auto;">
    <div>
    <img src="https://www.baidu.com/img/baidu_jgylogo3.gif" width="100"/>
    </div>
    <div>
    <input type="button" value="加入购物车" data-val='1' data-nam="洗洁精" class="add_var"/></div>
    </div>
</div>
<div style="width:200px; margin:0 auto;">
    <div>
    <img src="https://www.baidu.com/img/baidu_jgylogo3.gif" width="100"/>
    </div>
    <div>
    <input type="button" value="加入购物车" data-val='2' data-nam="打火机" class="add_var" /></div>
    </div>
</div>
<script type="text/javascript">
	$(function(){
		$(".add_var").click(function(){
			var add_var=$(this).data("val");
			var tit=$(this).data("nam");
			$.ajax({
			   type: "POST",
			   url: "./lib/check.php",
			   data: "id="+add_var+"&name="+tit,
			   success: function(msg){
				 alert( "添加购物车成功！" );
				 window.location.reload();
			   }
			});
		});	
		
		
		$(".del").click(function(){
			var did=$(this).data("id");
			$.ajax({
			   type: "POST",
			   url: "./lib/del.php",
			   data: "did="+did,
			   success: function(msg){
				 alert( "移除购物车成功！" );
				 window.location.reload();
			   }
			});
		});
		
	})
	
</script>


<div>
	<div>购物车数据</div>
	<ul>
    	<?php
		//$_SESSION["car"]='';
			//print_r($_SESSION);
			$car=$_SESSION['car'];
			foreach($car as $key =>$val){
		?>
            <li>
				<?php echo $val['name']."--".$val['id']."--".$val['num'];?>
                <span><input type="button" value="删除" class="del" data-id="<?=$val['id']?>"/></span>
            </li>
		<?php	
            }
		?>
    </ul>
</div>

</body>
</html>