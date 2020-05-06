<{include file="admin/header.tpl"}>
<div id="contents">
    <form name="myform" action="?ct=cache&ac=index" method="POST" jstype="vali">
        <input type='hidden' name='tb' value='admin_log' />
        <input type='hidden' name='orderby' value='' />
        <table width="100%" cellspacing="0" class="search-form">
            <tbody>
            <tr>
                <td>
                    <div class="explain-col">
                        请选择删除缓存的目录&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"  name="synchurls[]" id='synchurls[]' class="synch_url" rel="parent">&nbsp;<label for='synchurls[]'>全选/取消</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="checkbox" value="/data/cache" name="dirs[]" id='dirs' class="synch_url" rel="child">
                        <label for='dirs'>
                            框架缓存
                        </label>&nbsp;&nbsp;
                        <input type="checkbox" value="/templates/compile" name="dirs[]" id="dirs4" class="synch_url" rel="child">
                        <label for="dirs4">
                            模板缓存
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="explain-col" style="border-top:none;">
                        <input type='hidden' name='dosubmit' value='true' />
                        <button type="submit">保存</button> &nbsp;&nbsp;&nbsp;
                        <button type="reset">重设</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </form>

</div>

</body>
</html>
<script language="javascript">
    $(function(){
        var curid = $(":input:checked").val();
        curid = curid+'id';
        alterUC(curid);

    });
    function alterUC(id)
    {
        var	curid = id;
        var obj = $("table[id='table']>tbody");
        $("table[id='table']>tbody").each(function(){
            if(this.id==curid)
            {
                $(this).css('display','');
            }
            else
            {
                $(this).css('display','none');
            }
        });
    }
</script>
