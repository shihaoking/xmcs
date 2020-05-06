<{include file="admin/header.tpl"}>
<script lang='javascript'>
    function get_value(id){
        value = document.getElementById(id).value;
        if(value!=''){
            return id+'='+value;
        }else{
            return 'empty';
        }
    }

    function more_edit(id)
    {
        document.getElementById('do_action').value=id;
        document.form_list.submit();
    }

    function more_edit2(id,url)
    {
        document.getElementById('do_action').value=id;
        document.form_list.action = url;
        document.form_list.submit();
    }

    function more_delete(id,url)
    {
        document.getElementById('do_action').value=id;
        document.form_list.action = url;
        document.form_list.submit();
    }

    function ajaxSelectChange(id,tag,url){
        if(id<1)return false;
        $.post(
                url,
                {id:id},
                function(data){
                    if(data.str=='success'){
                        //$('.'+tag).append(data.data);
                        $('.'+tag).html(data.data);
                    }else{
                        alert(data.str);
                    }
                },
                'json'
        );
    }

</script>
<div id="contents">
<div style="background-color:#DAFBCA;padding:5px 10px;line-height:32px;">
    <form method="GET" action="?">
        <input type="hidden" value="<{$ct}>" name="ct">
        <input type="hidden" value="<{$ac}>" name="ac">

        &nbsp;&nbsp;&nbsp;
        <label>IP：</label>
        <input type="text" id="search_ip" name="ip" value="<?php echo $this->_tpl_vars['search'.$this->_tpl_vars['k']] ?>" class="text m" <{if isset($v.element.jstype) && $v.element.jstype!=''}>jstype="<{$v.element.jstype}>"<{/if}>>

        <button type="submit">搜索</button><span style="margin-left:25px;">



    </form>
</div>

<form id="form_list" name="form_list" method="POST" action="?ct=<{$ct}>&amp;ac=batch_update">
    <input type="hidden" id="do_action" name="do_action" value="" />
    <table class="table-sort">
        <tbody>
        <tr>
            <th width="20"><input type="checkbox" rel="parent" value="" name=""></th>
            <th>IP</th>

            <th>管理</th>
        </tr>
        <{if !empty($data_list)}>
            <{foreach key=key item=v from=$data_list}>
            <tr>
                <td><input type="checkbox" rel="child" value="<{$v}>" name="ids[<{$v}>]"></td>

                <td>
                    <{$v}>
                </td>

                <td>
                    <a class="btn delete" jsbotton="confirm" isconfirm="1" href="?ct=<{$ct}>&amp;ac=deleteip&amp;id=<{$v}>" title="注意：请谨慎操作。"><{if $_allowAction.delete.title!=''}><{$_allowAction.delete.title}><{else}>删<{/if}></a>

                </td>
            </tr>
            <{/foreach}>
            <{else}>
            <tr>
                <td colspan="<{$_dbfield.allTableField|count}>" align="center">数据为空</td>
            </tr>
            <{/if}>

        </tbody></table>
</form>

</div>

<div id="bottom">
    <form method="POST" action="" bind=".table-sort">
        <div class="fl">
            <input type="checkbox" id="checkall" rel="parent" value="" name="">
            <label for="checkall">全选</label>


            <button type="button" onclick="more_delete('batch_deleteip','?ct=<{$ct}>&amp;ac=batch_deleteip');">批量删除</button>&nbsp; &nbsp;

            <!--<button type="button" onclick="more_edit2('edit','?ct=video&amp;ac=video_batch_clear_flag');">批量下推荐位</button>&nbsp; &nbsp;

        <button type="button" jstype="btn_post" isconfirm="1" url="?ct=<{$request.ct}>&ac=video_batch_del">批量删除</button>-->

            &nbsp; &nbsp;

        </div>
    </form>
    <div class="pages"><{$pages}></div>
</div>

</body>
</html>
