<{include file='admin/header.tpl'}>
<script type="text/javascript">
    function ajaxSelectChange(id,tag,url){
        if(id<1)return false;
        var currentValue = $('.'+tag).attr('currentValue');
        $.post(
                url,
                {id:id,currentValue:currentValue},
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
<div style="width:96%;margin:auto;padding:auto">
    <form name="myform" jstype="vali" action="?ct=<{$ct}>&ac=edit" method="POST"  enctype="multipart/form-data">
        <table width="100%" class="form">
            <input type="hidden" name="<{$_dbfield.mainKey}>" value="<{$data[$_dbfield.mainKey]}>">


            <{foreach from=$_dbfield.editTableField item=field}>

            <{if $_dbfield[$field].element.e_name=='input' && $_dbfield[$field].element.e_type}>
            <tr>
                <td>
                    <{$_dbfield.allTableField[$field]}>:<{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}><font color="red">*</font>
                    <{/if}>
                </td>
                <td>
                    <input type='<{$_dbfield[$field].element.e_type}>' id="add_<{$field}>" name='<{$field}>' class="text <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}>error<{/if}>" <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}>errormsg='<{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}>' vali='<{$_submit_validate[$field].1}>'<{/if}> value='<{$data[$field]}>' <{if isset($_dbfield[$field].element.jstype) && $_dbfield[$field].element.jstype!=''}>jstype="<{$_dbfield[$field].element.jstype}>"<{/if}> /> <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}><span class="text-hint normal"><{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}></span><{/if}>

                    <{if isset($_dbfield[$field].element.type) && $_dbfield[$field].element.type=='image' && $_dbfield[$field].element.src!='' && $data[$field]!=''}>
                <img src="<{$_dbfield[$field].element.src}><{$data[$field]}>" style="width:100px;height:80px;" />
                    <{/if}>
                </td>
            </tr>

            <{elseif $_dbfield[$field].element.e_name=='select' && $_dbfield[$field].element.datafrom}>
            <tr>
                <td>所属<{$_dbfield.allTableField[$field]}>:<{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}><font color="red">*</font><{/if}></td>
                <td>
                    <select name="<{$field}>" id="add_<{$field}>" <{if isset($_dbfield[$field].element.style)}>style="<{$_dbfield[$field].element.style}>"<{/if}>  <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}>errormsg='<{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}>' vali='<{$_submit_validate[$field].1}>'<{/if}>  <{if isset($_dbfield[$field].element.js.onchange) && !empty($_dbfield[$field].element.js.onchange)}>onchange="javascript:ajaxSelectChange(this.value,'<{$_dbfield[$field].element.js.onchange.class}>','<{$_dbfield[$field].element.js.onchange.url}>')"<{/if}>  <{if isset($_dbfield[$field].element.js.ajax) && !empty($_dbfield[$field].element.js.ajax)}>class="<{$_dbfield[$field].element.js.ajax.class}>"<{/if}>  currentValue="<{$data[$field]}>">
                    <option value="">所属<{$_dbfield.allTableField[$field]}></option>
                    <{if !isset($_dbfield[$field].element.js.ajax) || empty($_dbfield[$field].element.js.ajax)}>

                    <{foreach from=$_dbfield[$field].element.datafrom key=kk item=vv}>
                    <{if is_array($vv)}>
                <option value="<{$vv.id}>" <{if $data[$field]==$vv.id}>selected<{/if}>><{$vv.name}></option>
                    <{else}>
                <option value="<{$kk}>" <{if $data[$field]==$kk}>selected<{/if}>><{$vv}></option>
                    <{/if}>
                    <{/foreach}>
                    <{/if}>
                    </select>
                    <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}><span class="text-hint normal"><{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}></span><{/if}>
                </td>
            </tr>

            <{elseif $_dbfield[$field].element.e_name=='textarea'}>

            <tr>
                <td><{$_dbfield.allTableField[$field]}>:<{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}><font color="red">*</font><{/if}></td>
                <td><textarea id="add_<{$field}>" <{if isset($_dbfield[$field].element.style)}>style="<{$_dbfield[$field].element.style}>"<{/if}> name='<{$field}>'  class="text error" <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}>errormsg='<{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}>' vali='<{$_submit_validate[$field].1}>'<{/if}>><{$data[$field]|nl2br}></textarea> <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}><span class="text-hint normal"><{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}></span><{/if}>
                </td>
            </tr>

            <{else}>

            <tr>
                <td>
                    <{$_dbfield.allTableField[$field]}>:<{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}><font color="red">*</font>
                    <{/if}>
                </td>
                <td>
                    <input type='<{if $_dbfield[$field].element.e_type}><{$_dbfield[$field].element.e_type}><{else}>text<{/if}>' id="add_<{$field}>" name='<{$field}>' class="text <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}>error<{/if}>" <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}>errormsg='<{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}>' vali='<{$_submit_validate[$field].1}>'<{/if}> value='<{$data[$field]}>' <{if isset($_dbfield[$field].element.jstype) && $_dbfield[$field].element.jstype!=''}>jstype="<{$_dbfield[$field].element.jstype}>"<{/if}> /> <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='update') && $_submit_validate[$field].1=='notempty'}><span class="text-hint normal"><{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}></span><{/if}>

                    <{if isset($_dbfield[$field].element.type) && $_dbfield[$field].element.type=='image' && isset($_dbfield[$field].element.src) && $data[$field]!=''}>
                <img src="<{$_dbfield[$field].element.src}><{$data[$field]}>" style="width:100px;height:80px;" />
                    <{/if}>
                </td>
            </tr>

            <{/if}>
            <{/foreach}>


            <tr>
                <td colspan='2' align='left' height='30' >
                    <input type='hidden' name='dosubmit' value='true'  />
                    <button type="submit" >保存</button> &nbsp;&nbsp;&nbsp;
                    <button type="reset">重设</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
    <{if isset($_autoAjax) && !empty($_autoAjax)}>
    <{foreach from=$_autoAjax item=v}>
    ajaxSelectChange('<{$data[$v.field]}>','<{$v.class}>','<{$v.url}>');
    <{/foreach}>
    <{/if}>
</script>
</body>
</html>
