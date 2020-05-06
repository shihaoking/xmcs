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

    <form id="form_list" name="form_list" method="POST" action="?ct=<{$ct}>&amp;ac=batch_update">
        <input type="hidden" id="do_action" name="do_action" value="" />
        <table class="table-sort">
            <tbody>
            <tr>
                <th width="20"><input type="checkbox" rel="parent" value="" name=""></th>
                <{*指定了列表字段*}>
                <{if $_dbfield.listTableField}>
                    <{foreach from=$_dbfield.listTableField key=field item=v}>
                    <th><{$_dbfield.allTableField[$v]}></th>
                    <{/foreach}>
                <{else}>
                    <{foreach from=$_dbfield.allTableField item=v}>
                    <th><{$v}></th>
                    <{/foreach}>
                <{/if}>

                <th>管理</th>
            </tr>
            <{if !empty($data_list)}>
                <{foreach key=key item=v from=$data_list}>
                <tr>
                    <td><input type="checkbox" rel="child" value="<{$v[$_dbfield.mainKey]}>" name="ids[<{$v[$_dbfield.mainKey]}>]"></td>
                    <{*指定了列表字段*}>
                    <{if $_dbfield.listTableField}>
                        <{foreach from=$_dbfield.listTableField key=intk item=field}>
                        <td>

                            <{if $_dbfield[$field].element.e_name=='select' && $_dbfield[$field].element.datafrom}>
                                <{if !isset($_dbfield.batchUpdateTableField) || !in_array($field,$_dbfield.batchUpdateTableField)}>
                                    <{*<{assign var='selectkey' value=$v[$field]}>
                                    <{assign var='selectvalue' value=$_dbfield[$field].element.datafrom}>
                                    <{if $selectvalue[$selectkey]}>
                                        <{$v[$field]}>(<{$selectvalue[$selectkey]}>)
                                    <{else}>
                                        <{$v[$field]}>
                                    <{/if}>*}>
                                    <{foreach from=$_dbfield[$field].element.datafrom key=kk item=vv}>
                                        <{if is_array($vv)}>
                                            <{if $v[$field]==$vv.id}><{$vv.name}>(<{$v[$field]}>)<{/if}>
                                        <{else}>
                                            <{if $v[$field]==$kk}><{$vv}>(<{$v[$field]}>)<{/if}>
                                        <{/if}>
                                    <{/foreach}>
                                <{elseif isset($_dbfield.batchUpdateTableField) && in_array($field,$_dbfield.batchUpdateTableField)}>
                                    <select name="<{$field}>[<{$v[$_dbfield.mainKey]}>]">
                                        <option value="" >所属<{$_dbfield.allTableField[$field]}></option>
                                        <{foreach from=$_dbfield[$field].element.datafrom key=kk item=vv}>
                                            <{if is_array($vv)}>
                                                <option value="<{$vv.id}>" <{if $v[$field]==$vv.id}>selected<{/if}>><{$vv.name}></option>
                                            <{else}>
                                                <option value="<{$kk}>" <{if $v[$field]==$kk}>selected<{/if}>><{$vv}></option>
                                            <{/if}>
                                        <{/foreach}>
                                    </select>
                                <{/if}>
                            <{else}>

                                <{if isset($_dbfield.batchUpdateTableField) && in_array($field,$_dbfield.batchUpdateTableField)}>
                                    <input type="text" name="<{$field}>[<{$v[$_dbfield.mainKey]}>]" value="<{$v[$field]}>"  class="text <{if !empty($_dbfield[$field].element.class)}><{$_dbfield[$field].element.class}><{else}>s<{/if}>" <{if isset($_dbfield[$field].element.jstype) && $_dbfield[$field].element.jstype!=''}>jstype="<{$_dbfield[$field].element.jstype}>"<{/if}> />
                                <{else}>
                                    <{if isset($_dbfield[$field].element.type) && $_dbfield[$field].element.type=='image' && isset($_dbfield[$field].element.src) && $v[$field]!=''}>
                                        <img title="<{$v[$field]}>" alt="<{$v[$field]}>" src="<{$_dbfield[$field].element.src}><{$v[$field]}>" style="width:80px;height:60px;" />
                                    <{else}>
                                        <{$v[$field]}>
                                    <{/if}>
                                <{/if}>


                            <{/if}>
                        </td>
                        <{/foreach}>
                    <{*没有指定列表字段*}>
                    <{else}>

                        <{foreach from=$_dbfield.allTableField key=field item=fieldName}>
                        <td>

                            <{if $_dbfield[$field].element.e_name=='select' && $_dbfield[$field].element.datafrom}>
                                <{if !isset($_dbfield.batchUpdateTableField) || !in_array($field,$_dbfield.batchUpdateTableField)}>
                                    <{*<{assign var='selectkey' value=$v[$field]}>
                                    <{assign var='selectvalue' value=$_dbfield[$field].element.datafrom}>
                                    <{if $selectvalue[$selectkey]}>
                                        <{$v[$field]}>(<{$selectvalue[$selectkey]}>)
                                    <{else}>
                                        <{$v[$field]}>
                                    <{/if}>*}>
                                    <{foreach from=$_dbfield[$field].element.datafrom key=kk item=vv}>
                                        <{if is_array($vv)}>
                                            <{if $v[$field]==$vv.id}><{$vv.name}>(<{$v[$field]}>)<{/if}>
                                        <{else}>
                                            <{if $v[$field]==$kk}><{$vv}>(<{$v[$field]}>)<{/if}>
                                        <{/if}>
                                    <{/foreach}>
                                <{elseif isset($_dbfield.batchUpdateTableField) && in_array($field,$_dbfield.batchUpdateTableField)}>
                                    <select name="<{$field}>[<{$v[$_dbfield.mainKey]}>]">
                                        <option value="" >所属<{$_dbfield.allTableField[$field]}></option>
                                        <{foreach from=$_dbfield[$field].element.datafrom key=kk item=vv}>
                                            <{if is_array($vv)}>
                                                <option value="<{$vv.id}>" <{if $v[$field]==$vv.id}>selected<{/if}>><{$vv.name}></option>
                                            <{else}>
                                                <option value="<{$kk}>" <{if $v[$field]==$kk}>selected<{/if}>><{$vv}></option>
                                            <{/if}>
                                        <{/foreach}>
                                    </select>
                                <{/if}>
                            <{else}>
                                <{if isset($_dbfield.batchUpdateTableField) && in_array($field,$_dbfield.batchUpdateTableField)}>
                                    <input type="text" name="<{$field}>[<{$v[$_dbfield.mainKey]}>]" value="<{$v[$field]}>"  class="text <{if !empty($_dbfield[$field].element.class)}><{$_dbfield[$field].element.class}><{else}>s<{/if}>" <{if isset($_dbfield[$field].element.jstype) && $_dbfield[$field].element.jstype!=''}>jstype="<{$_dbfield[$field].element.jstype}>"<{/if}> />
                                <{else}>
                                    <{if isset($_dbfield[$field].element.type) && $_dbfield[$field].element.type=='image' && isset($_dbfield[$field].element.src) && $v[$field]!=''}>
                                        <img title="<{$v[$field]}>" alt="<{$v[$field]}>" src="<{$_dbfield[$field].element.src}><{$v[$field]}>" style="width:100px;height:80px;" />
                                    <{else}>
                                        <{$v[$field]}>
                                    <{/if}>

                                <{/if}>


                            <{/if}>
                        </td>
                        <{/foreach}>

                    <{/if}>

                    <td>

                        <{if isset($_dbfield.editTableField) && !empty($_dbfield.editTableField)}>
                            <{if isset($_allowAction.edit) && !empty($_allowAction.edit)}>
                                <a href="?ct=<{$ct}>&amp;ac=edit&amp;id=<{$v[$_dbfield.mainKey]}>&amp;page_no=<{$current_page}>" class="btn edit" style="cursor:pointer;"><{if $_allowAction.edit.title!=''}><{$_allowAction.edit.title}><{else}>修改<{/if}></a>
                        &nbsp;&nbsp;
                            <{/if}>
                        <{/if}>

                        <{if isset($_allowAction.delete) && !empty($_allowAction.delete)}>
                            <a class="btn delete" jsbotton="confirm" isconfirm="1" href="?ct=<{$ct}>&amp;ac=delete&amp;id=<{$v[$_dbfield.mainKey]}>" title="注意：请谨慎操作。"><{if $_allowAction.delete.title!=''}><{$_allowAction.delete.title}><{else}>删<{/if}></a>
                        <{/if}>

                        <{if isset($_allowAction._extend) && !empty($_allowAction._extend)}>
                            <{foreach from=$_allowAction._extend item=vext key=url}>
                                <{if $vext.type=='dialog'}>
                                    <button type="button" onclick="tb_show('<{$vext.title}>','<{$url}>&<{$vext.paramto}>=<{$v[$vext.paramfrom]}>&TB_iframe=true&width=<{$vext.width}>&height=<{$vext.height}>',true);"><{if $vext.title!=''}><{$vext.title}><{else}>未知操作名称<{/if}></button>&nbsp; &nbsp;
                                <{else}>
                                    <a href='<{$url}>&<{$vext.paramto}>=<{$v[$vext.paramfrom]}>' class="btn" style="cursor:pointer;"><{if $vext.title!=''}><{$vext.title}><{else}>未知操作名称<{/if}></a>
                                &nbsp;&nbsp;
                                <{/if}>
                            <{/foreach}>
                        <{/if}>


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

            <{if isset($_dbfield.batchUpdateTableField) && !empty($_dbfield.batchUpdateTableField)}>
            <button type="button" onclick="more_edit('edit');">批量修改</button>&nbsp; &nbsp;
            <{/if}>

            <{if isset($_dbfield.batchDeleteTableField) && !empty($_dbfield.batchDeleteTableField)}>
            <button type="button" onclick="more_delete('batch_delete','?ct=<{$ct}>&amp;ac=batch_delete');">批量删除</button>&nbsp; &nbsp;
            <{/if}>

            <!--<button type="button" onclick="more_edit2('edit','?ct=video&amp;ac=video_batch_clear_flag');">批量下推荐位</button>&nbsp; &nbsp;

        <button type="button" jstype="btn_post" isconfirm="1" url="?ct=<{$request.ct}>&ac=video_batch_del">批量删除</button>-->
            <{if isset($_allowAction.add) && !empty($_allowAction.add)}>
                <{if $_allowAction.add.type=='dialog'}>
                    <button type="button" onclick="tb_show('<{$_allowAction.add.title}>','?ct=<{$ct}>&ac=add&TB_iframe=true&width=<{$_allowAction.add.width}>&height=<{$_allowAction.add.height}>',true);"><{if $_allowAction.add.title!=''}><{$_allowAction.add.title}><{else}>新增<{/if}></button>&nbsp; &nbsp;
                <{else}>
                    <a href="?ct=<{$ct}>&amp;ac=add" class="btn add" style="cursor:pointer;"><{if $_allowAction.add.title!=''}><{$_allowAction.add.title}><{else}>新增<{/if}></a>
                    &nbsp;&nbsp;
                <{/if}>
            <{/if}>




        </div>
    </form>
    <div class="pages"><{$pages}></div>
</div>

</body>
</html>
