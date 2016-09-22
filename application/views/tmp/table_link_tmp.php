<div style="padding:40px;">
  <table class="table table-bordered" style="max-width:900px;">
    <thead>
      <tr>
        <td style="width:150px;"><b>ID</b></td>
        <td style="width:200px;"><b>ชื่อคู่</b></td>
        <td style="width:400px;"><b>ลิ้งสตรีม</b></td>
        <td style="width:150px;"><b>วันเวลา</b></td>
      </tr>
    </thead>
    <tbody>
      <?php if(count($links_data)===0): ?>
      <tr><td colspan=4 style="color:red;">ไม่มีสตรีม...ในขณะนี้</td></tr>
      <?php endif; ?>
      <?php foreach($links_data as $link): ?>
      <tr style="color:<?php echo ($link['status']==='active') ? '#4eec00':'red'; ?>;">
        <td>
          <a href="#" title="เปิดใช้งาน" class="glyphicon glyphicon-ok" onclick="edit_st(event, <?php echo $link['id'] ?>, 'active')"></a> 
          <a href="#" title="ปิดใช้งาน" class="glyphicon glyphicon-remove" onclick="edit_st(event, <?php echo $link['id'] ?>, 'remove')"></a><br>
          <?php echo $link['id'] ?>
        </td>
        <td>
          <a href="#" title="แก้ไขชื่อ" class="glyphicon glyphicon-edit" onclick="edit(event, <?php echo $link['id'] ?>, 'name', '<?php echo $link['name'] ?>')"></a><br>
          <?php echo $link['name'] ?>
        </td>
        <td>
          <a title="แก้ไขลิ้ง" href="#" class="glyphicon glyphicon-edit" onclick="edit(event, <?php echo $link['id'] ?>, 'link', '<?php echo $link['link'] ?>')"></a><br>
          <?php echo $link['link'] ?>
        </td>
        <td><?php echo $link['create_datetime'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
