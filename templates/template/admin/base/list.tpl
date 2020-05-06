<form name="form1" action="?ct=<{$ct}>&ac=<{$ac}>_do" method="POST">
<input type='hidden' name='tb' value='sorting' />
<input type="hidden" name="sub" value="del" />
<table class="table-sort table-operate">
  <tr>
    <td>全选<input type='checkbox' id='allid' value='' /></td>
    <{if !empty($self_opt.opt_button)}>
    <{foreach key=b_key item=b_item from=$self_opt.opt_button}>
    <td><strong><{$b_key}></strong></td>
    <{/foreach}>
    <{/if}>
     <{if !empty($self_opt)}>
    <{foreach key=so_key item=so_item from=$self_opt}>
    <{if !empty($tb_column.$so_key) && $so_item.0=='show'}>
    <td><strong><{$tb_column.$so_key}></strong></td>
    <{/if}>
    <{/foreach}>
    <{/if}>
  </tr>
  <{foreach from=$array_list item='v' key='k'}>
  <tr>
      <td><input type='checkbox' name='ids[]' value='<{$v.$tb_mk}>' class='f'/></td>
    <{if !empty($self_opt.opt_button)}>
    <{foreach key=b_key item=b_item from=$self_opt.opt_button}>
        <td>
    <{foreach key=b_k item=b_i from=$b_item}>
          [<a <{if !empty($b_i.1)&&is_array($b_i)}>style="color:brown;" <{/if}>href="<{if !empty($b_i.1)}>javascript:show_data('<{$b_k}><{$v.$tb_mk}>');<{else}><{$b_k}><{$v.$tb_mk}><{/if}>"><{if is_array($b_i)}><{$b_i.0}><{else}><{$b_i}><{/if}></a>]&nbsp; 
    <{/foreach}>
        </td>
    <{/foreach}>
    <{/if}>
    
      <{if !empty($self_opt)}>
      <{foreach key=so_key item=so_item from=$self_opt}>
    <{if !empty($tb_column.$so_key) && $so_item.0=='show'}>
        <td> 
      <{if !empty($so_item.1) && $so_item.1 == 'input_text' }>
          <input type="text" class="<{if !empty($so_item.2)}><{$so_item.2}><{/if}>" name="<{$so_key}>[<{$v.$tb_mk}>]" value="<{$v.$so_key}>"/>
        <{elseif !empty($so_item.1) && $so_item.1 == 'input_select'}>
            <{if !empty($so_item.2)}>            
            <select name="<{$so_key}>[<{$v.$tb_mk}>]">
                <{foreach key=k item=i from=$so_item.2}>
                    <option value="<{$k}>" <{if $k==$v.$so_key}>selected='selected'<{/if}>><{$i}></option>
                <{/foreach}>
            </select>
            <{/if}>
        <{elseif !empty($so_item.1) && $so_item.1 == 'input_radio'}>
        <{elseif !empty($so_item.1) && $so_item.1 == 'pic'}>
            <{if !empty($v.$so_key)}><img src='<{$v.$so_key}>' height='50px'/><{/if}>
        <{else}>
	<A href="javascript:show_data('?ct=youxi3&ac=hand&select_value=<{$v.id}>');"><{$v.$so_key}></A>
        <{/if}>
            </td>

        <{/if}>
    <{/foreach}>
    <{/if}>
  </tr>
  <{/foreach}>

</table>
</form>
  </div>
<div id="bottom">
    <div class="fl">
        <{if empty($self_opt.SUBMIT)}>
            <button type="button" onclick="do_pl('upd');">批量修改</button>
            <button type="button" onclick="do_delete();">删除选中记录</button>
        <{else}>
            <{foreach key=k_s item=i_s from=$self_opt.SUBMIT}>
                <{if $k_s== 'pl'}>
            <button type="button" onclick="do_pl('<{$i_s.1}>');"><{$i_s.0}></button>
                <{elseif $k_s=='del'}>
            <button type="button" onclick="do_delete();"><{$i_s.0}></button>
                <{/if}>
            <{/foreach}>
        <{/if}>
    </div>
    <div class="pages">
        <{$pagination}>
    </div>
</div>
<script lang='javascript'>
function do_delete()
{
    var msg = "你确定要删除选中的记录？！";
    msg += "<br/><a href='javascript:tb_remove();'>&lt;&lt;点错了</a> &nbsp;|&nbsp; <a href='javascript:document.form1.submit();'>确定要删除&gt;&gt;</a>";
    tb_showmsg(msg);
}
function do_pl(type)
{
    document.form1.sub.value = type;
    var msg = " 确定批量执行？！";
    msg += "<br/><a href='javascript:tb_remove();'>&lt;&lt;点错了</a> &nbsp;|&nbsp; <a href='javascript:document.form1.submit();'>确定执行&gt;&gt;</a>";
    tb_showmsg(msg);
}
function show_data(nid)
{
    tb_show('浏览/编辑记录', nid +'&TB_iframe=true&height=600&width=1000', true);
}
$("#allid").click(function(){
$this = $(this);
if($this.attr("checked")==true)
{
    $(".f").attr("checked",'true');
}else{
    $(".f").removeAttr("checked");
}		
});

</script>

    