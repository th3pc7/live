<!-- ตัวแปร useScript ต้องใส่ทุกครั้ง สำหรับเรียก JS ของหน้า Page นั้นๆ -->
<script> var useScript = false; </script>

<style>
  html{
    /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#45484d+0,000000+100;Black+3D+%231 */
    background: rgb(69,72,77); /* Old browsers */
    background: -moz-linear-gradient(top, rgba(39,42,47,1) 0%, rgba(0,0,0,1) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top, rgba(39,42,47,1) 0%, rgba(0,0,0,1) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom, rgba(39,42,47,1) 0%, rgba(0,0,0,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
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
window.mobilecheck = function(){
  var check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
}
function ObjDesktop(config){
  swfobject.embedSWF(
    "https://www.kan-eng.com/player.swf",
    "vdo_id_"+config.number,
    ""+config.width,
    ""+(config.width*(1/config.ratio)),
    "10.2",
    null,
    {
      src: escape(config.link),
      plugin_m3u8: "https://www.kan-eng.com/HLSDynamicPlugin.swf"
    },
    params,
    {
      name: "vdo_id_"+config.number
    }
  );
}
function ObjMobile(config){
  jwplayer("vdo_id_"+config.number).setup({
    file: config.link,
    width: ""+document.querySelector("#paste-vdo").offsetWidth,
    height: ""+(document.querySelector("#paste-vdo").offsetWidth*(1/config.ratio)),
    primary: 'html5',
    hlshtml: true,
    type: 'hls'
  });
  jwplayer().onDisplayClick(function() { jwplayer().setFullscreen(true); });
}
function ObjPlayerss(config){
  function init(){
    if(window.mobilecheck()===false){
      document.querySelector("#paste-vdo").innerHTML = '<div class="ms-boxx"><div id="vdo_id_'+config.number+'">Browser ของท่านไม่รองรับ Flash</div><h3>'+config.name+'</h3></div>';
      ObjDesktop(config);
    }
    else{
      document.querySelector("#paste-vdo").innerHTML = '<div class="ms-boxx"><div id="vdo_id_'+config.number+'">กำลังโหลด...</div><h3>'+config.name+'</h3></div>';
      ObjMobile(config);
    }
  }
  init();
}
var params = {
  wmode: "direct",
  allowFullScreen: true,
  allowScriptAccess: "always",
  bgcolor: "#000000"
};

<?php if($chanal_data!==null): ?>
  new ObjPlayerss({
    name: '<?php echo ($chanal_data['live']==='true') ? '<span style="color:yellow;">(สด)</span> ':''; echo $chanal_data['name']; ?>',
    link: '<?php echo $chanal_data['link']; ?>',
    ratio: 16/9,
    width: document.querySelector("#paste-vdo").offsetWidth,
    number: 1,
    datetime: '<?php echo $chanal_data['datetime']; ?>'
  });
<?php else: ?>
  new ObjPlayerss({
    name: '',
    link: 'welcome',
    ratio: 16/9,
    width: document.querySelector("#paste-vdo").offsetWidth,
    number: 1,
    datetime: ''
  });
<?php endif; ?>

</script>