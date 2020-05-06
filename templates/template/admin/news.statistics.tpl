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

            <?php $boolSearchMust = false;?>
            <{foreach from=$_dbfield key=k item=v}>

                <{if isset($v.search) && $v.search==1}>
                    <{if $v.element.e_name=='input' && !empty($v.element.e_type)}>
                        &nbsp;&nbsp;&nbsp;
                        <label><{$_dbfield.allTableField[$k]}>：</label>
                        <input type="<{$v.element.e_type}>" id="search_<{$k}>" name="<{$k}>" value="<?php echo $this->_tpl_vars['search'.$this->_tpl_vars['k']] ?>" class="text m" <{if isset($v.element.jstype) && $v.element.jstype!=''}>jstype="<{$v.element.jstype}>"<{/if}>>
                        <?php $boolSearchMust = true;?>

                    <{elseif $v.element.e_name=='select' && !empty($v.element.datafrom)}>
                        <{if !isset($v.element.js) || empty($v.element.js)}>
                            &nbsp;&nbsp;&nbsp;
                            <label>所属<{$_dbfield.allTableField[$k]}>：</label>
                            <select name="<{$k}>" id="search_<{$k}>" style="height:23px;">
                                <option value="" >所属<{$_dbfield.allTableField[$k]}></option>
                                <{foreach from=$v.element.datafrom key=kk item=vv}>
                                    <{if is_array($vv)}>
                <option value="<{$vv.id}>" <?php if($this->_tpl_vars['search'.$this->_tpl_vars['k']]==$this->_tpl_vars['vv']['id'])echo 'selected';?> ><{$vv.name}></option>
                    <{else}>
                <option value="<{$kk}>" <?php if($this->_tpl_vars['search'.$this->_tpl_vars['k']]==$this->_tpl_vars['kk'])echo 'selected';?> ><{$vv}></option>
                    <{/if}>
                                <{/foreach}>
                            </select>
                        <{else}>

                            &nbsp;&nbsp;&nbsp;
                            <label>所属<{$_dbfield.allTableField[$k]}>：</label>
                            <select name="<{$k}>" id="search_<{$k}>" style="height:23px;" <{if !empty($v.element.js.onchange)}>onchange="javascript:ajaxSelectChange(this.value,'<{$v.element.js.onchange.class}>','<{$v.element.js.onchange.url}>')"<{/if}>  <{if !empty($v.element.js.ajax)}>class="<{$v.element.js.ajax.class}>"<{/if}> >
                                <option value="" >所属<{$_dbfield.allTableField[$k]}></option>
                                <{if !isset($v.element.js.ajax) || empty($v.element.js.ajax)}>
                                    <{foreach from=$v.element.datafrom key=kk item=vv}>
                                        <{if is_array($vv)}>
                    <option value="<{$vv.id}>" <?php if($this->_tpl_vars['search'.$this->_tpl_vars['k']]==$this->_tpl_vars['vv']['id'])echo 'selected';?> ><{$vv.name}></option>
                        <{else}>
                    <option value="<{$kk}>" <?php if($this->_tpl_vars['search'.$this->_tpl_vars['k']]==$this->_tpl_vars['kk'])echo 'selected';?> ><{$vv}></option>
                        <{/if}>
                                    <{/foreach}>
                                <{/if}>
                            </select>

                        <{/if}>


                        <?php $boolSearchMust = true;?>
                    <{/if}>

                <{/if}>


            <{/foreach}>
            <?php if($boolSearchMust){ ?>
            <button type="submit">搜索</button><span style="margin-left:25px;">
            <?php } ?>



        </form>

    </div>
    <table class="table-sort">
        <tbody>
        <tr>
            <th>类型</th>
            <th>日期</th>
            <th>文章数</th>
        </tr>
        <{if !empty($data_list)}>
            <{foreach key=key item=v from=$data_list}>
                <tr>
                    <td>
                        <{$v.typename}>
                    </td>
                    <td>
                        <{$v.statdate}>
                    </td>
                    <td>
                        <{$v.total}>
                    </td>
                </tr>
            <{/foreach}>
            <tr ><td colspan="3">总数:<{$totalarticle}></td></tr>
        <{else}>
            <tr>
                <td colspan="3" align="center">数据为空</td>
            </tr>
        <{/if}>

        </tbody></table>
</div>

<div id="bottom">
    <div class="pages"><{$pages}></div>
</div>

</body>
</html>
