<?php $this->page->load_tmp('header_tmp', null); ?>

<!-- ตัวแปร useScript ต้องใส่ทุกครั้ง สำหรับเรียก JS ของหน้า Page นั้นๆ -->
<script> var useScript = "chanal"; </script>

<style>
  html{
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#45484d+0,000000+100;Black+3D+%231 */
    background: rgb(128,0,0); /* Old browsers */
    background: -moz-linear-gradient(top, rgba(128,0,0,1) 0%, rgba(76, 13, 13,1) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgba(128,0,0,1) 0%, rgba(76, 13, 13,1) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgba(128,0,0,1) 0%, rgba(76, 13, 13,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#45484d', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
    min-height:100%;
  }
  body{background-color:transparent !important;background-image: url(http://www.kan-eng.com/live/test-bg-4.png);}
  .main-contant{
    width:100%;
    max-width:1000px;
    min-width:1000px;
    margin:auto;
    padding-top:100px;
  }
  a.box-img-chanal{ color:#fff;line-height:24px;vertical-align:top; }
  #main-vdo{
    width:100%;
    max-width:640px;
    padding:0px 10px;
    position:relative;
    float:left;
  }
  #paste-vdo{ position:relative; }
  #paste-vdo h3{
    font-size:24px;
    line-height:30px;
    margin:0px;
  }
  #paste-order-chanal{
    padding-top:30px;
  }
  .box-img-chanal{
    display:inline-block;
    verticle-align:top;
    width:23%;
    position:relative;
    margin-right:8px;
    padding-bottom:16px;
  }
  object{max-width:100% !important;border:3px solid #ba0;}

  /* chat */
  #main-chat{
      background-color:#fff;
      padding:8px;
      border:1px solid #ba0;
      width:350px;
      height:500px;
      position:relative;
      float:right;
      color:#000;
    }
    #main-chat li{
      width:100px;
    }
    #chat-input{
      width:100%;
      position:absolute;
      bottom:8px;
    }
    #chat-input input{
      width:265px;
      padding:6px;
      margin-right:6px;
      position:relative;
      top:1px;
      border:1px solid #aaa;
      border-radius:3px;
    }
    #chat-input button{
      width:60px;
    }
    #main-chat .textarea{
      resize:none;
      margin-top:8px;
      width:100%;
      height:387px;
      border:1px solid #ddd;
      border-radius:2px;
      padding:4px;
      color:#888;
      overflow-x:hidden;
      overflow-y:auto;
      cursor:default;
    }
</style>

<script src="https://www.kan-eng.com/live/js/socket.io.js"></script>
<script>
  var socket = io('http://139.162.33.12:2178/',{
      reconnection: false
  });
  var my_chanal = "Sport<?php echo $chanal_data['chanal_id']; ?>";
    socket.on("connect",function(){
      var elms = document.querySelectorAll(".textarea");
      elms[0].innerHTML = "<div style='color:green;'>☻ This online.</div>";
      elms[1].innerHTML = "<div style='color:green;'>☻ This online.</div>";
      socket.on("msg", acceptMSG);
      init_chanal();
    });
    socket.on("disconnect",function(){
      var elms = document.querySelectorAll(".textarea");
      elms[0].innerHTML = "<div style='color:red;'>☻ This offline.</div>";
      elms[1].innerHTML = "<div style='color:red;'>☻ This offline.</div>";
    });
  function init_chanal(){
    if(my_chanal==="Sport"){
      document.querySelector("#tab-li-ch").style.display = "none";
      document.querySelector("#chat-chnal").style.display = "none";
      document.querySelector("#tab-li-ch").className = "";
      document.querySelector("#chat-chnal").className = "tab-pane";
      document.querySelector("#tab-li-all").className = "active";
      document.querySelector("#chat-all").className = "tab-pane active";
    }
    else{
      socket.emit("joinChanal", my_chanal);
    }
  }
  function acceptMSG(data){
    if(data.chanal===my_chanal){
      var elms = document.querySelectorAll(".textarea");
      elms[0].innerHTML += "<div>"+data.data.msg+"</div>";
      addBadge(document.querySelector("#tab-li-ch"));
      elms[0].scrollTop = elms[0].scrollHeight;
    }
    else if(data.chanal==="all"){
      var elms = document.querySelectorAll(".textarea");
      elms[1].innerHTML += "<div>"+data.data.msg+"</div>";
      addBadge(document.querySelector("#tab-li-all"));
      elms[1].scrollTop = elms[1].scrollHeight;
    }
    else{
      console.log("Error Chanal.");
    }
  }
  function sendMSG(){
    var msg = document.querySelector("#chat-ip-elm").value;
    document.querySelector("#chat-ip-elm").value = "";
    if(msg===""||msg===" "){ return; }
    var sChanal = document.querySelector("#main-chat li.active").dataset.chanal;
    socket.emit("msg",{chanal:sChanal, msg:msg});
  }
  function addBadge(mainElms){
    if(mainElms.className==="active"){ return; }
    var sum = parseInt(mainElms.querySelector(".badge").innerHTML) + 1;
    mainElms.querySelector(".badge").innerHTML = (sum>99) ? "99+" : sum;
    mainElms.querySelector(".badge").style.display = "inline";
  }
  function clearBadge(mainElms){
    mainElms.querySelector(".badge").style.display = "none";
    mainElms.querySelector(".badge").innerHTML = "0";
  }
</script>



