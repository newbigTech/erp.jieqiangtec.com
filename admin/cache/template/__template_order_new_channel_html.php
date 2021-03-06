<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2015-12-22 11:05:14
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>


<div class="HY-content-header clearfix-overflow">
	<h3>新建渠道订单 (<?php echo $channel['name']; ?>, <?php echo $_POST['times']; ?>期)</h3>
	<div class="right">
		<button type="button" class="scalable back" onclick="SubmitForm();" style=""><span>保存订单</span></button>
	</div>
</div>

<form method="post" id="main_form" onsubmit="return false;">

<div class="clearfix">
	<div class="left">
		<button type="button" id="add-btn">添加商品</button>
	</div>
	<div class="right">
		<input type="hidden" name="__submit" value="1">
		<input type="hidden" name="channel_id" value="<?php echo $_POST['channel_id']; ?>">
		<input type="hidden" name="times" value="<?php echo $_POST['times']; ?>">
	</div>
</div>
<div class="block5"></div>

<div class="HY-grid-title">
	<div class="HY-grid-title-inner">
		订单商品列表 (<?php echo $channel['name']; ?>, <?php echo $_POST['times']; ?>期)
	</div>
</div>
<div class="HY-grid">
	<table cellspacing="0">
		<thead>
			<tr class="header">
				<th width="100">商品ID</th>
				<th width="120">SKU</th>
				<th width=""><nobr>商品名称<nobr></th>
				<th width="100">数量</th>
				<th width="100">销售价格</th>
				<th width="220">备注</th>
				<th width="120">操作</th>
			</tr>
		</thead>
		<tbody id="product_row">
			<?php
if ( $product_list )
{
foreach ( $product_list as $val )
{
?>
			<tr id="row_<?php echo $val['sku']; ?>">
				<td><small><?php echo $val['product_id']; ?></small></td>
				<td><small><?php echo $val['sku']; ?></small></td>
				<td>
					<b>名称：</b><?php echo $val['sku_info']['product']['name']; ?>
					<?php
if ( $val['sku_info']['attribute'] )
{
?>
					<br><span><b>属性：</b><?php echo $val['sku_info']['attribute']; ?></span>
					<?php
}
?>
				</td>
				<td align="center">
					<input type="text" class="input-text" style="width:60px;" name="e_quantity[<?php echo $val['id']; ?>]" value="<?php echo $val['quantity']; ?>">
				</td>
				<td align="center">
					&yen;<input type="text" class="input-text" style="width:60px;" name="e_price[<?php echo $val['id']; ?>]" value="<?php echo $val['price']; ?>">
				</td>
				<td align="center">
					<input type="text" class="input-text" style="width:200px;" name="e_row_comment[<?php echo $val['id']; ?>]" value="<?php echo $val['comment']; ?>">
				</td>
				<td align="center">
					<a href="?mod=order.edit.del&order_id=<?php echo $val['order_id']; ?>&order_product_id=<?php echo $val['id']; ?>" onclick="return confirm('确定删除该行产品吗? 确定后将跳转,请确认当前修改已经保存');">删除</a>
				</td>
			</tr>
			<?php
}
}
?>
		</tbody>
	</table>
</div>

<div class="HY-form-table" id="base_tab">
	<div class="HY-form-table-header">
		其他
	</div>
	<div class="HY-form-table-main">
		<table cellspacing="0" class="HY-form-table-table">
			<tbody>
				<tr>
					<td class="label"><label>备注</label></td>
					<td class="value">
						<div>
							<textarea name="order[order_comment]" style="width:800px;height:80px;overflow-x:auto;overflow-y:auto;"><?php echo $order['order_comment']; ?></textarea>
						</div>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<table width="100%">
	<tr>
		<td width="30%">
			<div class="HY-form-table">
				<div class="HY-form-table-header">
					基本信息
				</div>
				<div class="HY-form-table-main clearfix-overflow;" style="height:160px;">
					<table width="100%" border="0">
						<tr>
							<td align="" width="110"><strong>订单号：</strong></td>
							<td><?php echo $order['id']; ?></td>
						</tr>
						<tr>
							<td align=""><strong>渠道订单号：</strong></td>
							<td><input type="text" name="order[target_id]" value="<?php echo $order['target_id']; ?>" class="input-text" style="width:100px;"></td>
						</tr>
						<tr>
							<td><strong>客户名称：</strong></td>
							<td><input type="text" name="order[order_customer_name]" value="<?php echo $order['order_customer_name']; ?>" class="input-text" style="width:100px;"></td>
						</tr>
						<tr>
							<td align=""><strong>条形码：</strong></td>
							<td><input type="text" name="order[order_shipping_barcode]" value="<?php echo $order['order_shipping_barcode']; ?>" class="input-text" style="width:100px;"></td>
						</tr>
						<tr>
							<td><strong>优先发货：</strong></td>
							<td>
								<input type="radio" name="order[delivery_first]" value="1" <?php
