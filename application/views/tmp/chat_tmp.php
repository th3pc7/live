<style>
    #main-chat{
      background-color:#fff;
      padding:8px;
      border:1px solid #ba0;
      width:350px;
      height:350px;
      position:relative;
      color:#000;
    }
    #main-chat li{
      width:115px;
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
      height:239px;
      border:1px solid #ddd;
      border-radius:2px;
      padding:4px;
      color:#545454;
      overflow-x:hidden;
      overflow-y:auto;
      cursor:default;
    }
    .textarea img{
      display: block;
    }
    .box_msg{
      border-top:1px solid #eee;
      padding-top:2px;
      padding-bottom:6px;
    }
    .box_msg .pn{
      font-weight:bold;
    }
    .box_msg .pn.user{
      line-height:16px;
    }
    .box_msg .smsg{
      line-height:14px;
      font-size:12px;
    }
    .smsg a{
      text-decoration: underline;
    }
    .box_msg .st{
      color:#888;
      font-size:9px;
    }
    .box_msg .imgg{
      float: left;
      margin-right: 8px;
      width: 29px;
    }
    #ask-login{
      position:absolute;
      z-index:10;
      width:97.5%;
      background-color:#fff;
      height:100%;
      line-height:23px;
    }
    .canselect{
      cursor:text;
    }
    .textBan{
      color:#ffa0a0;
      display:inline;
      text-decoration: line-through;
    }
</style>

<div id="main-chat">
  <ul class="nav nav-tabs" role="tablist">
    <li id="tab-li-all" onclick="clearBadge(this);" role="presentation" class="active" data-chanal="all"><a href="#chat-all" aria-controls="chat-all" role="tab" data-toggle="tab">All <span class="badge" style="display:none;color:#fff;background-color:red;">0</span></a></li>
    <li id="tab-li-ch" onclick="clearBadge(this);" role="presentation" class="" data-chanal="Sport<?php echo $chanal_data['chanal_id']; ?>"><a href="#chat-chnal" aria-controls="chat-chnal" role="tab" data-toggle="tab">Sport<?php echo $chanal_data['chanal_id']; ?> <span class="badge" style="display:none;color:#fff;background-color:red;">0</span></a></li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="chat-all">
      <div class="textarea"><div style='color:red;'>☻ This offline.</div></div>
    </div>
    <div role="tabpanel" class="tab-pane" id="chat-chnal">
      <div class="textarea"><div style='color:red;'>☻ This offline.</div></div>
    </div>
  </div>
  <div id="chat-input">
    <div id="ask-login">
      Login to Chat &nbsp;<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
    </div>
    <input id="chat-ip-elm" type="text" onkeyup="checkEnter(event);" placeholder="ยาวสุด 160 ตัวอักษร"><button type="button" class="btn btn-info" onclick="sendMSG();">ส่ง</button>
  </div>
</div>



