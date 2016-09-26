<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div style="margin:auto;max-width:1000px;">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://www.kan-eng.com/">Kan-eng.com</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="<?php echo base_url(); ?>">Live</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">จัดการ <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url(); ?>admin/">ถ่ายทอดสด</a></li>
          <li><a href="<?php echo base_url(); ?>admin/movie/">รายการหนัง</a></li>
        </ul>
      </li>
      <!-- <li><a href="http://livescore.kan-eng.com/">ผลบอลสด</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- <li><a href="https://www.kan-eng.com/สมัครสมาชิก/"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="<?php echo base_url(); ?>logout/"><span class="glyphicon glyphicon-log-out"></span> Loout</a></li>
    </ul>
    </div>
  </div>
</nav>