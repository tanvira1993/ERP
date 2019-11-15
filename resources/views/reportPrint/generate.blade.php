<!DOCTYPE html>
<html>
<head>
	<title>Stock Report</title>
	<link rel="stylesheet" href="http://127.0.0.1:8000/frontend/bootstrap.min.css">
	<?php
	// $str = "Hello World!";
	// $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	// $r=$url;
	// $uriParts = explode('.',$_SERVER['SERVER_NAME']);
	// $ur ="$_SERVER[REQUEST_URI]";
	// $subDomain = $ur;
	// echo $subDomain;
	// echo $url;
	// echo $str . "<br>";
	// echo trim($str,"H");
	// echo trim($r,"stockReportGenerate");
	?>
	<div class="row">
		<div class="col-md-5">			
		</div>
		<div class="col-md-2">
			<img src="http://127.0.0.1:8000/frontend/toma.jpg" alt="toma_group" width="105" height="100">
		</div>
		<!-- <div class="col-md-2" style="margin-top: 1.5%;margin-left: 1%">			
			<p style="font-size: 12px">Toma Tower,77/1 kakrail, Ramna,Dhaka-1000</p>
		</div> -->
		
		<div class="col-md-5">			
		</div>
	</div>
	<style type="text/css">
	@media print
	{    
		.no-print
		{
			display: none !important;
		}
	}
	/*.watermarked {
		position: relative;
	}

	.watermarked:after {
		content: "";
		display: block;
		width: 100%;
		height: 100%;
		position: absolute;
		top: 35%px;
		left: 35%;
		background-image: url("http://127.0.0.1:8000/frontend/pic1.png");
		background-size: 400px 200px;
		background-position: 30px 30px;
		background-repeat: no-repeat;
		opacity: 0.1;
		}*/
	</style>
</head>
<body lang=EN-US>
	<div style="margin-top:20px;" class="WordSection1">
		<tr class="no-print ">
			<td style="margin:0 auto;" colspan="7">
				<button style="margin-left: 48%;" type="button" class="no-print" onclick="print()">Print</button>
			</td>
		</tr>

		<table class="MsoNormalTable" border=0 cellspacing=0 cellpadding=0 width=720 style='width:562.5pt;margin:0 auto;border-collapse:collapse'>


			<tr style='height:27.0pt'>
				<td width=750 colspan=7 style='width:562.5pt;padding:0in 5.4pt 0in 5.4pt; height:27.0pt'>
					<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;text-align:center;line-height:normal'><b>
						<span style='font-size:16.0pt'>Stock Report</span></b>
					</p>
				</td>
				<td style='height:27.0pt;border:none' width=0 height=36></td>
			</tr>
			<tr style='height:30.75pt'>
				<td width=174 style='width:300.5pt;border:solid 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:30.75pt'>
					<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;text-align:center;line-height:normal'>
						<span style='font-size:12.0pt'> Name : <?php if($result !=null){echo $result[0]['Ename'];}else{echo "";} ?></span>
					</p>
				</td>
				<td width=326 nowrap colspan=3 style='width:244.45pt;border:solid 1.0pt;border-left:none;padding:0in 5.4pt 0in 5.4pt;height:30.75pt'>
					<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'><b><u><span style='font-size:12.0pt'>Status:
						<?php if($result !=null){echo $result[0]['degisnation'];}else{echo "No Stock Yet!!";} ?>
					</span></u></b></p>
				</td>
				<td width=148 colspan=2 style='width:110.65pt;border:solid 1.0pt;border-left:none;padding:0in 5.4pt 0in 5.4pt;height:30.75pt'>
					<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
					text-align:center;line-height:normal'><span style='font-size:12.0pt'>Phone:
					</span></p>
				</td>
				<td width=103 nowrap style='width:76.9pt;border:solid 1.0pt;
				border-left:none;padding:0in 5.4pt 0in 5.4pt;height:30.75pt'>
				<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
				normal'><b><u><?php if($result !=null){echo $result[0]['mobile'];}else{echo "";} ?><span style='font-size:12.0pt'>
				</span></u></b></p>
			</td>
			<td style='height:30.75pt;border:none' width=0 height=41></td>
		</tr>

		<tr style='height:15.75pt'>
			<td width=402 colspan=3 style='width:301.5pt;border-top:none;border-left:
			solid 1.0pt;border-bottom:none;border-right:solid black 1.0pt;
			padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
			<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
			text-align:center;line-height:normal'><span style='font-size:12.0pt'>Material Name</span></p>
		</td>

		<td width=402 colspan=3 style='width:301.5pt;border-top:none;border-left:
		solid 1.0pt;border-bottom:none;border-right:solid black 1.0pt;
		padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
		<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
		text-align:center;line-height:normal'><span style='font-size:12.0pt'>Material Descriptions</span></p>
	</td>
	<td width=98 style='width:73.45pt;border:none;border-right:solid 1.0pt;
	padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
	<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
	text-align:center;line-height:normal'><span style='font-size:12.0pt'>Stock Qty.</span></p>
</td>

<td style='height:15.75pt;border:none' width=0 height=21></td>
</tr>


<?php 
if($result !=null){
	foreach($result as $item) {
		?>	


		<tr style='height:15.75pt'>
			<td width=402 colspan=3 style='width:301.5pt;border:solid 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
				<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'>
					<span style='font-size:12.0pt'><?php echo $item['name'];?></span>
				</p>
			</td>
			<td width=402 colspan=3 style='width:301.5pt;border:solid 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
				<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'>
					<span style='font-size:12.0pt'><?php echo $item['descriptions'];?></span>
				</p>
			</td>
			<td width=98 style='width:73.45pt;border:solid 1.0pt;border-left: none;padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
				<p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;text-align:right;line-height:normal'>
					<span style='font-size:12.0pt'><?php echo $item['quantity'];?></span>
				</p>
			</td>



			<td style='height:15.75pt;border:none' width=0 height=21></td>
		</tr>

		<?php 
	} 
}
else{
	echo "";
}
?>

</table>
</div>
<?php
echo '<pre>';
// print_r($result);
echo '</pre>';


?>
</body>
</html>