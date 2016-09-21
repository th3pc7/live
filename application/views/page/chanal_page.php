<!-- ตัวแปร useScript ต้องใส่ทุกครั้ง สำหรับเรียก JS ของหน้า Page นั้นๆ -->
<script> var useScript = false; </script>

<?php

  // หน้าเพจสามารถ echo ตัวแปรที่อยู่ใน $page_data จาก Controler ได้เลย //
  // ตัวอย่าง echo $test;

  // คำสั่งสำหรับ เรียกใช้ tmp และต้องใส่ $page_data ด้วยทุกครั้ง //
  // ตัวอย่าง $this->page->load_tmp('login_tmp', $page_data);

?>

<style>
  .main-contant{
    width:100%;
    max-width:1200px;
    margin:auto;
    background-color:#aaa;
  }
  #main-vdo{
    width:100%;
    max-width:640px;
    margin:auto;
    background-color:red;
  }
</style>

<div class="main-contant">
  <div id="main-vdo">
    <div id="paste-vdo"><img style="width:100%;" src="<?php echo base_url().'fixed-ratio-vdo.png'; ?>"></div>
    <div id="paste-order-chanal">
      <?php foreach($all_chanal_data as $the_chanal): break; ?>
        <?php if($the_chanal['chanal_status']==='enable'): ?>
          <img src="<?php echo $the_chanal['image']; ?>">
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>