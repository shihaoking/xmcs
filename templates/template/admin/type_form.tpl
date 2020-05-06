<{include file="admin/header.tpl"}>
<div style="width:96%;margin:auto;padding:auto">

<form name="form1" action="?ct=ios&ac=level&even=level_do&tb=sorting" method="POST" >
<table class="form">
<{if !empty($v.id)}>
    <input type='hidden' name='id' value='<{$v.id}>' />
<{/if}>    
<tr>
  <td class='title'>名 称 : </td>
  <td class='fitem'><input type='text' name='name' class='s'  value='<{if !empty($v.name)}><{$v.name}><{/if}>'/></td>   
</tr>

<tr>
  <td class='title'>网址限量 : </td>
  <td class='fitem'><input type='text' name='limit' class='s'  value='<{$v.limit}>'/></td>
</tr>

<tr>
  <td class='title'>归 属 : </td>
  <td class='fitem'>
  <{if !empty($level_list)}>
  <span>
  <{foreach key=key item=item from=$level_list}>
  <{$item.il_name}>  
  <{/foreach}>
  </span>
  <br />
  或者
  <br />
  <{/if}>
  <span id="level1">
  		 <select name="level1" errormsg="不能为空" vali="notempty" class="level1">
              <option value="<{if !empty($level_list)}>none<{/if}>" >请选择分类</option>
<{if !empty($v.level1)}>
<{foreach key=key item=item from=$v.level1}>
              <option value="<{$key}>" ><{$item}></option>
<{/foreach}>
<{/if}>
        </select>
  </span>
  <span id="level2">
  <select name="level2" errormsg="不能为空" vali="notempty" class="level2">
  </select>
  </span>
  <span id="level3">
  <select name="level3" errormsg="不能为空" vali="notempty" class="level3">
  </select>
  </span>
  </td>
</tr>

<tr>
  <td class='title'>排 序 : </td>
  <td class='fitem'><input type='text' name='order' class='s' value='<{if !empty($v.order)}><{$v.order}><{/if}>' /></td>
</tr>

<tr>
  <td colspan='2' align='center' height='60'>
      <button type="submit">提交</button> 
      &nbsp;&nbsp;&nbsp;
      <button type="reset">重置</button>
  </td>
</tr>

</table>

</form>

</div>

<script type="text/javascript">
$(function(){

    $(".level1").live("change",function(){
        var $this = $(this);
        var s = $this.val();
        $.post("?ct=ios&ac=level_ajax", 
        { 
	         id: s, 
        },
        function(data)
        {
        	$(".level2").find('option').remove();
        	$(".level3").find('option').remove();
        	$("span#level3").hide();
        	if(data)
        	{
	        	$("span#level2").show();
	        	$(".level2").append(data);
        	}else{
	        	$("span#level2").hide();
        	}
        }
     	);
     	
    });

    $(".level2").live("change",function(){
        var $this = $(this);
        var s = $this.val();
        $.post("?ct=ios&ac=level_ajax", 
        { 
	         id: s, 
        },
        function(data)
        {
        	if(data)
        	{
	        	$("span#level3").show();
	        	$(".level3").find('option').remove();
	        	$(".level3").append(data);
        	}else{
	        	$(".level3").find('option').remove();
	        	$("span#level3").hide();
        	}
        }
     	);
     	
    });

    
});
</script>
</body>
</html>
