<div style="padding:40px;padding-bottom:0px;">
  <table class="table table-bordered" style="">
    <thead>
      <tr>
        <td style=""><b>วันเวลาถ่ายทอด</b></td>
        <td style=""><b>สถาณะ</b></td>
        <td style=""><b>ชื่อช่อง</b></td>
        <td style=""><b>Match ID</b></td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($chanal_data as $chanal): ?>
      <tr style="color:<?php echo ($chanal['chanal_status']==='disabled') ? 'red' : '#4eec00'; ?>;">
        <td>
          <a href="#" title="แก้ไขเวลา" class="glyphicon glyphicon-edit" onclick="edit_ch(event, <?php echo $chanal['chanal_id'] ?>, 'datetime', '<?php echo $chanal['datetime'] ?>')"></a>&nbsp;
          <a href="#" title="ถ่ายทอดสด" class="glyphicon glyphicon-facetime-video" onclick="edit_ch_st(event, <?php echo $chanal['chanal_id'] ?>, 'live', 'true')"></a>&nbsp;
          <a href="#" title="เทป" class="glyphicon glyphicon-cd" onclick="edit_ch_st(event, <?php echo $chanal['chanal_id'] ?>, 'live', 'false')"></a><br>
          <?php echo ($chanal['live']==='true') ? '<span style="color:yellow;">(สด)</span> '.$chanal['datetime'] : '----------'; ?>
          <?php if($chanal['live']==='true'&&$chanal['chanal_status']!=='disabled'){ $dt = new DateTime($chanal['datetime']); echo '<span class="countdown-ad" data-datetime="'.$dt->getTimestamp().'"></span>'; unset($dt); } ?>
        </td>
        <td>
          <a href="#" title="เปิดใช้งาน" class="glyphicon glyphicon-ok" onclick="edit_ch_st(event, <?php echo $chanal['chanal_id'] ?>, 'chanal_status', 'enable')"></a>&nbsp;
          <a href="#" title="ปิดใช้งาน" class="glyphicon glyphicon-remove" onclick="edit_ch_st(event, <?php echo $chanal['chanal_id'] ?>, 'chanal_status', 'disabled')"></a><br>
          <?php echo $chanal['chanal_status']; ?>
        </td>
        <td>
          <a href="#" title="แก้ไขชื่อช่อง" class="glyphicon glyphicon-edit" onclick="edit_ch(event, <?php echo $chanal['chanal_id'] ?>, 'chanal_name', '<?php echo $chanal['name'] ?>')"></a><br>
          <?php echo $chanal['chanal_name']; ?>
        </td>
        <td>
          <a href="#" title="แก้ไข ID" class="glyphicon glyphicon-edit" onclick="edit_ch(event, <?php echo $chanal['chanal_id'] ?>, 'match_id', '<?php echo $chanal['match_id'] ?>')"></a>&nbsp;
          <a href="#" title="ปิดใช้งาน" class="glyphicon glyphicon-remove" onclick="close_ch(event, <?php echo $chanal['chanal_id'] ?>)"></a><br>
          <?php echo ($chanal['match_id']==='0') ? 'ไม่มีรายการถ่ายทอดสด' : '# '.$chanal['id'].' - '.$chanal['name']; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<script>
  function second_to_format(s){
    var hour = (s-(s%3600))/3600;
    var sec = s - (hour*3600);
    var min = (sec-(sec%60))/60;
    sec = sec - (min*60);
    hour = (hour.toString().length == 2) ? hour.toString():"0"+hour.toString();
    min = (min.toString().length == 2) ? min.toString():"0"+min.toString();
    sec = (sec.toString().length == 2) ? sec.toString():"0"+sec.toString();
    return hour+":"+min+":"+sec;
  }
  var all_count = document.getElementsByClassName("countdown-ad");
  if(all_count.length>0){
    setInterval(function(){
      for(var i=0;i<all_count.length;i++){
        var elm = all_count[i];
        var sum = parseInt(elm.dataset.datetime) - parseInt(new Date().getTime()/1000);
        if(sum < 0){ continue; }
        else{
          var text_count = second_to_format(sum);
          elm.innerHTML = text_count;
        }
      }
    },1000);
  }
</script>

