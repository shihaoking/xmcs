
<{include file='admin/header.tpl'}>
<script type="text/javascript">
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

<script type="text/javascript" charset="utf-8" src="images/js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="images/js/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="images/js/ueditor/lang/zh-cn/zh-cn.js"></script>
<div style="width:96%;margin:auto;padding:auto;">
    <form name="myform" jstype="vali" action="?ct=<{$ct}>&ac=add" method="POST"  enctype="multipart/form-data" onsubmit="return submitForm();">
        <table width="100%" class="form">
			<tr>
                <td>我的剩余金额:<font color="red">*</font></td>
                <td>
				<font color="red"><{$dl_syjf}> ￥</font>
                </td>
            </tr>
            <{foreach from=$_dbfield.addTableField item=field}>
            <{if $_dbfield[$field].element.e_name=='input' && $_dbfield[$field].element.e_type}>
            <tr>
                <td>
                    <{$_dbfield.allTableField[$field]}>:<{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}><font color="red">*</font>
                    <{/if}>
                </td>
                <td>
                    <{if ($_dbfield[$field].element.richtext)}><script id="<{$field}>_editor" type="text/plain" style="width:1024px;height:500px;"></script>

                    <{/if}>
                    <input type='<{$_dbfield[$field].element.e_type}>' id="add_<{$field}>" <{if ($_dbfield[$field].element.richtext)}>style="display:none" <{/if}> name='<{$field}>' class="text <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}>error<{/if}>" <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}>errormsg='<{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}>' vali='<{$_submit_validate[$field].1}>'<{/if}> value='<{if isset($_addFieldAuto[$field]) && isset($arrAddFieldAuto[$field])}><{$arrAddFieldAuto[$field]}><{/if}>' <{if isset($_dbfield[$field].element.jstype) && $_dbfield[$field].element.jstype!=''}>jstype="<{$_dbfield[$field].element.jstype}>"<{/if}> /> <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}><span class="text-hint normal"><{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}></span><{/if}></td>
					<input type="hidden" name="add_time"  value="<?php echo time();?>">
					
            </tr>

            <{elseif $_dbfield[$field].element.e_name=='select' && $_dbfield[$field].element.datafrom}>
            <tr>
                <td><{$_dbfield.allTableField[$field]}>:<{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}><font color="red">*</font><{/if}></td>
                <td>


                        <select name="<{$field}>" id="add_<{$field}>" <{if isset($_dbfield[$field].element.style)}>style="<{$_dbfield[$field].element.style}>"<{/if}>  <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}>errormsg='<{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}>' vali='<{$_submit_validate[$field].1}>'<{/if}>  <{if isset($_dbfield[$field].element.js.onchange) && !empty($_dbfield[$field].element.js.onchange)}>onchange="javascript:ajaxSelectChange(this.value,'<{$_dbfield[$field].element.js.onchange.class}>','<{$_dbfield[$field].element.js.onchange.url}>')"<{/if}>  <{if isset($_dbfield[$field].element.js.ajax) && !empty($_dbfield[$field].element.js.ajax)}>class="<{$_dbfield[$field].element.js.ajax.class}>"<{/if}>>
                        <option value=""><{$_dbfield.allTableField[$field]}></option>

                    <{if !isset($_dbfield[$field].element.js.ajax) || empty($_dbfield[$field].element.js.ajax)}>

                        <{foreach from=$_dbfield[$field].element.datafrom key=kk item=vv}>
                        <{if is_array($vv)}>
                        <option value="<{$vv.id}>" ><{$vv.name}></option>
                        <{else}>
                        <option value="<{$kk}>" ><{$vv}></option>
                        <{/if}>
                        <{/foreach}>

                    <{/if}>

                        </select>
                        <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}><span class="text-hint normal"><{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}></span><{/if}>



                </td>
            </tr>

            <{elseif $_dbfield[$field].element.e_name=='textarea'}>

            <tr>
                <td><{$_dbfield.allTableField[$field]}>:<{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}><font color="red">*</font><{/if}></td>
                <td><textarea id="add_<{$field}>" <{if isset($_dbfield[$field].element.style)}>style="<{$_dbfield[$field].element.style}>"<{/if}> name='<{$field}>'  class="text error" <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}>errormsg='<{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}>' vali='<{$_submit_validate[$field].1}>'<{/if}>></textarea> <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}><span class="text-hint normal"><{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}></span><{/if}></td>
            </tr>


            <{else}>

            <tr>
                <td>
                    <{$_dbfield.allTableField[$field]}>:<{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}><font color="red">*</font>
                    <{/if}>
                </td>
                <td>
                    <input type='<{if $_dbfield[$field].element.e_type}><{$_dbfield[$field].element.e_type}><{else}>text<{/if}>' id="add_<{$field}>" name='<{$field}>' class="text <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}>error<{/if}>" <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}>errormsg='<{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}>' vali='<{$_submit_validate[$field].1}>'<{/if}> value='<{if isset($_addFieldAuto[$field]) && isset($arrAddFieldAuto[$field])}><{$arrAddFieldAuto[$field]}><{/if}>' <{if isset($_dbfield[$field].element.jstype) && $_dbfield[$field].element.jstype!=''}>jstype="<{$_dbfield[$field].element.jstype}>"<{/if}> /> <{if ($_submit_validate[$field].3=='all' || $_submit_validate[$field].3=='insert') && $_submit_validate[$field].1=='notempty'}><span class="text-hint normal"><{if $_submit_validate[$field].2}><{$_submit_validate[$field].2}><{else}><{$_dbfield.allTableField[$field]}>必须!<{/if}></span><{/if}></td>
            </tr>

            <{/if}>
            <{/foreach}>


            <tr>
                <td colspan='2' align='left' height='30' >
                    <input type='hidden' name='dosubmit' value='true'  />
                    <button type="submit" >提交</button> &nbsp;&nbsp;&nbsp;
                    <button type="reset">重设</button>
                </td>
            </tr>

        </table>
    </form>
</div>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('content_editor');

    function submitForm(){
        var contentval = document.getElementById("add_content");
        var contentstr = UE.getEditor('content_editor').getContent();
        if(!UE.getEditor('content_editor').hasContents()){
            alert("内容不能为空！");
            return false;
        }
        if(!contentval){
            alert("内容不能为空！");
            return false;
        }

        contentval.value = contentstr.trim();
        return true;
    }
</script>
</body>
</html>
