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
  #vdo-names{
    position: absolute;
    top: 56%;
    width: 100%;
    text-align: center;
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

  #container-right{
    float:right;
    width:350px;
  }

</style>



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

  <div id="container-right">
    <!-- paste chat -->
    <?php $this->page->load_tmp('chat_tmp',null); ?>

    <!-- facebook -->
    <div style="top:20px;position:relative;z-index:0;">  <div class="fb-page" data-href="https://www.facebook.com/kaneng168/" data-width="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kaneng168/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kaneng168/">เสร่อ Kan-Eng.CoM</a></blockquote></div>
    <div style="background-color:#f6f7f9;position:relative;"><div class="fb-comments" data-order-by="reverse_time" data-href="https://www.kan-eng.com" data-width="350" data-numposts="3"></div></div>
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


<script type="text/javascript" src="https://yandex.st/swfobject/2.2/swfobject.min.js"></script>
<script src="//content.jwplatform.com/libraries/boaV57Mb.js"></script>
<script>jwplayer.key="+VedR1JDxbkxu5qZLPq+MA4aNPcucdgBuRrqag==";</script>

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