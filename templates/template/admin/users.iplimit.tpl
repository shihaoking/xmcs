<{include file="admin/header.tpl"}>

<form id="form1" action="?ct=users&ac=iplimit" method="POST" enctype="multipart/form-data">
<div id="contents">
    <table class="form" style="width:800px">
    <tr>
        <td style='background:#EEF8FF;padding-left:8px;font-weight:bold'>&raquo;登录IP限制管理(&lt;ip&gt;标记不要改动)：</td>
    </tr>
    <tr>
        <td>
            <textarea name="ips" class="text" style="width:800px;height:350px;"><{$ips}></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <button type="submit">确定保存</button>
        </td>
    </tr>
</table>
</div>
</form>

</body>
</html>
