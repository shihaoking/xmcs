<{include file="admin/header.tpl"}>
<div id="contents">

    <dl class="search-class">
        <{include file="admin/base/filter.tpl"}>
        <a href='?ct=<{$ct}>&ac=<{$ac}>_add' id='list_add'><input type="button" value="增加" id="add" /></a> 
    <{if !empty($tp)}>所有3天内过期的广告如下: <a href="?ct=hand&ac=ad">返回</a><{else}><{if !empty($due)}>3天内将到期的ID为 : <{foreach key=k item=i from=$due}><{$i}>,<{/foreach}> 到期将使用备用广告.<a href="?ct=hand&ac=ad&tp=due">点击查看</a>全部3天内到期的广告.<{/if}><{/if}>
    </dl>

    <form name="form1" action="?ct=<{$ct}>&ac=<{$ac}>_do" method="POST">
        <input type='hidden' name='tb' value='sorting' />
        <input type="hidden" name="sub" value="del" />
        <table class="table-sort table-operate">
            <tr>
                <td>全选<input type='checkbox' id='allid' value='' /></td>
                <td>ID</td>
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
                    <td><input type='checkbox' name='ids[]' value='<{$v.id}>' class='f'/></td>
                    <td><{$v.id}></td>
                    <td>[<a style="color:brown;" href="javascript:show_data('?ct=hand&ac=ad_edit&id=<{$v.id}>');">修改</a>]</td>
                    <td><{if $v.mark == 'after'}>[过期] <{/if}><input type="text" class="" name="title[<{$v.id}>]" value="<{$v.title}>"/></td>
                    <td><input type="text" class="text" name="endtime[<{$v.id}>]" value="<{$v.endtime}>"/></td>
                    <td><{if $v.mark == 'front'}>[未用] <{/if}><input type="text" class="" name="titlere[<{$v.id}>]" value="<{$v.titlere}>"/></td>
                    <td><select name="type[<{$v.id}>]">
                            <{foreach key =k item=i from=$type_ad_array}>
                                <option value="<{$k}>" <{if $k==$v.type}>selected='selected'<{/if}>><{$i}></option>
                            <{/foreach}>
                        </select></td>
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
        tb_show('浏览/编辑记录', nid + '&TB_iframe=true&height=600&width=1000', true);
    }
    $("#allid").click(function () {
        $this = $(this);
        if ($this.attr("checked") == true)
        {
            $(".f").attr("checked", 'true');
        } else {
            $(".f").removeAttr("checked");
        }
    });

</script>



</body>
</html>