<{include file="admin/header.tpl"}>
<script lang='javascript'>
function more_edit()
{
	document.myform.submit();
}
</script>

<div id="contents">
<form id="myform" name="myform" id="myform" action="?ct=class&amp;ac=listorder" method="POST">
<input type="hidden" name="dosubmit" value="true">
<table class="table-sort table-operate">
	<tr>
		<th> <input name="checkbox" id="checkbox" type="checkbox" value="" rel="parent" /><label for="checkbox">全选</label></th>
		<th> ID </th>
		<th>  排序 </th>
		<th> 名称 </th>
		<th> 所在模型 </th>
		<th>操作管理</th>
	</tr>
	<{$classdata}>
</table>
</form>
</div>

<div id="bottom">
<form bind=".table-sort"  method="POST" jstype="vali" >
        <div class='left_cz' style='float:left'>
              <label for="cgecjall"><input type="checkbox" id="checkall" rel="parent" value="" name=""></label>
              <label for="">全选</label>
              <button type="button" onclick="more_edit();">批量排序</button>
	<select errormsg="请选择内容"  id="" name="status">
   <option value='' >批量操作</option>
   <option value="-1">删除</option>
        </select>
	    <button type="button" jstype="btn_post" url="?ct=class&amp;ac=del" isconfirm="1">提交</button>
	    </div>
	<div class="pages">
		<div class="ylmf-page">

		</div>
	</div>
	</form>
</div>

</body>
</html>