if ( $order['delivery_first'] )
{
?>checked<?php
}
?>>是
								<input type="radio" name="order[delivery_first]" value="0" <?php
if ( !$order['delivery_first'] )
{
?>checked<?php
}
?>>否
							</td>
						</tr>
						<tr>
							<td><strong>付款方式：</strong></td>
							<td>
								<input type="radio" name="order[payment_type]" value="2" checked>先款后货
								<input type="radio" name="order[payment_type]" value="1" >货到付款
							</td>
						</tr>
					</table>
				</div>
			</div>
		</td>
		
		<td width="30%">
			<div class="HY-form-table">
				<div class="HY-form-table-header">
					收货信息
				</div>
				<div class="HY-form-table-main clearfix-overflow;" style="height:160px;">
					<table width="100%">
						<tr>
							<td align="" width="90"><strong>收货人：</strong></td>
							<td><input type="text" name="order[order_shipping_name]" value="<?php echo $order['order_shipping_name']; ?>" class="input-text" style="width:100px;"></td>
						</tr>
						<tr>
							<td align="" width=""><strong>身份证：</strong></td>
							<td><input type="text" name="order[order_shipping_card]" value="<?php echo $order['order_shipping_card']; ?>" class="input-text" style="width:180px;"></td>
						</tr>
						<tr>
							<td align=""><strong>地址：</strong></td>
							<td><input type="text" name="order[order_shipping_address]" value="<?php echo $order['order_shipping_address']; ?>" class="input-text" style="width:220px;"></td>
						</tr>
						<tr>
							<td align=""><strong>邮编：</strong></td>
							<td><input type="text" name="order[order_shipping_zip]" value="<?php echo $order['order_shipping_zip']; ?>" class="input-text" style="width:100px;"></td>
						</tr>
						<tr>
							<td align=""><strong>固定电话：</strong></td>
							<td><input type="text" name="order[order_shipping_phone]" value="<?php echo $order['order_shipping_phone']; ?>" class="input-text" style="width:100px;"></td>
						</tr>
						<tr>
							<td align=""><strong>移动电话：</strong></td>
							<td><input type="text" name="order[order_shipping_mobile]" value="<?php echo $order['order_shipping_mobile']; ?>" class="input-text" style="width:100px;"></td>
						</tr>
					</table>
				</div>
			</div>
		</td>
		<td width="30%">
			<div class="HY-form-table">
				<div class="HY-form-table-header">
					财务信息
				</div>
				<div class="HY-form-table-main clearfix-overflow;" style="height:160px;">
					<table width="100%">
						<tr>
							<td align="" width="90"><strong>发票：</strong></td>
							<td>
								<input type="radio" name="order[order_invoice]" value="1" <?php
if ( $order['order_invoice'] )
{
?>checked<?php
}
?>>需要
								<input type="radio" name="order[order_invoice]" value="0" <?php
if ( !$order['order_invoice'] )
{
?>checked<?php
}
?>>不需要
							</td>
						</tr>
						<tr>
							<td align="" width="90"><strong>发票抬头：</strong></td>
							<td><input type="text" name="order[order_invoice_header]" value="<?php echo $order['order_invoice_header']; ?>" class="input-text" style="width:200px;"></td>
						</tr>
						<tr>
							<td align="" width="90"><strong>已开发票：</strong></td>
							<td>
								<input type="radio" name="order[order_invoice_status]" value="1" <?php
if ( $order['order_invoice_status'] )
{
?>checked<?php
}
?>>是<?php
if ( $order['order_invoice_time'] )
{
?>(<?php echo DateFormat($order['order_invoice_time']); ?>)<?php
}
?>
								<input type="radio" name="order[order_invoice_status]" value="0" <?php
if ( !$order['order_invoice_status'] )
{
?>checked<?php
}
?>>否
							</td>
						</tr>
						<tr>
							<td align=""><strong>发票号：</strong></td>
							<td><input type="text" name="order[order_invoice_number]" value="<?php echo $order['order_invoice_number']; ?>" class="input-text" style="width:160px;"></td>
						</tr>
					</table>
				</div>
			</div>
		</td>
	</tr>
</table>

</form>

<table style="display:none;">
	<tbody id="tpl_product_row">
		<tr id="row_{1}">
			<td><small>{0}</small></td>
			<td><small>{1}</small></td>
			<td>
				<b>名称：</b>{2}
				<br>
				<span>{3}</span>
				<input type="hidden" name="sku[]" value="{1}">
				<input type="hidden" name="pid[]" value="{0}">
			</td>
			<td align="center">
				<input type="text" class="input-text" style="width:60px;" name="quantity[]" value="1">
			</td>
			<td align="center">
				&yen;{4}
			</td>
			<td align="center">
				<input type="text" class="input-text" style="width:200px;" name="row_comment[]" value="">
			</td>
			<td align="center">
				<a href="javascript:void(0);" name="remove">移除</a>
			</td>
		</tr>
	</tbody>
