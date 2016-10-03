<!-- ตัวแปร useScript ต้องใส่ทุกครั้ง สำหรับเรียก JS ของหน้า Page นั้นๆ -->
<script> var useScript = "admin"; </script>

<?php

  // หน้าเพจสามารถ echo ตัวแปรที่อยู่ใน $page_data จาก Controler ได้เลย //
  // ตัวอย่าง echo $test;

  // คำสั่งสำหรับ เรียกใช้ tmp และต้องใส่ $page_data ด้วยทุกครั้ง //
  // ตัวอย่าง $this->page->load_tmp('login_tmp', $page_data);

?>

<?php $this->page->load_tmp('header_admin_tmp', null); ?>

<div style="float:left;">
  <?php $this->page->load_tmp('form_add_tmp', null); ?>
</div>
<div style="float:left;">
  <div><?php $this->page->load_tmp('add_soccer_tmp', null); ?></div>
  <div id="paste-table_2"><?php // $this->page->load_tmp('table_chanal_tmp', $page_data); ?></div>
  <div id="paste-table"><?php $this->page->load_tmp('table_link_tmp', $page_data); ?></div>
</div>
<div class="clearfix"></div>