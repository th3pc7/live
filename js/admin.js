MainProg.config.Page_modules["admin"] = new PageJS(MainProg, function(Main){
  // this function run first time on load this file success.
  Main.on("submit","#form_add_link",add_match);
},function(Main){
  // this function run on after open this page.
},function(Main){
  // this function run on befor close this page.
});



function add_match(ev) {
  ev.preventDefault();
  var formData = new FormData($("#form_add_link")[0]);
  $.ajax({
    url: "action/",
    type: "POST",
    xhr: function () {
      var myXhr = $.ajaxSettings.xhr();
      if (myXhr.upload) {
        myXhr.upload.addEventListener('progress', function(){ }, false);
      }
      return myXhr;
    },
    beforeSend: function(){ },
    success: function(data){
      if(data==="pass"){ alert("สำเร็จ"); ref_table(); }
      else{ alert(data); }
    },
    error: function(){ alert("ล้มเหลว"); },
    data: formData,
    cache: false,
    contentType: false,
    processData: false
  });
}

function edit(ev, id, types, defaults){
  ev.preventDefault();
  var value = prompt("ใส่ค่าใหม่ที่ต้องการ", defaults);
  if(value===defaults||value==='undefined'||value===null||value===''||$.trim(value)===''){ return; }
  $.post("action/",{ action: "edit", id: id, type: types, value: value },function(data){
    if(data==="pass"){
      alert("สำเร็จ");
      ref_table();
    }
    else{
      alert(data);
    }
  }).fail(function(){
    alert("เกิดข้อผิดพลาด !!!");
  });
}

function edit_st(ev, id, value){
  ev.preventDefault();
  $.post("action/",{ action: "edit_st", id: id, value: value },function(data){
    if(data==="pass"){
      alert("สำเร็จ");
      ref_table();
    }
    else{
      alert(data);
    }
  }).fail(function(){
    alert("เกิดข้อผิดพลาด !!!");
  });
}

function ref_table(){
  $.post("action/",{ action: "ref_table" },function(data){
    $("#paste-table").html(data);
    ref_table_2();
  }).fail(function(){ });
}
function ref_table_2(){
  $.post("action/",{ action: "ref_table_2" },function(data){
    $("#paste-table_2").html(data);
  }).fail(function(){ });
}

function edit_ch(ev, id, field, defaults){
  ev.preventDefault();
  var value = prompt("ใส่ค่าใหม่ที่ต้องการ", defaults);
  if(value===defaults||value==='undefined'||value===null||value===''||$.trim(value)===''){ return; }
  $.post("action/",{ action: "edit_ch", id: id, field: field, value: value },function(data){
    if(data==="pass"){
      alert("สำเร็จ");
      ref_table_2();
    }
    else{
      alert(data);
    }
  }).fail(function(){
    alert("เกิดข้อผิดพลาด !!!");
  });
}

function edit_ch_st(ev, id, field, value){
  ev.preventDefault();
  $.post("action/",{ action: "edit_ch_st", id: id, field: field, value: value },function(data){
    if(data==="pass"){
      alert("สำเร็จ");
      ref_table_2();
    }
    else{
      alert(data);
    }
  }).fail(function(){
    alert("เกิดข้อผิดพลาด !!!");
  });
}

function close_ch(ev, id){
  ev.preventDefault();
  $.post("action/",{ action: "edit_ch", id: id, field: 'match_id', value: null },function(data){
    if(data==="pass"){
      alert("สำเร็จ");
      ref_table_2();
    }
    else{
      alert(data);
    }
  }).fail(function(){
    alert("เกิดข้อผิดพลาด !!!");
  });
}