</table>

<div id="tpl_add_channel_product" style="display:none">
	<table width="100%">
		<tr>
			<td align="left">输入商品信息:</td>
		</tr>
		<tr>
			<td><input type="text" id="-_-dialog_pid_name" value="" /></td>
		</tr>
	</table>
</div>

<script language="JavaScript">

$(document).ready(function(){
	$('#add-btn').click(function(){
		AddChannelProductToRow();
	});
});

var productId = 0;
var channelId = <?php echo $channel['id']; ?>;

function AddChannelProductToRow(){
	var html = $('#tpl_add_channel_product').html().replace(/-_-/ig, '');
	Dialog('添加新订单商品',html,GetChannelProductToRow,false,function(){
		var auto = new Ext.form.AutoCompleteField({
			applyTo: 'dialog_pid_name',
			hideTrigger:true,
			width:400,
			hiddenName:'dialog_pid',
			store:autoComplateChannelProductStore,
			mode: 'local',
			tpl:autoComplateChannelProductTemplate,
			valueField:'id',
			displayField:'name',
			queryId:'key',
			emptyText:'请输入渠道产品编号或者名称进行查找...'
		});
	});
}

function AddRow(info){
	if ($('#row_'+info.sku).length>0){
		alert('该产品已经存在');
		return;
	}

	$.ajax({
		url: '?mod=product.collate.ajax.sku&sku='+info.sku+'&channel_id=<?php echo $channel['id']; ?>&times=<?php echo $_POST['times']; ?>&type=check_sku&rand=' + Math.random(),
		processData: true,
		dataType:'json',
		success: function(info){
			if (!info.product||!info.product.id){
				alert('没有找到指定的商品');
				return;
			}

			if (!info.collate){
				alert('渠道产品不存在');
				return;
			}

			if (!info.price){
				alert('价格不存在');
				return;
			}

			if (info.price.price<=0){
				alert('价格数据错误');
				return;
			}

			var html = $('#tpl_product_row').html().replace(/-_-/ig, '').format(
				info.sku_info.product.id,
				info.sku,
				info.sku_info.product.name,
				info.sku_info.attribute ? '<b>属性：</b>'+info.sku_info.attribute : '',
				info.price.price
			);

			$('#product_row').append(html);

			$('a[name=remove]').click(function(){
				if (confirm('确定要移除吗?')){
					$(this).parents('tr').eq(0).remove();
				}
			});
		},
		error:function(info){
			alert("网络传输错误,请重试...");
			return false;
		}
	});
	
}

function SubmitForm(){
	var post = $('#main_form').serialize();
	Loading();
	$.ajax({
		url: '<?php echo $_SERVER['REQUEST_URI']; ?>&rand=' + Math.random(),
		type:'POST',
		data:post,
		success: function(info){
			if (info=='200' || info==200){
				Loading('处理成功', '正在跳转到列表页面...');
				window.location='?mod=order.list';
			}else{
				alert(info);
				UnLoading();
			}
		},
		error:function(info){
			alert('网络错误,请重试');
			UnLoading();
		}
	});
}

function GetChannelProductToRow(){
	var pid = $('#dialog_pid').val();
	var sku = $('#dialog_sku').val();
	if (!pid && !sku){
		alert('请输入产品');
		return;
	}

	if (sku){
		$.ajax({
			url: '?mod=product.ajax.sku&sku='+sku+'&type=check_sku&times=<?php echo $_POST['times']; ?>&rand=' + Math.random(),
			processData: true,
			dataType:'json',
			success: function(info){
				if (!info.product||!info.product.id){
					alert('没有找到指定的商品');
					return;
				}

				if (!info.sku){
					alert('没有查询到SKU');
					return;
				}

				AddRow(info);
			},
			error:function(info){
				alert("网络传输错误,请重试...");
				return false;
			}
		});

		return true;
	}

	$.ajax({
		url: '?mod=product.ajax.sku&pid='+pid+'&sku='+sku+'&type=get_product&rand=' + Math.random(),
		processData: true,
		dataType:'json',
		success: function(info){
			if (!info.product||!info.product.id){
				alert('没有找到指定的商品');
				return;
			}

			productId = pid;

if (info.have_attribute==1){
				var html = info.attribute_html;
				Dialog('选择属性',html,GetSkuToRow,false,function(){AttributeEventNoLimit();});
}else{
				if (!info.sku){
					alert('没有查询到SKU');
					return;
				}
				AddRow(info);
				AddChannelProductToRow()

}
		},
		error:function(info){
			alert("网络传输错误,请重试...");
			return false;
		}
	});
}
</script>