<form id="form_add_team" style="width:300px;background-color:#000;padding:40px;">
  <input name="action" type="text" value="add_team" class="hidden">
  <div class="form-group">
    <label for="exampleInputEmail1">ชื่อทีมฟุตบอล</label>
    <input name="team" type="text" class="form-control" id="exampleInputEmail1" placeholder="ชื่อทีมฟุตบอล" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input name="file" type="file" id="exampleInputFile">
    <p class="help-block">เลือก Logo ของทีม</p>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>


<script>
  function ref_tmp(){
    $("#form_adds_soccer").html("Loadding...");
    $.post("action/",{action:"ref_tmp_soccer"},function(data){
      $("#form_adds_soccer").html(data);
    }).fail(function(){
      $("#form_adds_soccer").html("ERROR...");
    });
  }
  $("#form_add_team").on("submit",function(ev){
    ev.preventDefault();
    var formData = new FormData($("#form_add_team")[0]);
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
        if(data==="pass"){ alert("สำเร็จ"); ref_tmp(); }
        else{ alert(data); }
      },
      error: function(){ alert("ล้มเหลว"); },
      data: formData,
      cache: false,
      contentType: false,
      processData: false
    });
  });
</script>