<?php
/**
* Compiled by NEATTemplate 1.0.0
* Created on : 2013-01-08 14:59:18
*/
?>
<?php if ( !defined( 'IN_NTP' ) ) exit( 'Access Denied' ); ?>
<div class="HY-content-header clearfix">
	<h3>产品购买属性模板列表</h3>
	<p class="right">
		<button  id="" type="button" class="scalable back" onclick="window.location='?mod=product.attribute.buy.template.add';" style=""><span>添加新的模板</span></button>
	</p>
</div>

<div class="HY-grid-title">
	<div class="HY-grid-title-inner">
		
	</div>
</div>
<div class="HY-grid">
	<table cellspacing="0" class="data" id="grid_table">
		<thead>
			<tr class="header">
				<th width="40">ID</th>
				<th width=""><nobr>名称<nobr></th>
				<th width="150" align="center">添加时间</th>
				<th width="90" align="center">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php
if ( $list )
{
foreach ( $list as $info )
{
?>
			<tr>
				<td><small><?php echo $info['id']; ?></small></td>
				<td><?php echo $info['name']; ?></td>
				<td align="center"><small><?php echo $info['add_time']; ?></small></td>
				<td align="center">
					<a href="?mod=product.attribute.buy.template.edit&id=<?php echo $info['id']; ?>">编辑</a>
					<a href="?mod=product.attribute.buy.template.del&id=<?php echo $info['id']; ?>" onclick="return confirm('确定删除吗?');">删除</a>
				</td>
			</tr>
			<?php
}
}
?>
		</tbody>
	</table>
</div>