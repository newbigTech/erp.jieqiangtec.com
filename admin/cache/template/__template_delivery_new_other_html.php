<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2015-12-23 09:19:34
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>


<div class="HY-content-header clearfix-overflow">
	<h3><?php echo $warehouse_info['name']; ?> 其他出库</h3>
	<div class="right">
		<button type="button" class="scalable back" onclick="SubmitForm();" style=""><span>保存出库单</span></button>
	</div>
</div>

<form method="post" id="main_form" onsubmit="return false;">

<div class="clearfix">
	<div class="left">
		<button type="button" id="add-btn">添加出库商品</button>
	</div>
	<div class="right">
		<table>
			<tr>
				<td>
					<b>业务类型：</b>
					<select name="type">
						<option value="0">----------</option>
						<?php
if ( $type_list )
{
foreach ( $type_list as $key => $val )
{
?>
						<?php
if ( $key != 1 )
{
?>
						<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
						<?php
}
?>
						<?php
}
}
?>
					</select>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="block5"></div>

<div class="HY-grid-title">
	<div class="HY-grid-title-inner">
		采购商品列表
	</div>
</div>
<div class="HY-grid">
	<table cellspacing="0">
		<thead>
			<tr class="header">
				<th width="100">商品ID</th>
				<th width="120">SKU</th>
				<th width=""><nobr>商品名称<nobr></th>
				<th width="190">出库数量</th>
				<th width="130">出库货位</th>
				<th width="220">备注</th>
				<th width="120">操作</th>
			</tr>
		</thead>
		<tbody id="purchase_row"></tbody>
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
					<td class="label"><label>收货备注</label></td>
					<td class="value">
						<div>
							<textarea name="comment" style="width:800px;height:120px;overflow-x:auto;overflow-y:auto;"></textarea>
						</div>
					</td>
					<td><small>&nbsp;</small></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

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
				<input type="text" id="place_id_{4}">
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

<script language="JavaScript">

$(document).ready(function(){
	$('#add-btn').click(function(){
		AddProductToRow();
	});

	$('a[name=remove]').click(function(){
		if (confirm('确定要移除吗?')){
			$(this).parents('tr').eq(0).remove();
		}
	});
});

var productId = 0;
var timer = 1;

function AddRow(info){
	var html = $('#tpl_product_row').html().replace(/-_-/ig, '').format(
		info.sku_info.product.id,
		info.sku,
		info.sku_info.product.name,
		info.sku_info.attribute ? '<b>属性：</b>'+info.sku_info.attribute : '',
		timer
	);

	$('#purchase_row').append(html);

	$('a[name=remove]').click(function(){
		if (confirm('确定要移除吗?')){
			$(this).parents('tr').eq(0).remove();
		}
	});

	var auto = new Ext.form.AutoCompleteField({
		applyTo: 'place_id_'+timer,
		hideTrigger:true,
		width:110,
		hiddenName:'place_id[]',
		store:autoComplatePlaceStore,
		mode: 'local',
		tpl:autoComplatePlaceTemplate,
		valueField:'id',
		displayField:'name',
		queryId:'key',
		emptyText:'按货位名称查找...'
	});

	timer++;
}

function SubmitForm(){
	var post = $('#main_form').serialize();
	Loading();
	$.ajax({
		url: '?mod=delivery.other<?php echo $warehouse_uri; ?>&rand=' + Math.random(),
		type:'POST',
		data:post,
		success: function(info){
			if (info=='200' || info==200){
				Loading('处理成功', '正在跳转到列表页面...');
				window.location='?mod=delivery.list<?php echo $warehouse_uri; ?>';
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

var warehouseId = '<?php echo $warehouse_id; ?>';

</script>
