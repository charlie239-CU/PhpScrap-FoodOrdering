<?php
session_start();
include_once("connection.php");
$uname="";
$status=0;
$text1="";
$text2="";
STATIC $num=1;
$display="";
if(isset($_SESSION['log_status']))
{
	$status=$_SESSION['log_status'];
}
if($status==1)
{
	$text1="none";
	$text2="block";
	$uname=$_SESSION['uname'];
}
else
{
	
	$text1="block";
	$text2="none";
}
$sql=mysqli_query($conn,"select count(r_name) from restaurant");
$result=mysqli_fetch_array($sql);
$size=$result[0];
STATIC $limit=0;
$i=0;
function star_function($star_n)
{
	if($star_n==0)
	{
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==1)
	{
		echo "<span class='fa fa-star checked'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==2)
	{
		echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==3)
	{
		echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
		echo "<span class='fa fa-star'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==4)
	{
		echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
		echo "<span class='fa fa-star'></span>";

	}
	else if($star_n==5)
	{
		echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";
	echo "<span class='fa fa-star checked'></span>";	
	echo "<span class='fa fa-star checked'></span>";
	

	}
	else
	{
		exit();
	}
	
}
function tabs($display_f,$array_f,$star_f,$num_f,$address_f,$description_f,$r_id_f,$image_f)
{

	echo "<td><div class='box' style='display:".$display_f."' >";
	echo "<div class='img_container'>";
     echo "<a href='#'><img src='images_rest/".$image_f."' onclick=document.getElementById('r".$num_f."').style.display='block' class='rest_img'  ></a></div>";

echo '<div class="data_container"><p class="in_container4"><font color="black"><b>'.$array_f.'</font></b></p>';
echo '<p class="in_container3">'.$address_f.'</p></div>';
echo "<div id='r".$num_f."'class='modal'>";
  
  echo "<div class='modal-content animate' >";
  
    echo "<div class='imgcontainer'>";
      echo "<span onclick=document.getElementById('r".$num_f."').style.display='none' class='close' title='Close Modal'>&times;</span>";
     
	 echo  "<img src='images_rest/".$image_f."' alt='Avatar' class='avatar'></div>";

    echo '<div class="in_container">';
     echo "<a href='food.php?r_id=".$r_id_f."&r_name=".$array_f."'><h2 align='center' class='in_container' id='in_container4'>".$array_f."</h2></u></a>";
	 echo  "<h4 align='center' class='in_container3'>".$address_f."</h4>";
		 echo '<center>';
		 echo '<div class="in_container2">';
		 star_function($star_f);
		 echo "</div>";
		 echo '</center>';
		 
	  echo "<p align='center' class='in_container5' id='in_container5'>".$description_f."</p>";
	
	

	  
    echo '</div></div></div>';
echo '</div></td>';
}

?>


<?php include("head.php"); ?>
<div id="container">
<center>
<table id="restaurants" border=0>
<?php
$array[$size]=array();
$star[$size]=array();
$address[$size]=array();
$desc[$size]=array();
$r_id[$size]=array();
$image[$size]=array();
$sql=mysqli_query($conn,"select * from restaurant");

$i=0;
while($result=mysqli_fetch_assoc($sql))
{
$array[$i]=@$result['r_name'];
$star[$i]=@$result['rating'];
$address[$i]=@$result['address'];
$desc[$i]=@$result['description'];
$r_id[$i]=@$result['r_id'];
$image[$i]=@$result['image'];
$i++;

}

/*$i=0;
$sql2=mysqli_query($conn,"select rating from restaurant");
while($result=mysqli_fetch_row($sql2))
{
$star[$i]=$result[0];
$i++;

}
*/
?>
<tr>
<?php 

for($i=0;$i<3;$i++)
{
	if($limit<$size)
	{
		$display="block";
	}
	else
	{
		$display="none";
	}
?>
<?php 
echo "<font color='white'>";

tabs(@$display,@$array[$i],@$star[$i],@$num,@$address[$i],@$desc[$i],@$r_id[$i],@$image[$i]);
$num++;
$limit++; ?>

<?php } ?>
</tr>


<tr>
<?php 

for($i=3;$i<6;$i++)
{
	if($limit<$size)
	{
		$display="block";
	}
	else
	{
		$display="none";
	}
?>
<?php
tabs(@$display,@$array[$i],@$star[$i],@$num,@$address[$i],@$desc[$i],@$r_id[$i],@$image[$i]);
$num++;
$limit++; ?>

<?php } ?>

</tr>

<tr>
<?php 


for($i=6;$i<9;$i++)
{
	if($limit<$size)
	{
		$display="block";
	}
	else
	{
		$display="none";
	}
?>
<?php 
tabs(@$display,@$array[$i],@$star[$i],@$num,@$address[$i],@$desc[$i],@$r_id[$i],@$image[$i]);
$num++;
$limit++; ?>

<?php } ?>
</tr>

<tr>
<?php 

for($i=9;$i<12;$i++)
{
	if($limit<$size)
	{
		$display="block";
	}
	else
	{
		$display="none";
	}
?>
<?php
tabs(@$display,@$array[$i],@$star[$i],@$num,@$address[$i],@$desc[$i],@$r_id[$i],@$image[$i]);
$num++;
$limit++; ?>

<?php } ?>
</tr>

<tr>
<?php 

for($i=12;$i<15;$i++)
{
	if($limit<$size)
	{
		$display="block";
	}
	else
	{
		$display="none";
	}
?>
<?php 
tabs(@$display,@$array[$i],@$star[$i],@$num,@$address[$i],@$desc[$i],@$r_id[$i],@$image[$i]);
$num++;
$limit++; ?>
<?php } ?>
</tr>

</table>
</center>
	
</div>

<div id="footer">
<?php
echo "<font color='black'>"; echo $num;?>
</div>
</body>
</html>