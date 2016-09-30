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
      color:#888;
      overflow-x:hidden;
      overflow-y:auto;
      cursor:default;
    }
    .textarea img{
      display: block;
      margin: auto;
      margin-bottom: 10px;
    }
</style>

<div id="main-chat">
  <ul class="nav nav-tabs" role="tablist">
    <li id="tab-li-all" onclick="clearBadge(this);" role="presentation" class="active" data-chanal="all"><a href="#chat-all" aria-controls="chat-all" role="tab" data-toggle="tab">All <span class="badge" style="display:none;color:#fff;background-color:red;">0</span></a></li>
    <li id="tab-li-ch" onclick="clearBadge(this);" role="presentation" class="" data-chanal="Sport<?php echo $chanal_data['chanal_id']; ?>"><a href="#chat-chnal" aria-controls="chat-chnal" role="tab" data-toggle="tab">Sport<?php echo $chanal_data['chanal_id']; ?> <span class="badge" style="display:none;color:#fff;background-color:red;">0</span></a></li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="chat-all">
      <div class="textarea" unselectable="on" onselectstart="return false;" onmousedown="return false;"><div style='color:red;'>☻ This offline.</div></div>
    </div>
    <div role="tabpanel" class="tab-pane" id="chat-chnal">
      <div class="textarea" unselectable="on" onselectstart="return false;" onmousedown="return false;"><div style='color:red;'>☻ This offline.</div></div>
    </div>
  </div>
  <div id="chat-input">
    <input id="chat-ip-elm" type="text"><button type="button" class="btn btn-info" onclick="sendMSG();">ส่ง</button>
  </div>
</div>



<script src="https://www.kan-eng.com/live/js/socket.io.js"></script>
<script>
  var socket = io('http://139.162.33.12:2999/',{
      reconnection: true,
      transports: [
        'websocket',
        'polling'
      ]
  });
  var my_chanal = "Sport<?php echo $chanal_data['chanal_id']; ?>";
    socket.on("connect",function(){
      var elms = document.querySelectorAll(".textarea");
      elms[0].innerHTML = "<div style='color:green;'>☻ This online.</div>";
      elms[1].innerHTML = "<div style='color:green;'>☻ This online.</div>";
      init_chanal();
    });
    socket.on("disconnect",function(){
      var elms = document.querySelectorAll(".textarea");
      elms[0].innerHTML = "<div style='color:red;'>☻ This offline.</div>";
      elms[1].innerHTML = "<div style='color:red;'>☻ This offline.</div>";
    });
    socket.on("msg", acceptMSG);
    socket.on("kick_ass", kick);
  function init_chanal(){
    getName();
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
  function acceptMSG_cach(data){
    while(data.length>0){
      acceptMSG(data.shift());
    }
  }
  function acceptMSG(data){
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
    elm.innerHTML += "<div>"+data.data.name+" : "+data.data.msg+"</div>";
  }
  function sendMSG(){
    var msg = document.querySelector("#chat-ip-elm").value;
    document.querySelector("#chat-ip-elm").value = "";
    if(msg===""||msg===" "){ return; }
    var sChanal = document.querySelector("#main-chat li.active").dataset.chanal;
    socket.emit("msg",{chanal:sChanal, name:getCookie("pp_user"), msg:msg});
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
  function getName(){
    if(getCookie("pp_user")===""){
      document.cookie = "pp_user="+getRandomName(8);
    }
  }
  function getRandomName(n){
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for( var i=0; i < n; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    return text;
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


  <?php /*   admin code   */ if($this->account->class==='admin'): ?>
    var adminId = <?php echo $this->account->id; ?>;
    sendMSG = function(){
      var msg = document.querySelector("#chat-ip-elm").value;
      document.querySelector("#chat-ip-elm").value = "";
      if(msg===""||msg===" "){ return; }
      var sChanal = document.querySelector("#main-chat li.active").dataset.chanal;
      socket.emit("msg",{chanal:sChanal, msg:msg, adm: adminId});
    }
  <?php endif; ?>
</script>