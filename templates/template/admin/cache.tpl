<{include file="admin/header.tpl"}>
<div id="contents">  
  <p class="cachetitle">页面缓存删除</p> 
  <div class="cachecon">
      <p>URL删除缓存： <input type='text' name='url' class='l'  value='' id="url" placeholder="要清除页面的URL"/> <input type="button" onclick="clearCache('#url','url','page');" value="清除缓存" /></p>
      <p>快捷删除缓存：<select name="" class="select" id="short">
          <option value="">--请选择--</option>
          <option value="index">首页</option>
          <option value="website">手机酷站</option>
          <option value="news">资讯热点</option>
          <option value="tools">实用工具</option>
          <option value="app">手机应用</option> 
          <option value="city">城市选择</option>
          <option value="feedback">意见反馈</option> 
          <option value="all">全部</option>
          </select> <input type="button" onclick="clearCache('#short','short','page');" value="清除缓存" /></p>
  </div> 
  
  
  <!--<p class="cachetitle">数据缓存删除</p> -->
</div> 
 <{include file="admin/footer.tpl"}> 