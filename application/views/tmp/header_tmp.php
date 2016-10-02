<script>
  (function (i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function () {
              (i[r].q = i[r].q || []).push(arguments)
          }, i[r].l = 1 * new Date();
      a = s.createElement(o),
          m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

  ga('create', 'UA-72517948-1', 'auto');
  ga('send', 'pageview');
</script>


<nav class="navbar navbar-inverse">
  <!-- fix width --> 
  <div style="margin:auto;max-width:1050px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="https://www.kan-eng.com/">kan-eng.com</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url(); ?>">Live</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ตารางถ่ายทอด <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">team Vs team</a></li>
            <li><a href="#">team Vs team</a></li>
            <li><a href="#">team Vs team</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">team Vs team (สำรอง)</a></li>
            <li role="separator" class="divider"></li>
          </ul>
        </li>
        <li><a href="http://livescore.kan-eng.com/">ผลบอลสด</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="https://www.kan-eng.com/สมัครสมาชิก/"><span class="glyphicon glyphicon-user"></span> สมัครสมาชิก</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div><!-- /.for fix width -->
</nav>