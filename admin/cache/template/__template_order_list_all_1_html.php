<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2014-01-10 14:55:38
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<link href="css/cal/zpcal.css" rel="stylesheet" type="text/css">
<link href="css/cal/template.css" rel="stylesheet" type="text/css">
<link href="css/cal/maroon.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='script/zapatec.js'></script>
<script type="text/javascript" src="script/calendar.js"></script>
<script type="text/javascript" src="script/calendar-zh.js"></script>
<style>
.xiao_1 input{border:#999999 1px solid;height:16px;}
.xiao_1 select{border:#999999 1px solid;height:20px;}
.xiao_2{float:left;width:20px;height:20px; text-align:center;border:#666666 1px solid;margin-right:6px;}
.xiao_3{float:left;width:20px;height:20px; text-align:center;border:#666666 1px solid;margin-right:6px;color:#FFFFFF; background:#000000;}
.xiao_21{float:left;width:20px;height:20px; text-align:center;border:#666666 1px solid;margin-right:25px;}
.xiao_22{float:right;width:20px;height:20px; text-align:center;border:#666666 1px solid;}
</style>

<div style="margin:0px auto;width:100%; padding:0px;">
<ul style="float:right;width:950px;">
<?php
if ( $list )
{
foreach ( $list as $info )
{
?>


<dl style="float:left;width:928px;margin:0px;padding:10px;margin-bottom:20px;border:#9A9A9A 1px solid; background:#FFFFFF; position:relative;">
<dt style="float:left;width:740px; position:relative;margin-bottom:10px;">
<div style="float:left;width:718px;padding:5px 10px;border:#999999 1px dashed; background:#F1F1F1; ">
<span style="float:left;">订单号：<b><?php echo $info['id']; ?></b></span>
<span style="float:left;">　　导入时间：<?php echo $info['add_time']; ?></span>
<span style="float:right;">订单状态:<?php echo $info['status_name']; ?>　<a target="_blank" href="?mod=order.edit&id=<?php echo $info['id']; ?>">编辑</a></span>
</div>
<div style="float:left;width:740px; padding-bottom:10px; padding-top:5px; text-align:right;margin-top:10px;">

<ul style="float:left;width:480px;border:#999999 1px dashed; background:#E1E1E1; padding:5px 10px;line-height:1.7; text-align:left;">
<span style="float:left;"><b>收货人：</b><?php echo $info['order_shipping_name']; ?></span>
<span style="float:right;"><b>　邮编：</b><?php echo $info['order_shipping_zip']; ?></span>
<span style="float:left;width:480px;">
<b>　电话：</b><?php echo $info['order_shipping_phone']; ?><?php
if ( trim($info['order_shipping_phone']) && trim($info['order_shipping_mobile']) )
{
?> / <?php
}
?><?php echo $info['order_shipping_mobile']; ?>
<br /><b>　地址：</b><?php echo $info['order_shipping_address']; ?>
</span>
</ul>
<ul style="float:right;width:180px;border:#999999 1px dashed; background:#E1E1E1; padding:5px 10px;line-height:1.7; text-align:right;">
<?php echo $info['channel_name']; ?><br />
<?php echo $info['order_time']; ?><br />
<b><?php echo $info['target_id']; ?></b>
</ul>
</div>


<?php
if ( $info['warehouse_id'] == 5 )
{
?>
<?php
if ( $info['purchaseID'] )
{
?>
<div style="float:left; padding:5px 10px;width:720px;border:#999999 1px dashed; background:#F1F1F1;margin-top:10px;">
采购单：<a href="?mod=purchase.listreceive_h&id=1596" target="_blank" ><font color="#0033CC"><?php echo $info['purchaseID']; ?></font></a>　
供货商：<font color="#990066"><?php echo $info['supplierName']; ?></font>
</div>
<?php
}
?>
<?php
}
?>



<div style="float:left;width:740px; padding-top:10px;">
<table width="740" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
  <tr style=" background:url(image/sort_row_bg.gif) repeat-x left top;line-height:25px; font-weight:bold;">
    <td width="40" height="25"><div align="center">ID</div></td>
    <td width="70"><div align="center">渠道编号</div></td>
    <td><div align="left">&nbsp;名称</div></td>
	<td width="70"><div align="center">属性</div></td>
    <td width="40"><div align="center">数量</div></td>
	<td width="70"><div align="center">单价</div></td>
  </tr>
<?php
if ( $info['list'] )
{
foreach ( $info['list'] as $row )
{
?>
<tr style="line-height:25px;">
    <td bgcolor="#FFFFFF" align="center" title="SKU：<?php echo $row['sku']; ?>" ><?php echo $row['sku_info']['product']['id']; ?></td>
    <td bgcolor="#FFFFFF" align="center" ><?php
if ( trim($row['target_id']) && $row['price'] > 0 )
{
?><?php echo $row['target_id']; ?><?php
}
else
{
?><font color="#FF0000">赠品</font><?php
}
?></td>
    <td bgcolor="#FFFFFF">&nbsp;<?php echo $row['sku_info']['product']['name']; ?></td>
	<td bgcolor="#FFFFFF" align="center" ><?php echo $row['sku_info']['attribute']; ?></td>
    <td bgcolor="#FFFFFF" align="center" ><?php echo $row['quantity']; ?></td>
	<td bgcolor="#FFFFFF" align="center" ><?php echo $row['price']; ?></td>
  </tr>
<?php
}
}
?>
</table>
</div>
<div style="float:left;width:740px;">
<span style="float:right; padding:5px 0px;">总金额：<font color="red"><b><?php echo $info['total_money']; ?></b></font></span>
</div>
</dt>



<dd style="float:right;margin:0px;width:160px;">
<?php
if ( $info['order_comment'] && $info['order_comment'] != '|' )
{
?>
<fieldset style="float:left;width:136px; padding:5px 10px;border:#0066CC 1px dashed;margin-bottom:10px;">
<legend style="color:#666666;background:#FFFFFF">客户备注</legend>
<span style="float:left;width:136px; text-align:left;"><?php echo $info['order_comment']; ?></span>
</fieldset>
<?php
}
?>


<fieldset style="float:left;width:136px; padding:5px 10px;border:#0066CC 1px dashed;margin-bottom:10px;">
<legend style="color:#666666; background:#FFFFFF">产品部：<?php echo $info['purchase_check_name']; ?></legend>
<?php
if ( $info['purchase_check'] > 0 )
{
?>
<span style="float:left;width:136px; text-align:left;"><?php echo $info['purchase_real_name']; ?>：<?php echo $info['purchase_check_time']; ?><br /><?php echo $info['purchase_check_info']; ?></span>
<?php
}
?>
</fieldset>

<fieldset style="float:left;width:136px; padding:5px 10px;border:#0066CC 1px dashed;margin-bottom:10px;">
<legend style="color:#666666;background:#FFFFFF">客服部：<?php echo $info['service_check_name']; ?></legend>
<?php
if ( $info['service_check'] > 0 )
{
?>
<span style="float:left;width:136px; text-align:left;"><?php echo $info['service_real_name']; ?>：<?php echo $info['service_check_time']; ?><br /><?php echo $info['service_check_info']; ?></span>
<?php
}
else
{
?>

<?php
if ( $info['service_call_list'] )
{
foreach ( $info['service_call_list'] as $row )
{
?>
<ul style="float:left;width:126px; padding:5px;border-top:#D8D8D8 1px solid;" title="操作员：<?php echo $row['user_name_zh']; ?>">
<span style="float:left;"><?php echo $row['comment']; ?></span>
<span style="float:right;"><?php echo DateFormat($row['add_time'],'m-d H:m'); ?></span>
</ul>
<?php
}
}
?>

<?php
}
?>
</fieldset>


<?php
if ( $info['service_check'] == 1 )
{
?>


<?php
if ( $info['warehouse_id'] > 0 )
{
?>
<fieldset style="float:left;width:136px; padding:5px 10px;border:#0066CC 1px dashed;margin-bottom:10px;">
<legend style="color:#666666;background:#FFFFFF">物流部：<?php echo $info['delivery_type']; ?></legend>
<?php
if ( $info['warehouse_id'] == 5 )
{
?>
<span style="float:left;width:136px; text-align:left;">
供货商：<?php echo $info['supplier_name']; ?><br />
采购单：<a href="?mod=purchase.listreceive_h&id=<?php echo $info['purchase_id']; ?>" target="_blank"><?php echo $info['purchase_id']; ?></a><br />
状　态：<?php
if ( $info['logistics_sn'] != '' )
{
?><font color="green">已发货</font><br />物　流：<?php echo $info['logistics_company']; ?><br />单　号：<?php echo $info['logistics_sn']; ?><?php
}
else
{
?><font color="red">未发货</font><?php
}
?>
<br />签　收：<?php echo $info['sign_status_name']; ?>
</span>
<?php
}
else
{
?>
配货状态：<?php echo $info['lock_status_name']; ?><br />
<?php
if ( $info['lock_status'] > 0 && $info['delivery_status'] == 0 )
{
?>　　　　【<a style="color:#009999" href="?mod=order.lock.detail&id=<?php echo $info['id']; ?>" target="_blank">配货管理</a>】<br /><?php
}
?>
出库状态：<?php echo $info['delivery_status_name']; ?><br />
发货状态：<?php
if ( $info['logistics_sn'] != '' )
{
?><font color="green">已发货</font><br />物流公司：<?php echo $info['logistics_company']; ?><br />单号：<?php echo $info['logistics_sn']; ?><?php
}
else
{
?><font color="red">未发货</font><?php
}
?>
<br />签收状态：<?php echo $info['sign_status_name']; ?>
<?php
}
?>
</fieldset>
<?php
}
?>


<fieldset style="float:left;width:136px; padding:5px 10px;border:#0066CC 1px dashed;margin-bottom:10px;">
<legend style="color:#666666;background:#FFFFFF">财务部：<?php echo $info['finance_recieve_name']; ?></legend>
<span style="float:left;width:136px; text-align:left;">
票据方式：<?php echo $info['order_invoice_name']; ?>
<?php
if ( $info['order_invoice'] > 0 )
{
?>
<br />票据状态：<?php echo $info['order_invoice_status_name']; ?>


<?php
if ( $info['order_invoice'] > 0 && $info['order_invoice_status'] < 1 )
{
?>
<br /><button id="button_invoice_<?php echo $info['id']; ?>" type="button" onclick="up_order_invoice(<?php echo $info['id']; ?>);">更新为发票已开</button>
<?php
}
?>

<?php
}
?>
</span>
</fieldset>

<?php
if ( $info['status'] > 1 )
{
?>
<fieldset style="float:left;width:136px; padding:5px 10px;border:#0066CC 1px dashed;margin-bottom:10px;"><legend style="color:#666666;background:#FFFFFF">售后管理：<?php echo $info['status_name']; ?></legend><span style="float:left;width:136px; text-align:left;"><?php echo $info['lost_info']; ?></span></fieldset>
<?php
}
?>





<?php
}
?>
</dd>



</dl>





<?php
}
}
?>
</ul>














































<ul style=" position:fixed;top:85px;left:280px;width:250px;margin:0px; padding:0px;" class="xiao_1">
<form method="get" id="search_form">


<span style="float:left;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<div style="float:left;width:228px;">总 <b><?php echo $total; ?></b> 条，每页 <b><?php echo $onePage; ?></b> 条。</div>
<div style="float:left;width:228px; padding:10px 0px 0px 0px;"><?php
if ( $page_num > 1 )
{
?><?php echo $page_bar_b; ?><?php
}
?></div>
</span>


<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<input type="hidden" name="mod" value="<?php echo $_GET['mod']; ?>"><input type="hidden" name="excel" id="excel" value="0">

<div style="float:left;width:228px;height:25px;">
订单号：<input style="width:60px;" type="text" name="id" id="id" value="<?php echo $_GET['id']; ?>">
</div>
<div style="float:left;width:228px;height:25px;">
产品名：<input type="text" style="width:150px;" name="product_name" value="<?php echo $_GET['product_name']; ?>">
</div>
<div style="float:left;width:228px;height:25px;">
收货人：<input type="text"  style="width:150px;" name="order_shipping_name" value="<?php echo $_GET['order_shipping_name']; ?>">
</div>
<div style="float:left;width:228px;height:22px;">
　电话：<input type="text" style="width:150px;" name="phone" value="<?php echo $_GET['phone']; ?>">
</div>
</span>

<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<dl style="float:left;width:228px;margin:0px;padding:0px; padding-bottom:10px;">
<dt style="float:left;width:228px;height:25px;margin:0px;padding:0px;">银行下单时间</dt>
<dd style="float:left;width:94px;height:22px;margin:0px;padding:0px; position:relative;">
<input style="width:76px;" type="text" name="begin_date" id="begin_date" value="<?php echo $_GET['begin_date']; ?>">
<img src="image/grid-cal.gif" width="18" height="18" id="begin_date_btn" style="position:absolute;top:2px;right:0px;" />
</dd>
<dd style="float:left;width:30px;height:22px;margin:0px;padding:0px; text-align:right;line-height:25px; font-size:20px; position:relative;">=></dd>
<dd style="float:right;width:94px;height:22px;margin:0px;padding:0px; position:relative;">
<input style="width:76px;" type="text" name="end_date" id="end_date" value="<?php echo $_GET['end_date']; ?>">
<img src="image/grid-cal.gif" width="18" height="18" id="end_date_btn" style="position:absolute;top:2px;right:0px;" />
</dd>
</dl>
<div style="float:left;width:228px;height:25px;">
销售渠道：<select name="channel_id" style="width:150px">
<option value=""></option>
<?php
if ( $channel_list )
{
foreach ( $channel_list as $val )
{
?>
<option value="<?php echo $val['id']; ?>" <?php
if ( $val['id'] == $_GET['channel_id'] )
{
?>selected<?php
}
?>><?php echo $val['name']; ?></option>
<?php
}
}
?>
</select>
</div>
<div style="float:left;width:228px;height:25px;">
渠道单号：<input style="width:150px;" type="text" name="target_id" value="<?php echo $_GET['target_id']; ?>">
</div>
</span>



<script>
function DoMore(obj)
{
if($('#moreBtn').css('display')=='block')
{
$('#moreBtn').css('display','none');
$('#moreBtnA').html('更多');
}
else
{
$('#moreBtn').css('display','block');
$('#moreBtnA').html('关闭');
}

}


</script>



<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<button style="float:right;" id="moreBtnA" type="button" onclick="DoMore(this)">更多</button>
<div style="float:left;width:188px;height:30px;">
订单状态：<select name="order_status" style="width:120px">
<option value=""></option>
<option value="1" <?php
if ( 1 == $_GET['order_status'] )
{
?>selected<?php
}
?>>正常订单</option>
<option value="5" <?php
if ( 5 == $_GET['order_status'] )
{
?>selected<?php
}
?>>未操作订单</option>
<option value="4" <?php
if ( 4 == $_GET['order_status'] )
{
?>selected<?php
}
?>>直接取消订单</option>
<option value="2" <?php
if ( 2 == $_GET['order_status'] )
{
?>selected<?php
}
?>>售后退单→退货中</option>
<option value="3" <?php
if ( 3 == $_GET['order_status'] )
{
?>selected<?php
}
?>>售后退单→退货完成</option>
</select>
</div>
<div style="float:left; display:none" id="moreBtn">
<div style="float:left;width:114px;height:28px;">
<select name="lock_status" style="width:93px">
<option value="">配货状态</option>
<?php
if ( $lock_status_list )
{
foreach ( $lock_status_list as $key => $val )
{
?>
<option value="<?php echo $key; ?>" <?php
if ( $key == $_GET['lock_status'] && $_GET['lock_status'] != '' )
{
?>selected<?php
}
?>><?php echo $val; ?></option>
<?php
}
}
?>
</select>
</div>
<div style="float:right;width:105px;height:28px;">
<select name="delivery_status" style="width:93px">
<option value="">出库状态</option>
<?php
if ( $delivery_status_list )
{
foreach ( $delivery_status_list as $key => $val )
{
?>
<option value="<?php echo $key; ?>" <?php
if ( $key == $_GET['delivery_status'] && $_GET['delivery_status'] != '' )
{
?>selected<?php
}
?>><?php echo $val; ?></option>
<?php
}
}
?>
</select></div>
<div style="float:left;width:114px;height:28px;">
<select name="warehouse_type" style="width:93px">
<option value="">发货方式</option>
<option value="5" <?php
if ( 5 == $_GET['warehouse_type'] && $_GET['warehouse_type'] != '' )
{
?>selected<?php
}
?>>代发货</option>
<option value="6" <?php
if ( 6 == $_GET['warehouse_type'] && $_GET['warehouse_type'] != '' )
{
?>selected<?php
}
?>>库房发货</option>
</select>
</div>
<div style="float:right;width:105px;height:28px;">
<select name="logistics_type" style="width:93px">
<option value="">发货状态</option>
<option value="1" <?php
if ( 1 == $_GET['logistics_type'] && $_GET['logistics_type'] != '' )
{
?>selected<?php
}
?>>未发货</option>
<option value="2" <?php
if ( 2 == $_GET['logistics_type'] && $_GET['logistics_type'] != '' )
{
?>selected<?php
}
?>>已发货</option>
</select>
</div>
<div style="float:left;width:114px;height:22px;">
<select name="sign_status" style="width:93px">
<option value="">签收状态</option>
<?php
if ( $sign_status_list )
{
foreach ( $sign_status_list as $key => $val )
{
?>
<option value="<?php echo $key; ?>" <?php
if ( $key == $_GET['sign_status'] && $_GET['sign_status'] != '' )
{
?>selected<?php
}
?>><?php echo $val; ?></option>
<?php
}
}
?>
</select>
</div>
<div style="float:right;width:105px;height:22px;">
<select name="finance_recieve" style="width:93px">
<option value="">到款状态</option>
<?php
if ( $finance_recieve_status_list )
{
foreach ( $finance_recieve_status_list as $key => $val )
{
?>
<option value="<?php echo $key; ?>" <?php
if ( $key == $_GET['finance_recieve'] && $_GET['finance_recieve'] != '' )
{
?>selected<?php
}
?>><?php echo $val; ?></option>
<?php
}
}
?>
</select>
</div>
<div style="float:left;width:114px;height:22px;">
<select name="order_invoice" style="width:93px">
<option value="">发票 / 收据</option>
<option value="0"  <?php
if ( $_GET['order_invoice'] == 0 && $_GET['order_invoice'] != '' )
{
?>selected<?php
}
?> >不需要</option>
<option value="1"  <?php
if ( $_GET['order_invoice'] == 1 && $_GET['order_invoice'] != '' )
{
?>selected<?php
}
?> >开发票</option>
<option value="2"  <?php
if ( $_GET['order_invoice'] == 2 && $_GET['order_invoice'] != '' )
{
?>selected<?php
}
?> >开收据</option>
</select>
</div>
<div style="float:right;width:105px;height:22px;">
<select name="order_invoice_status" style="width:93px">
<option value="">开票状态</option>
<option value="0" <?php
if ( 0 == $_GET['order_invoice_status'] && $_GET['order_invoice_status'] != '' )
{
?>selected<?php
}
?>>未开票据</option>
<option value="1" <?php
if ( 1 == $_GET['order_invoice_status'] && $_GET['order_invoice_status'] != '' )
{
?>selected<?php
}
?>>已开票据</option>
</select>
</div>
</div>
</span>











<span style="float:left;margin-top:10px;width:228px;border:#D8D8D8 1px solid; background:#FFFFFF;padding:10px;">
<button style="float:left;" type="button" onclick="$('#excel').val(1);$('#search_form').submit();$('#excel').val(0);">导出</button>
<button style="float:left;margin-left:10px;" type="button" onclick="$('#print_invoice').submit();">待开票</button>
<button  style="float:right;" type="button" onclick="$('#search_form').submit();">筛选订单</button>
</span>





</form>
<form method="post" id="print_invoice" target="_blank" action="index.php?mod=order.print_invoice"></form>
</ul>
























</div>


<script type="text/javascript">

var cal = new Zapatec.Calendar.setup({
	inputField     :    "begin_date",     // id of the input field
	ifFormat       :    "%Y-%m-%d",     // format of the input field
	showsTime      :     false,
	button         :    "begin_date_btn",  // trigger button (well, IMG in our case)
	weekNumbers    :    false,  // allows user to change first day of week
	firstDay       :    1, // first day of week will be Monday
	align          :    "Bl"           // alignment (defaults to "Bl")
});

var cal = new Zapatec.Calendar.setup({
	inputField     :    "end_date",     // id of the input field
	ifFormat       :    "%Y-%m-%d",     // format of the input field
	showsTime      :     false,
	button         :    "end_date_btn",  // trigger button (well, IMG in our case)
	weekNumbers    :    false,  // allows user to change first day of week
	firstDay       :    1, // first day of week will be Monday
	align          :    "Bl"           // alignment (defaults to "Bl")
});





function up_order_invoice(orderId){
//var order_invoice=$('#order_invoice_'+orderId+'').val();
//var order_invoice_header=$('#order_invoice_header_'+orderId+'').val();
//var order_invoice_type=$('#order_invoice_type_'+orderId+'').val();
//var order_invoice_product=$('#order_invoice_product_'+orderId+'').val();
var T_url ='?mod=order.edit.up_order_invoices&id='+orderId+'&rand=' + Math.random();
	//window.location=T_url;
	$.ajax({
		url: T_url,
		type:'GET',
		//data:post,
		success: function(info){
			if (info==200){
				alert('处理成功');
				$('#button_invoice_'+orderId+'').css('display','none')
				//window.location='?mod=order.check.service&service_check=<?php echo $_GET['service_check']; ?>';
			}else{
				alert(info);
				//UnLoading();
			}
		},
		error:function(info){
			alert('网络错误,请重试');
			//UnLoading();
		}
	});
}




var isSubmit = false;

function DoTdTh(orderID){


	var html = $('#tpl_action').html().replace(/-_-/ig, '');
	html = $(html);
	//html.find('form').attr('action', '#');

	Dialog('退单理由',html,function(){
		if (isSubmit){
			return false;
		}

		if(html.find('form').find('.input-text').val()=="")
		{
		alert('必须有退单理由')
		isSubmit = false;
		}
		else
		{
		//html.find('form').submit();

	$.ajax({
		url: '?mod=order.edit.tdth&order_id='+orderID+'&comment='+html.find('form').find('.input-text').val()+'&rand=' + Math.random(),
		type:'GET',
		//data:post,
		success: function(info){
			if (info=='200'){
				alert('处理成功');
				window.location.reload();
			}else{
				alert(info);
				//UnLoading();
			}
		},
		error:function(info){
			alert('网络错误,请重试');
			//UnLoading();
		}
	});





		isSubmit = true;
		}

//html.find('form').submit();
//		isSubmit = true;
	});
	
	
	/*
	

*/
}

function DoTdTh_1(orderID){
	$.ajax({
		url: '?mod=order.edit.tdth_1&order_id='+orderID+'&rand=' + Math.random(),
		type:'GET',
		//data:post,
		success: function(info){
			if (info=='200'){
				alert('处理成功');
				window.location.reload();
			}else{
				alert(info);
				//UnLoading();
			}
		},
		error:function(info){
			alert('网络错误,请重试');
			//UnLoading();
		}
	});
	
}
</script>
<div id="tpl_action" style="display:none">
	<div>
		<form method="post" action="">
			<table width="100%">
				<tr>
					<td align="right" width="90">备注:</td>
					<td><textarea type="text" name="comment" style="width:220px;height:50px;" class="input-text"/></textarea></td>
				</tr>
			</table>
		</form>
	</div>
</div>