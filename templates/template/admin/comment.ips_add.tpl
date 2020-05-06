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
    <form name="myform" jstype="vali" action="?ct=<{$ct}>&ac=ips_add" method="POST"  >
        <table width="100%" class="form">

            <tr>
                <td>
                    IP地址:<font color="red">*</font>
                </td>
                <td>
                    <input type='text' id="add_ipadd" name='ipadd' class="text error" errormsg='IP地址必须提供!' vali='notempty' value='' /> <span class="text-hint normal">IP地址必须提供!</span></td>
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
