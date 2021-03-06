<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2013-07-24 15:30:36
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<style>
.xiaofw_0{border:#000000 1px solid;height:20px; background:#FFFFFF;}
.xiaofw_1{float:left;}
.xiaofw_2{float:right;}
.xiaofw_3 td{ font-size:13px;line-height:1.3; padding-top:5px;}
.STYLE1 {color: #666666}
.xiaofw_5 b{ color:#009900}
.xiaofw_5 font{ color:#999999; text-decoration:none; }
.xiaofw_5 strong{color:#333333}
.xiaofw_5 a{cursor:pointer;}
.xiaofw_5 em{ color:#CC0000;}
</style>
<div class="HY-content-header clearfix">
	<h3 class="head-tax-rule">执行中采购单列表 </h3>
	<p class="right">
	</p>
</div>



<?php
if ( $list )
{
foreach ( $list as $val )
{
?>

<div class="HY-grid-title">
<div class="HY-grid-title-inner" style="font-size:13px;">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" width="120">采购单号：<?php echo $val['id']; ?></td>
				<td align="left"><?php echo $val['supplier_name']; ?> → <?php echo $val['type_name']; ?> → <?php echo $val['payment_type_name']; ?> → <?php echo $val['warehouse_name']; ?></td>
	<td align="right" width="200">下单时间：<?php echo $val['add_time']; ?></td>
	<td align="right" width="180">预计到货时间：<?php echo $val['plan_arrive_time']; ?></td>
  </tr>
</table>
</div>
</div>
<div class="HY-grid">
<table cellspacing="0">
		<thead>
			<tr class="header">
				<th width="50">商品ID</th>
				<th width="80">SKU</th>
				<th width=""><nobr>商品名称<nobr></th>
				<th width="90" align="left" style=" display:none">审核成本</th>
				<th width="70" align="left">采购单价</th>
				<?php
if ( $val['type'] == 2 )
{
?><th width="70" align="left">代发运费</th><?php
}
?>
				<th width="40"><div align="center">数量</div></th>
				<th width="90" align="left">合计</th>
			</tr>
		</thead>
		<tbody id="purchase_row">
			<?php
if ( $val['purchaseProductList'] )
{
foreach ( $val['purchaseProductList'] as $Productval )
{
?>
			<tr class="xiaofw_3">
				<td><?php echo $Productval['product_id']; ?></td>
				<td><?php echo $Productval['sku']; ?></td>
				<td>
					<?php echo $Productval['sku_info']['product']['name']; ?>
					<?php
if ( $Productval['sku_info']['attribute'] )
{
?> → <font color="#FF0000" style="font-size:13px;"><?php echo $Productval['sku_info']['attribute']; ?></font><?php
}
?>
					<?php
if ( $Productval['comment'] )
{
?><span class="right"> ← 备注：<font color="#009900" style="font-size:13px;"><?php echo $Productval['comment']; ?></font></span><?php
}
?>
				</td>
				<td align="left" style=" display:none"> ￥<?php echo $Productval['history_price']; ?></td>
				<td align="left"> ￥<?php echo $Productval['price']; ?></td>
				<?php
if ( $val['type'] == 2 )
{
?><td align="left"> ￥<?php echo $Productval['help_cost']; ?></td><?php
}
?>
				<td align="center"><?php echo $Productval['quantity']; ?></td>
				<td align="left"> ￥<?php echo $Productval['all_money']; ?></td>
			</tr>
			<?php
}
}
?>
		</tbody>
	</table>
<table cellspacing="0" style="border-top:0px;">
<tbody id="purchase_row">
			<tr class="xiaofw_3">
				<td align="left"> <?php
if ( $val['comment'] )
{
?>备注：<font color="#009900" style="font-size:13px;"><?php echo $val['comment']; ?></font><?php
}
?></td>
                <td width="141" align="left">&nbsp;总金额：&yen;<?php echo $val['all_money']; ?></td>
			</tr>
		</tbody>
</table>

<table cellspacing="0" style="border-top:0px;">
<tbody id="purchase_row">
<tr class="xiaofw_3">
<?php echo $val['print_bottom']; ?>
<?php
if ( $val['del_bottom'] )
{
?><td width="100" height="20" align="center"><?php echo $val['del_bottom']; ?></td><?php
}
?>
<?php
if ( $val['close_comment'] )
{
?>
<td align="left" class="xiaofw_5"><em><b><?php echo $val['close_name']; ?></b>拒绝理由：<?php echo $val['close_comment']; ?></em></td>
<?php
}
?>
<td align="right" class="xiaofw_5"><font>[ 制单员：</font><strong title="级别：<?php echo $val['user_grouping']; ?>"><?php echo $val['user_name_zh']; ?></strong><?php echo $val['re_bottom']; ?> <font>]</font><?php echo $val['sign_pro_mg']; ?><?php echo $val['sign_ope_mj']; ?><?php echo $val['sign_ope_vc']; ?><?php echo $val['pay_lock_user']; ?><?php echo $val['pay_user']; ?>&nbsp;</td>
</tr>
</tbody>
</table>
<div class="HY-grids">
</div>
<div class="HY-grids">
</div>
</div>

<?php
}
}
?>
<script language="JavaScript">
$(document).ready(function(){
	$('a[ctype=expand]').click(function(){
		$(this).parents('td').eq(0).find('div').toggle();
	});
});

var isSubmit = false;

function ActionLog(purchaseId, type, call){
	var html = $('#tpl_action').html().replace(/-_-/ig, '');
	html = $(html);

	if (call==1){
		html.find('form').attr('action', '?mod=purchase.new.call&id='+purchaseId);
		title = '拒绝原因';
	}
	//else{
	//	html.find('form').attr('action', '?mod=order.edit.check&id='+orderId+'&do=service&type='+type);
	//	title = type==1?'确认':'取消';
	//}

	Dialog(title,html,function(){
		if (isSubmit){
			return false;
		}
		
		if( !html.find('form').find('#comment').val() ){
		alert('请输入拒绝原因');
			return false;
		}

		html.find('form').submit();
		isSubmit = true;
	});
}
</script>

<div id="tpl_action" style="display:none">
	<div>
		<form method="post" action="">
			<table width="100%">
				<tr>
					<td align="right" width="90">备注:</td>
					<td><textarea type="text" name="comment" id="comment" style="width:220px;height:50px;" class="input-text"/></textarea></td>
				</tr>
			</table>
		</form>
	</div>
</div>