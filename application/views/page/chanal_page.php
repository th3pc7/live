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
  body{background-color:transparent !important;}
  .main-contant{
    width:100%;
    max-width:1200px;
    margin:auto;
    padding-top:100px;
  }
  a.box-img-chanal{ color:#fff;line-height:24px; }
  #main-vdo{
    width:100%;
    max-width:640px;
    padding:0px 10px;
    margin:auto;
    position:relative;
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
  .banner-top{ text-align:center;padding:0px 10px;padding-bottom:30px; }
  .banner-top img{ max-width:100%; }
  .banner{ position:absolute; }
  .banner.border{ z-index:-1;left:0px; }
  .banner.border img{ width:110%;position:relative;left:-5%; }
  .banner.left{ right:105%; }
  .banner.right{ left:105%; }

  /* chat */
  #chat-pp{
    width:100%;
    position:relative;
    background-color:#fff;
    padding:10px;
    margin-top:20px;
  }
  #chat-pp input{
    width:85%;
    margin-right:5%;
    color:#000!important;
  }
  #chat-pp button{
    width:10%;
  }
  #show-chat-pp{
    width:100%;
    padding:10px;
    border:1px solid #aaa;
    margin-bottom:2px;
    height:200px;
    color:#000!important;
  }
  #head-chat-pp{
    width:100%;
    color:red!important;
    margin-bottom:8px;
    font-size:20px;
    cursor:pointer;
  }
  #head-chat-pp:hover{
    background-color:rgba(255,30,50,.2);
  }
  #head-chat-pp span{position:relative;top:3px;margin-right:3px;}
</style>

<script src="https://www.kan-eng.com/live/js/socket.io.js"></script>
<script>
  var cols = false;
  function toggless(){
    if(cols){ uncol(); }
    else{ col(); }
    cols = !cols;
  }
  function col(){
    document.getElementById("show-chat-pp").style.display = "none";
    document.getElementById("input-chat").style.display = "none";
  }
  function uncol(){
    document.getElementById("show-chat-pp").style.display = "block";
    document.getElementById("input-chat").style.display = "block";
  }
  var socket = io('https://139.162.33.12:3000/');
    socket.on("connect",function(){
      console.log("now connect to server");
      socket.on("msg",function(data){
        document.getElementById("show-chat-pp").innerHTML += "\n"+data;
        // $('#show-chat-pp').scrollTop($('#show-chat-pp')[0].scrollHeight);
        document.getElementById("show-chat-pp").scrollTop = 100000000;
      });
    });
    socket.on("disconnect",function(){
      console.log("now disconnect to server");
    });
    function sendder(){
      socket.emit("msg",document.getElementById("ppp").value);
      document.getElementById("ppp").value = "";
    }
</script>



<div class="main-contant">
  <!-- <div class="banner-top"><a href="https://www.kan-eng.com/สมัครสมาชิก/"><img src="<?php echo base_url() ?>/match_image/BannerStreamTop.gif"></a></div> -->
  <div id="main-vdo">
    <!-- <div class="banner border"><img src="<?php echo base_url() ?>/match_image/VDOFrame.png"></div> -->
    <div class="banner left"><a href="https://www.kan-eng.com/สมัครสมาชิก/"><img src="<?php echo base_url() ?>/match_image/BannerStreamLeft.gif"></a></div>
    <div class="banner right"><a href="https://www.kan-eng.com/สมัครสมาชิก/"><img src="<?php echo base_url() ?>/match_image/BannerStreamRight.gif"></a></div>
    <div id="paste-vdo"><img style="width:100%;" src="<?php echo base_url().'fixed-ratio-vdo.png'; ?>"></div>
    <div style="padding-top:10px;"><button onclick="window.location.reload();" type="button" class="btn btn-success">Refresh</button> ดูไม่ได้กดปุ่มนี้</div>

    <div id="chat-pp">
      <div id="head-chat-pp" onclick="toggless();"><span class="glyphicon glyphicon-comment"></span> Chat</div>
      <textarea id="show-chat-pp" readonly>ระบบล็อคอิน และอื่นๆกำลังจะมาในเร็วๆนี้</textarea>
      <div id="input-chat"><input id="ppp" type="text" placeholder="ใส่ข้อความที่นี่"><button type="button" class="btn btn-info" onclick="sendder();">ส่ง</button></div>
    </div>

    <div id="paste-order-chanal">

      <div>
      <?php foreach($all_chanal_data as $the_chanal): ?>
        <?php if($the_chanal['chanal_status']==='enable'): ?>
          <a class="box-img-chanal" href="<?php echo base_url() ?>chanal/<?php echo $the_chanal['chanal_id']; ?>/">
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

    </div>
  </div>
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