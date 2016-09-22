<!-- ตัวแปร useScript ต้องใส่ทุกครั้ง สำหรับเรียก JS ของหน้า Page นั้นๆ -->
<script> var useScript = "chanal"; </script>

<style>
  html{
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#45484d+0,000000+100;Black+3D+%231 */
    background: rgb(19,22,27); /* Old browsers */
    background: -moz-linear-gradient(top, rgba(19,22,27,1) 0%, rgba(0,0,0,1) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgba(19,22,27,1) 0%, rgba(0,0,0,1) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgba(19,22,27,1) 0%, rgba(0,0,0,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
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
  #main-vdo{
    width:100%;
    max-width:640px;
    padding:0px 10px;
    margin:auto;
  }
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
</style>

<div class="main-contant">
  <div id="main-vdo">
    <div id="paste-vdo"><img style="width:100%;" src="<?php echo base_url().'fixed-ratio-vdo.png'; ?>"></div>
    <div id="paste-order-chanal">

      <?php foreach($all_chanal_data as $the_chanal): ?>
        <?php if($the_chanal['chanal_status']==='enable'): ?>
          <a class="box-img-chanal csLoad" href="<?php echo base_url() ?>chanal/<?php echo $the_chanal['chanal_id']; ?>/">
            <img src="<?php echo $the_chanal['image']; ?>" style="max-width:100%;"><br>
            <?php echo ($the_chanal['live']==='true') ? '<span style="color:yellow;">(สด)</span> ':''; ?>
            <?php echo $the_chanal['chanal_name']; ?>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>

      <?php foreach($all_link as $the_link): ?>
        <?php if($the_link['status']!=='remove'): ?>
          <a class="box-img-chanal csLoad" href="<?php echo base_url() ?>video/<?php echo $the_link['id']; ?>/">
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

<script>

function ready_page(){
  <?php if($chanal_data!==null): ?>
    new ObjPlayerss({
      name: '<?php echo ($chanal_data['live']==='true') ? '<span style="color:yellow;">(สด)</span> ':''; echo $chanal_data['name']; ?>',
      link: '<?php echo $chanal_data['link']; ?>',
      ratio: 16/9,
      width: document.querySelector("#paste-vdo").offsetWidth,
      number: 1,
      live: <?php echo $chanal_data['live']; ?>,
      datetime: '<?php echo $chanal_data['datetime']; ?>'
    });
  <?php else: ?>
    new ObjPlayerss({
      name: '',
      link: 'welcome',
      ratio: 16/9,
      width: document.querySelector("#paste-vdo").offsetWidth,
      number: 1,
      live: false,
      datetime: ''
    });
  <?php endif; ?>
}

</script>