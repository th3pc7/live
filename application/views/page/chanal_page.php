<?php $this->page->load_tmp('header_tmp', null); ?>

<!-- ตัวแปร useScript ต้องใส่ทุกครั้ง สำหรับเรียก JS ของหน้า Page นั้นๆ -->
<script> var useScript = false; </script>

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
    margin:auto;
    padding-top:30px;
    overflow:hidden;
  }
  a.box-img-chanal{ color:#fff;line-height:24px;vertical-align:top; }
  
  #fix-width-vdo{
    width:100%;
    max-width:620px;
    float:left;
  }
  #fix-chat{
    float:right;
  }

  #main-vdo{
    width:100%;
    max-width:640px;
    padding-right:10px;
    position:relative;
    float:left;
  }
  #paste-vdo{ position:relative; }
  #paste-vdo h3{
    font-size:24px;
    line-height:30px;
    margin:0px;
  }
  #vdo-names{
    position: absolute;
    top: 77%;
    width: 100%;
    text-align: center;
    font-size:35px!important;
    text-shadow:0px 0px 10px rgba(50,0,0,1);
  }
  .h3-under{padding-bottom:10px;}
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

  #container-right{
    float:right;
    width:350px;
  }

  .jw-skin-seven{margin-bottom:10px;}

  @media screen and (max-width: 1022px){
    #fix-width-vdo,#fix-chat,#main-chat{float:none;margin:auto;}
    #main-top{width:620px;margin:auto;}
    #main-chat{width:100%!important;}
    #chat-input input{width:536px!important;}
    #main-vdo{float:none;width:620px;margin:auto;padding:0px!important;}
    #container-right{float:none;width:620px;margin:auto;padding:0px!important;}
    #fb-comment-fix{width:350px;}
    .h3-under{position:relative;display:inline-block;padding-right:16px;top:3px;padding-bottom:0px;}
  }
  @media screen and (max-width: 670px){
    #main-top{width:100%;margin:0px;padding:0px 10px;}
    #chat-input input{width:80%!important;}
    #chat-input button{width:10%!important;}
    #main-vdo{float:none;width:100%;margin:0px;padding:0px 10px!important;}
    #container-right{padding:0px 10px!important;}
    .h3-under{font-size:18px!important;;position:relative;display:inline-block;padding-right:16px;top:3px;padding-bottom:0px;}
  }
  @media screen and (max-width: 580px){
    .box-img-chanal{width:30%;}
  }
  @media screen and (max-width: 540px){
    #vdo-names{top:69%;font-size:30px!important;}
  }
  @media screen and (max-width: 444px){
    #vdo-names{top:52%;font-size:20px!important;}
  }
  @media screen and (max-width: 385px){
    #container-right{display:none;}
  }
  @media screen and (max-width: 350px){
    .box-img-chanal{width:44%;}
  }


</style>



<div class="main-contant">
  <script type="text/javascript" src="https://yandex.st/swfobject/2.2/swfobject.min.js"></script>
  <script src="//content.jwplatform.com/libraries/boaV57Mb.js"></script>
  <script>jwplayer.key="+VedR1JDxbkxu5qZLPq+MA4aNPcucdgBuRrqag==";</script>
  <script>
    function ready_page_2(){
      <?php if($chanal_data!==null): ?>
        var pl = new ObjPlayerss({
          name: '<?php echo ($chanal_data['live']==='true') ? '<span style="color:yellow;">(สด)</span> ':''; echo $chanal_data['name']; ?>',
          link: '<?php echo $chanal_data['link']; ?>',
          ratio: 16/9,
          width: document.querySelector("#paste-vdo").offsetWidth,
          number: 1,
          live: <?php echo ($chanal_data['live']===null) ? 'false':$chanal_data['live']; ?>,
          timestamp: '<?php $dt = new DateTime($chanal_data['datetime']); echo $dt->getTimestamp(); ?>'
        });
      <?php else: ?>
        var pl = new ObjPlayerss({
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

  <div id="main-top">
    <div id="fix-width-vdo">
      <!-- paste chat -->
      <?php $this->page->load_tmp("vdo_tmp",null); ?>
    </div>

    <!-- paste chat --> 
    <div id="fix-chat"><?php $this->page->load_tmp('chat_tmp',null); ?></div>
  </div>
  <div class="clearfix"></div>

  <div id="main-vdo">

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

  <div id="container-right">

    <!-- facebook -->
    <div style="top:20px;position:relative;z-index:0;">  <div class="fb-page" data-href="https://www.facebook.com/kaneng168/" data-width="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kaneng168/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kaneng168/">เสร่อ Kan-Eng.CoM</a></blockquote></div>
    <div id="fb-comment-fix" style="background-color:#f6f7f9;position:relative;"><div class="fb-comments" data-order-by="reverse_time" data-href="https://www.kan-eng.com" data-width="350" data-numposts="3"></div></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.7&appId=304646339905005";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script></div><!-- facebook -->
  </div>

  <div class="clearfix"></div>

</div>


<?php $this->page->load_tmp('footer_tmp', null); ?>