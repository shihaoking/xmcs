<{if !empty($filter_array)}>
    <{foreach key=fa_key item=fa_item from=$filter_array}>
        <dt><{$fa_item.0}>：</dt>
        <dd>
            <{if $fa_item.1== 'select'}>
                <select name="select_value" id="select_value">
                    <option value="">全部</option>
                    <{if !empty($fa_item.2)}>
                        <{foreach from=$fa_item.2 key=fi_key item=fi_item}>
                            <option value="<{$fi_key}>" <{if !empty($fa_item.3) && $fa_item.3==$fi_key}>selected="selected"<{/if}>><{$fi_item}></option>
                        <{/foreach}>
                    <{/if}>
                </select> 
                <script type="text/javascript">
                $("#select_value").change(function(){
                    var select_value = $("#select_value").val();
                    location.href = "?ct=<{$ct}>&ac=<{$ac}>&select_value=" + select_value;
                });
                </script>

            <{elseif $fa_item.1== 'text'}>
                <input type="text" class="text m" id="search_value" name="search_value" value="<{if !empty($fa_item.2)}><{$fa_item.2}><{/if}>" />[模糊]
                <input type="button" value="搜索" id="search" />
                <script type="text/javascript">
                $("#search").click(function(){
                    var search_value = encodeURIComponent($("#search_value").val());
                    var t = (new Date()).valueOf();
                    location.href = "?ct=<{$ct}>&ac=<{$ac}>&search_value=" + search_value + "&_t=" + t;
                });
                </script>
            <{/if}>
        </dd>
    <{/foreach}>
<{/if}>