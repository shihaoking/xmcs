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
<div style="width:96%;margin:auto;padding:auto;">
    <form name="myform" jstype="vali" action="?ct=<{$ct}>&ac=edit" method="POST"  enctype="multipart/form-data">
        <table width="100%" class="form">
            <tr>
                <td>
                    模板名称(id):
                </td>
                <td>
                    <{$data.tpl_name}>(<{$data.tpl_id}>)
                </td>
            </tr>
            <tr>
                <td>
                    列名称(编号)<font color="red">*</font>：
                </td>
                <td>
                    <input type='text' id="add_tplc_name" name='tplc_name' class="text error" errormsg='列名称必须!' vali='' value='<{$data.tplc_name}>' />(<{$data.tplc_id}>) <span class="text-hint normal">列名称必须!</span></td>
                    <input type="hidden" id="add_tplc_id" name="tplc_id" class="text name="tplc_id" value="<{$data.tplc_id}>" />
                    <input type="hidden" id="add_tpl_id" name="tpl_id" class="text name="tpl_id" value="<{$data.tpl_id}>" />
            </tr>
            <tr>
                <td>
                    列标识<font color="red">*</font>：
                </td>
                <td>
                    <input type='text' id="add_tplc_code" name='tplc_code' class="text error" errormsg='列标识必须!' vali='' value='<{$data.tplc_code}>' /> <span class="text-hint normal">列标识必须!</span></td>
            </tr>
            <tr>
                <td>
                    设置标题：
                </td>
                <td>
                    <input type='checkbox' id="add_tplc_havetitle" name='tplc_havetitle' class="text" <{if $data.tplc_havetitle==1}>checked<{/if}>  vali='' value='1' /> </td>
            </tr>
            <tr>
                <td>
                    设置跳转地址：
                </td>
                <td>
                    <input type='checkbox' id="add_tplc_haveurl" name='tplc_haveurl' class="text" <{if $data.tplc_haveurl==1}>checked<{/if}> vali='' value='1' /> </td>
            </tr>
            <tr>
                <td>
                    设置媒体地址：
                </td>
                <td>
                    <input type='checkbox' id="add_tplc_havemediaurl" name='tplc_havemediaurl' <{if $data.tplc_havemediaurl==1}>checked<{/if}> class="text"  vali='' value='1' /> </td>
            </tr>
            <tr>
                <td>
                    设置小图：
                </td>
                <td>
                    <input type='checkbox' id="add_tplc_havesmallimg" name='tplc_havesmallimg' <{if $data.tplc_havesmallimg==1}>checked<{/if}> class="text"  vali='' value='1' /> </td>
            </tr>
            <tr>
                <td>
                    设置大图：
                </td>
                <td>
                    <input type='checkbox' id="add_tplc_havebigimg" name='tplc_havebigimg' <{if $data.tplc_havebigimg==1}>checked<{/if}> class="text"  vali='' value='1' /> </td>
            </tr>
            <tr>
                <td>
                    设置描述：
                </td>
                <td>
                    <input type='checkbox' id="add_tplc_havedescript" name='tplc_havedescript' <{if $data.tplc_havedescript==1}>checked<{/if}> class="text"  vali='' value='1' /> </td>
            </tr>
            <tr>
                <td>
                    设置日期：
                </td>
                <td>
                    <input type='checkbox' id="add_tplc_havedate" name='tplc_havedate' <{if $data.tplc_havedate==1}>checked<{/if}> class="text"  vali='' value='1' /> </td>
            </tr>

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

</body>
</html>
