<{foreach from=$xydd_all key=intk item=val}>
<{if $val.id>0}>
             <li>
              <div class="left">
               <img src="/statics/ffsm/xydd/images/light/<{$val.lantern_img}>" alt="" />
              </div>
              <div class="auto">
               <h5>
                <!-- react-text: 2851 -->
				<{$val.username}>
				
                <!-- /react-text -->
                <!-- react-text: 2852 -->：
                <!-- /react-text --></h5>
               <div class="hope-content">
                <p><{$val.yuanwang}></p>
               </div>
               <div class="other clear">
                <div class="wish-btn right wtqf_ck" data-id="<{$val.id}>">
                 为Ta祈福
                </div>
                <div class="count-desc auto">
                 <p>
                  <!-- react-text: 2859 -->已有
                  <!-- /react-text --><span id="id_<{$val.id}>"><{$val.qfdj}></span>
                  <!-- react-text: 2861 -->人为Ta祈福
                  <!-- /react-text --></p>
                </div>
               </div>
              </div></li>
			  <{/if}>
 <{/foreach}>