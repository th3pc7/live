<div style="padding:40px;">
  <table class="table table-bordered" style="width:900px;">
    <thead>
      <tr>
        <td>วันเวลา</td>
        <td>รายละเอียด</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($soccer_data as $soccer): ?>
      <tr>
        <td><?php echo $soccer['datetime']; ?></td>
        <td>
          <a title="แก้ไขลิ้ง" href="#" class="glyphicon glyphicon-remove"></a><br>
          <?php echo $soccer['team1'].'&nbsp; Vs &nbsp;'.$soccer['team2']; ?>
        </td>
      </tr>
      <tr>
        <?php if($soccer['link']==='nolink'): ?>
          <td colspan="2">ยังไม่มีลิ้งค์</td>
        <?php else: ?>
          <td colspan="2">มีลิ้งค์แล้ว</td>
        <?php endif; ?>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table><br>
  <form id="form_add_soccer">
    <input name="action" type="text" value="add_soccer" class="hidden">
    <input style="color:#000;" name="start_time" type="datetime-local" >&nbsp;&nbsp;&nbsp;&nbsp;
    <select style="color:#000;" name="home">
      <option style="color:#000;" value="false">--- กรุณาเลือกทีม ---</option>
      <?php foreach($team_data as $team): ?>
        <option style="color:#000;" value="<?php echo $team['name']; ?>"><?php echo $team['name']; ?></option>
      <?php endforeach; ?>
    </select>
    &nbsp;Vs&nbsp;
    <select style="color:#000;" name="away">
      <option style="color:#000;" value="false">--- กรุณาเลือกทีม ---</option>
      <?php foreach($team_data as $team): ?>
        <option style="color:#000;" value="<?php echo $team['name']; ?>"><?php echo $team['name']; ?></option>
      <?php endforeach; ?>
    </select>&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" class="btn btn-default">
  </form>
</div>


<script>
  $("#form_add_soccer").on("submit",function(ev){
    if(!confirm("ต้องการจะเพิ่มรายการสด ?")){ return false; }
    ev.preventDefault();
    var formData = new FormData($("#form_add_soccer")[0]);
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