<script src="https://www.kan-eng.com/live/js/socket.io.js"></script>
<script>
  var socket = io('http://139.162.33.12:3269/',{
      reconnection: true,
      transports: [
        'websocket',
        'polling'
      ]
  });
  var my_chanal = "Sport<?php echo $chanal_data['chanal_id']; ?>";
  var namesUS = "unknow";
  var imgUrl = "#";
  socket.on("connect",function(){
    var elms = document.querySelectorAll(".textarea");
    elms[0].innerHTML = "<div style='color:green;'>☻ This online.</div>";
    elms[1].innerHTML = "<div style='color:green;'>☻ This online.</div>";
    init_chanal();
    logined();
  });
  socket.on("disconnect",function(){
    var elms = document.querySelectorAll(".textarea");
    elms[0].innerHTML = "<div style='color:red;'>☻ This offline.</div>";
    elms[1].innerHTML = "<div style='color:red;'>☻ This offline.</div>";
  });

  socket.on("msg", acceptMSG);
  socket.on("kick_ass", kick);
  socket.on("reff", reff);
  socket.on("toChannel", toChannel);

  function toChannel(data){
    if(data.alert !== false){ alert(data.alert); }
    window.location.href = data.url;
  }
  function reff(data){
    if(data.alert !== false){ alert(data.alert); }
    window.location.reload();
  }
  function init_chanal(){
    clearOldCookie();
    <?php if($this->account->class!=='admin'): ?>
      socket.emit("joinChanal", "all");
    <?php endif; ?>
    if(my_chanal==="Sport"){
      document.querySelector("#tab-li-ch").style.display = "none";
      document.querySelector("#chat-chnal").style.display = "none";
      document.querySelector("#tab-li-ch").className = "";
      document.querySelector("#chat-chnal").className = "tab-pane";
      document.querySelector("#tab-li-all").className = "active";
      document.querySelector("#chat-all").className = "tab-pane active";
    }
    else{
      <?php if($this->account->class!=='admin'): ?>
        socket.emit("joinChanal", my_chanal);
      <?php endif; ?>
    }
    <?php if($this->account->class==='admin'): ?>
      socket.emit("joinChanal", "zPadidaSz," + my_chanal);
    <?php endif; ?>
  }
  function acceptMSG_cach(data){
    while(data.length>0){
      acceptMSG(data.shift());
    }
  }
  function acceptMSG(data){
    console.log(data);
    if(Array.isArray(data)){
      acceptMSG_cach(data);
      return;
    }
    if(data.chanal===my_chanal){
      var elms = document.querySelectorAll(".textarea");
      pasteDataMSG(elms[1],data);
      addBadge(document.querySelector("#tab-li-ch"));
    }
    else if(data.chanal==="all"){
      var elms = document.querySelectorAll(".textarea");
      pasteDataMSG(elms[0],data);
      addBadge(document.querySelector("#tab-li-all"));
    }
    else{
      console.log("Error Chanal.");
    }
    update_scroll();
  }
  function pasteDataMSG(elm, data){
    if(data.data.ascap){
      data.data.msg = replaceText(escapeHtml(data.data.msg));
      data.data.img = escapeHtml(data.data.img);
      data.data.name = escapeHtml(data.data.name);
      data.data.in = escapeHtml(data.data.in);
    }
    if(isNaN(data.data.time)===true){ return; }
    else{
      var d = new Date(data.data.time);
      var hours = d.getHours();
      var minutes = "0" + d.getMinutes();
      var seconds = "0" + d.getSeconds();
      data.data.time = hours+':'+minutes.substr(-2)+':'+seconds.substr(-2);
    }
    if(typeof data.fbID !== "undefined" && data.data.ascap){
      data.data.name = '<a class="lis-name-user" data-href="https://www.facebook.com/'+data.fbID+'/" target="_blank" href="#">'+data.data.name+'</a>';
    }
    if(data.data.ascap){
      elm.innerHTML += "<div class=\"box_msg\"><img class=\"imgg\" src=\""+data.data.img+"\"><div class=\"pn user\">"+data.data.name+" <span class=\"st\">"+data.data.time+"</span><div class=\"st\"> กำลังดู "+data.data.in+"</div></div><div class=\"smsg\" unselectable=\"on\" onselectstart=\"return false;\" onmousedown=\"return false;\"> "+data.data.msg+"</div></div>";
    }else{
      elm.innerHTML += "<div class=\"box_msg\"><div class=\"pn\">"+data.data.name+" <span class=\"st\">"+data.data.time+"</span><div class=\"st\"> กำลังดู "+data.data.in+"</div></div><div class=\"smsg canselect\"> "+data.data.msg+"</div></div>";
    }
  }
  function sendMSG(){
    var msg = document.querySelector("#chat-ip-elm").value;
    document.querySelector("#chat-ip-elm").value = "";
    if(msg===""||msg===" "){ return; }
    var sChanal = document.querySelector("#main-chat li.active").dataset.chanal;
    socket.emit("msg",{
      chanal:sChanal,
      name:namesUS.split(" ")[0],
      msg:msg,
      img:imgUrl,
      inChanal:(my_chanal==="Sport")? document.title:"("+my_chanal+") "+document.title.split(" | ")[0],
      timeStamp:new Date().getTime()
    });
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
    update_scroll();
  }
  function update_scroll(){
    var elms = document.querySelectorAll(".textarea");
    setTimeout(function(){
      elms[0].scrollTop = elms[0].scrollHeight;
      elms[1].scrollTop = elms[1].scrollHeight;
    },10);
  }
  function kick(data){
    alert("ท่านกำลังจะพบกับความบันเทิง");
    window.location.href = data;
  }
  function clearOldCookie(){
    if(getCookie("pp_user")!==""){
      document.cookie = "pp_user=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    }
  }
  function getCookie(cname){
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
  }
  function checkEnter(ev){
    if(ev.keyCode===13){ sendMSG(); }
  }
  function escapeHtml(text){
    return text
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
  }
  function replaceText(text){
    return text
        .replace(/เน็ตกาก/g, "<div class=\"textBan\">เน็ตไม่เร็ว</div>")
        .replace(/เนตกาก/g, "<div class=\"textBan\">เน็ตไม่เร็ว</div>")
        .replace(/อีดอก/g, "<div class=\"textBan\">ดีออก</div>")
        .replace(/มึงตาย/g, "<div class=\"textBan\">ของฉันตาย</div>")
        .replace(/ควย/g, "<div class=\"textBan\">รวย</div>")
        .replace(/สัส/g, "<div class=\"textBan\">สิ่งมีชีวิต</div>")
        .replace(/มึง/g, "<div class=\"textBan\">ท่าน</div>")
        .replace(/เลว/g, "<div class=\"textBan\">เป็นศรี</div>")
        .replace(/หี/g, "<div class=\"textBan\">ฮี</div>")
        .replace(/ไอ่/g, "<div class=\"textBan\">คุณชาย</div>")
        .replace(/ไอ้/g, "<div class=\"textBan\">คุณชาย</div>")
        .replace(/อี่/g, "<div class=\"textBan\">คุณหญิง</div>");
  }


  <?php /*   admin code   */ if($this->account->class==='admin'): ?>
    var adminId = <?php echo $this->account->id; ?>;
    sendMSG = function(){
      var msg = document.querySelector("#chat-ip-elm").value;
      document.querySelector("#chat-ip-elm").value = "";
      if(msg===""||msg===" "){ return; }
      var sChanal = document.querySelector("#main-chat li.active").dataset.chanal;
      socket.emit("msg",{
        chanal: sChanal,
        msg: msg,
        img: null,
        adm: adminId,
        timeStamp: new Date().getTime()
      });
    }
    logouted = function(){ }
    $(document).ready(function(){
      $("#ask-login").css({"display":"none"});
    });
    $(document).on("click",".lis-name-user",function(ev){
      ev.preventDefault();
      show_cmd_admin(ev);
      return false;
    });
    var cmd_to_id = 0;
    function show_cmd_admin(ev){
      console.log(ev);
      cmd_to_id = ev.target.dataset.href.split("/")[3];
      $("#div-cmd").css({display:"block",top:ev.clientY+"px",left:ev.pageX+"px"});
    }
    function goProfiles(){
      window.open("https://www.facebook.com/"+cmd_to_id+"/",'_blank');
    }
    function to_reff(){
      var alerts = getAlert("ข้อความบอก User");
      socket.emit("msg",{"adm":adminId, toID:cmd_to_id, cmd:"reff",data:{alert:alerts}});
    }
    function to_toChannel(){
      var alerts = getAlert("ข้อความบอก User");
      var url = getAlert("url ที่จะให้ไป", "http://www.kan-eng.com/live/channel/1/");
      if(url==false){ return; }
      socket.emit("msg",{"adm":adminId ,toID:cmd_to_id, cmd:"toChannel",data:{alert:alerts,url:url}});
    }

  <?php endif; ?>

  function getAlert(msg, defaults){
    if(typeof defaults == "undefined"){ var ret = prompt(msg); }
    else{ var ret = prompt(msg, defaults); }
    if(ret==null||ret==""){ return false; }
    else{ return ret; }
  }


  function statusChangeCallback(response){
    if(response.status==='connected'){ logined(); }
    else if(response.status === 'not_authorized'){ logouted(); }
    else{ logouted(); }
  }
  function checkLoginState(){
    FB.getLoginStatus(function(response){
      statusChangeCallback(response);
    });
  }
  window.fbAsyncInit = function() {
    FB.init({
      appId: '304646339905005',
      cookie: true,
      xfbml: true,
      version: 'v2.5'
    });
    FB.getLoginStatus(function(response){
      statusChangeCallback(response);
    });
  };
  function logined(){
    FB.api('/me?fields=name,picture', function(response){
      namesUS = response.name;
      imgUrl = response.picture.data.url;
      var fb_id = response.id;
      if(socket.connected){
        socket.emit("loginFB", fb_id);
        $("#ask-login").css({display:"none"});
        consoloe.log(fb_id);
      }
      else{
        var intv = setInterval(function(){
          if(socket.connected){
            socket.emit("loginFB", fb_id);
            $("#ask-login").css({display:"none"});
            clearInterval(intv);
          }
        },500);
        $("#ask-login").html("เชื่อมต่อแชท...");
      }
    });
  }
  function logouted(){
     $("#ask-login").css({display:"block"});
  }
</script>


<?php /*   admin code   */ if($this->account->class==='admin'): ?>
<style>
  #div-cmd > div:hover{
    cursor:pointer;
    background-color:yellow;
    color:#000;
  }
</style>
<div id="div-cmd" onclick="this.style.display='none'"; style="position:fixed;z-index:999;background-color:red;top:300;left:300px;padding:10px;display:none;">
  <div onclick="goProfiles();">ดูโปรไฟล์</div>
  <div onclick="to_toChannel();">ส่งไป URL</div>
  <div onclick="to_reff();">Refresh</div>
  <div>ปิด</div>
</div>
<?php endif; ?>