<div class="main-contant">
  <div id="main-vdo">
    <div id="paste-vdo"><img style="width:100%;" src="<?php echo base_url().'fixed-ratio-vdo.png'; ?>"></div>
    <div style="padding-top:10px;"><button onclick="window.location.reload();" type="button" class="btn btn-success">Refresh</button> ดูไม่ได้กดปุ่มนี้</div>

    <div id="paste-order-chanal">

      <div>
      <?php foreach($all_chanal_data as $the_chanal): ?>
        <?php if($the_chanal['chanal_status']==='enable'): ?>
          <a class="box-img-chanal" href="<?php echo base_url() ?>channel/<?php echo $the_chanal['chanal_id']; ?>/">
            <img src="<?php echo ($the_chanal['image']) ? $the_chanal['image']:base_url().'match_image/kan-eng-tv.png'; ?>" style="max-width:100%;"><br>
            <?php echo ($the_chanal['live']==='true') ? '<span style="color:yellow;">(สด)</span> ':''; ?>
            <?php echo $the_chanal['chanal_name']; ?>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
      </div>

      <h3 style="margin-top:70px;padding-bottom:30px;text-decoration:underline;font-size:24px!important;">รายการอื่นๆ</h3>
      <?php foreach($all_link as $the_link): ?>
        <?php if($the_link['status']!=='remove'): ?>
          <a class="box-img-chanal" href="<?php echo base_url() ?>video/<?php echo $the_link['id']; ?>/">
            <img src="<?php echo $the_link['image']; ?>" style="max-width:100%;"><br>
            <?php echo $the_link['name']; ?>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>

      <h3 style="margin-top:70px;padding-bottom:30px;text-decoration:underline;font-size:24px!important;">หนังเด็ดหนังดัง</h3>
      <?php foreach($all_movie_link as $the_link): ?>
        <?php if($the_link['status']!=='remove'): ?>
          <a class="box-img-chanal" href="<?php echo base_url() ?>movie/<?php echo $the_link['id']; ?>/">
            <img src="<?php echo $the_link['image']; ?>" style="max-width:100%;"><br>
            <?php echo $the_link['name']; ?>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>

    </div>
  </div>

  <!-- paste chat -->
  <div id="main-chat">
    <ul class="nav nav-tabs" role="tablist">
      <li id="tab-li-ch" onclick="clearBadge(this);" role="presentation" class="active" data-chanal="Sport<?php echo $chanal_data['chanal_id']; ?>"><a href="#chat-chnal" aria-controls="chat-chnal" role="tab" data-toggle="tab">Sport<?php echo $chanal_data['chanal_id']; ?> <span class="badge" style="display:none;color:#fff;background-color:red;">0</span></a></li>
      <li id="tab-li-all" onclick="clearBadge(this);" role="presentation" class="" data-chanal="all"><a href="#chat-all" aria-controls="chat-all" role="tab" data-toggle="tab">All <span class="badge" style="display:none;color:#fff;background-color:red;">0</span></a></li>
    </ul>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="chat-chnal">
        <div class="textarea" unselectable="on" onselectstart="return false;" onmousedown="return false;"><div style='color:red;'>☻ This offline.</div></div>
      </div>
      <div role="tabpanel" class="tab-pane" id="chat-all">
        <div class="textarea" unselectable="on" onselectstart="return false;" onmousedown="return false;"><div style='color:red;'>☻ This offline.</div></div>
      </div>
    </div>
    <div id="chat-input">
      <input id="chat-ip-elm" type="text"><button type="button" class="btn btn-info" onclick="sendMSG();">ส่ง</button>
    </div>
  </div>

  <!-- facebook -->
  <div style="left: 10px;top: 20px;position: relative;z-index:-1;">  <div class="fb-page" data-href="https://www.facebook.com/kaneng168/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kaneng168/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kaneng168/">เสร่อ Kan-Eng.CoM</a></blockquote></div>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script></div><!-- facebook -->

  <div class="clearfix"></div>

</div>

<script type="text/javascript" src="https://yandex.st/swfobject/2.2/swfobject.min.js"></script>
<script src="//content.jwplatform.com/libraries/boaV57Mb.js"></script>
<script>jwplayer.key="+VedR1JDxbkxu5qZLPq+MA4aNPcucdgBuRrqag==";</script>

<?php //echo var_dump($chanal_data); ?>

<script>

function ready_page(){
  <?php if($chanal_data!==null): ?>
    new ObjPlayerss({
      name: '<?php echo ($chanal_data['live']==='true') ? '<span style="color:yellow;">(สด)</span> ':''; echo $chanal_data['name']; ?>',
      link: '<?php echo $chanal_data['link']; ?>',
      ratio: 16/9,
      width: document.querySelector("#paste-vdo").offsetWidth,
      number: 1,
      live: <?php echo ($chanal_data['live']===null) ? 'false':$chanal_data['live']; ?>,
      timestamp: '<?php $dt = new DateTime($chanal_data['datetime']); echo $dt->getTimestamp(); ?>'
    });
  <?php else: ?>
    new ObjPlayerss({
      name: 'กดเลือกช่องด้านล่าง',
      link: 'welcome',
      ratio: 16/9,
      width: document.querySelector("#paste-vdo").offsetWidth,
      number: 1,
      live: false,
      timestamp: ''
    });
  <?php endif; ?>
}

</script>


<?php $this->page->load_tmp('footer_tmp', null); ?>