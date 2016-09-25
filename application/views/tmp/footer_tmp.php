<style>

@font-face {
    font-family: 'pslxkittithada';
    src: url('https://www.kan-eng.com/live/font/ap.eot');
    src: url('https://www.kan-eng.com/live/font/ap.eot?#iefix') format('embedded-opentype'),
    url('https://www.kan-eng.com/live/font/ap.woff2') format('woff2'),
    url('https://www.kan-eng.com/live/font/ap.woff') format('woff'),
    url('https://www.kan-eng.com/live/font/ap.ttf') format('truetype'),
    url('https://www.kan-eng.com/live/font/ap.svg#pslxkittithadabold') format('svg');
    font-weight: normal;
    font-style: normal;
}

.pp-modif * {
    box-sizing: border-box;
    font-family: 'pslxkittithada' !important;
    -webkit-font-smoothing: antialiased;
}

.pp-modif b {
    font-weight: bold;
}

.clear {
    clear: both;
    width: 0px;
    height: 0px;
    opacity: 0;
}

.dsp {
    display: none;
}

.bodyPage {
    padding: 0px 8px;
    width: 100%;
    margin: auto;
    overflow: hidden;
}

#mask-top {
    height: 30px;
    background-color: #000;
}

#contact {
    position: fixed;
    width: 100%;
    height: 30px;
    line-height: 30px;
    z-index: 970;
    top: 0px;
    background-color: #CA0000;
    color: #fff;
    overflow: hidden;
    box-shadow: 0px -12px 8px -12px rgba(0, 0, 0, .8) inset;
}

#contact a {
    color: #fff;
    text-decoration: none;
}

#contact .imgH {
    vertical-align: middle;
    height: 26px;
    position: relative;
    top: -2px;
}

#topBar {
    width: 100%;
    height: 60px;
    color: #fff;
    position: fixed;
    z-index: 980;
    top: 30px;
    background-color: #000;
}

#logo {
    font-size: 28px;
    line-height: 50px;
}

#berger-menu {
    float: right;
}

#berger-menu > img {
    height: 30px;
    margin-top: 15px;
    border: 1px solid #eee;
    border-radius: 3px;
    padding: 0px 4px;
    cursor: pointer;
}

#nav-menu {
    display: none;
    float: right;
}

#nav-menu ul, #nav-menu li {
    display: inline;
    line-height: 60px;
}

#nav-menu li {
    margin-left: 16px;
}

#nav-menu a {
    color: #fff;
    text-decoration: none;
}

.zone {
    padding-top: 25px;
    padding-bottom: 25px;
    margin-bottom: 30px;
    background-color: #333;
    color: #fff;
}

.zone a {
    color: #fff;
    text-decoration: underline;
    font-weight: normal;
}

.zone.color {
    background-color: #fff;
    color: #000;
    text-shadow: none;
}

.zone.color {
    color: #a0a0a0;
}

.zone.color a {
    color: #666;
}

.zone[class~='color'] h2 {
    color: #666;
}

.zone[class~='color'] h3 {
    color: #666;
}

.pp-modif h2, #h1Index, #h1Index > b {
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 1.9rem !important;
}

.pp-modif h3 {
    font-size: 0rem;
    font-weight: bold;
    margin-top: 16px;
}

div.spec {
    display: inline-block;
    margin-left: 8px;
    margin-bottom: 8px;
}

#footer {
    background-color: #CA0000;
    bottom: 0px;
    box-shadow: 0px 12px 8px -12px rgba(0, 0, 0, .8) inset;
}

#footer > div {
    line-height: 25px;
    font-size: 14px !important;
    text-align: center;
    color: #fff;
    padding-top: 6px;
    padding-bottom: 6px;
    text-shadow: 0px 0px 2px #fff;
}

#present-p {
    background-position: 5% 20%;
    text-shadow: 0px 0px 12px #000;
    padding-top: 0px;
    padding-bottom: 0px;
}

#present-p h2, #present-p h3 {
    line-height: 2.6rem;
    margin-top: 20px;
}

#present-p p {
    line-height: 1.6rem;
    text-shadow: 0px 0px 7px #969595;
}

#present-p a {
    text-shadow: 0px 0px 7px #969595;
}

.zone h2, .zone h3, .zone li {
    line-height: 1.3rem;
}

.zone p, .zone li {
    line-height: 2.4rem;
}

.pasteOnSlide {
    position: absolute;
    width: 100%;
    z-index: 10;
    opacity: 0;
}

.bodyPage.bodyObjOnSlide {
    text-align: left;
    position: relative;
}

.bodyPage.bodyObjOnSlide * {
    position: relative;
    text-align: left !important;
    font-size: 14px !important;
    margin: 0px !important;
}

.group-list {
    position: relative;
}

.group-list .arrow {
    display: none;
    position: absolute;
    top: 75px;
    right: -5%;
    background-color: #ddd;
    border-radius: 9999px;
    width: 34px;
    height: 34px;
    line-height: 30px;
    color: #000;
    font-weight: bold;
}

.img-step-register {
    display: none;
}

#promotion-p h2, #promotion-p h3 {
    text-align: center;
    color: red;
    text-shadow: 0px 0px 10px #969494;
}

#promo-icon {
    width: 294px;
    display: block;
    margin: auto;
    margin-bottom: 20px;
}

#register-way div.wow {
    margin-top: 10px;
    left: 10px;
    position: relative;
}

#register-way img {
    height: 30px;
    vertical-align: middle;
    margin-right: 10px;
}

.all-nav {
    float: left;
    width: 100%;
    font-size: 24px !important;
    line-height: 40px;
    color: red;
    font-weight: bold;
    padding-right: 30px;
    text-shadow: 0px 0px 5px rgba(0, 0, 0, .3);
}

.menu-label {
    border-bottom: 2px dashed #fff;
    margin-top: 0px;
    margin-bottom: 4px;
    text-shadow: 0px 0px 5px rgba(222, 222, 222, .4);
}

.all-nav a {
    text-decoration: none !important;
    color: #fff;
    font-size: 14px !important;
}

#textFull-1 {
    display: none;
}

#aregis {
    display: none;
    color: #FFF;
    margin-right: 19px;
    text-decoration: none;
    font-size: 14px !important;
    background-color: #1B1B1B;
    padding: 2px 10px !important;
    border-radius: 999px;
    box-shadow: 0px 2px 0px #000, 0px 1px 0px rgba(200, 200, 200, .5) inset;
    top: -2px;
    font-weight: bold;
    position: relative;
}

#aagent, #aagent2 {
    display: none;
    color: #FFF;
    margin-right: 19px;
    text-decoration: none;
    font-size: 14px !important;
    background-color: #1B1B1B;
    padding: 2px 16px !important;
    padding-right: 10px !important;
    border-radius: 999px;
    box-shadow: 0px 2px 0px #000, 0px 1px 0px rgba(200, 200, 200, .5) inset;
    top: -2px;
    font-weight: bold;
    position: relative;
}

#aagent > img {
    position: absolute;
}

.recent {
    overflow-wrap: break-word;
    position: relative;
}

.recent-img {
    float: left;
    margin-right: 8px;
    margin-bottom: 28px;
}

.recent-img > a > img {
    width: 130px;
    background-color: #ddd;
    border: 1px solid #ddd;
    margin-bottom: 3px;
}

.recent-content {
    float: left;
    white-space: normal;
    width: 150px;
}

.recent-content h2, .recent-content h3 {
    margin-top: 3px;
    overflow-wrap: break-word;
}

.recent-content a {
    font-weight: bold;
}

.specLi {
    display: none !important;
}

#register-step {
    border-top: 4px solid #CA0000;
    text-align: center;
    box-shadow: 0px 10px 10px -10px #000 inset;
}

.img-step-register {
    display: block;
    height: 80px;
    margin: auto;
    margin-top: 40px;
}

#bgCL {
    padding-bottom: 25px;
    line-height: 26px;
}

#bgCL b {
    font-weight: normal;
}

#bgCL h2, #bgCL h3, #bgCL p {
    line-height: 1.6rem;
}

.conthead {
    display: none;
}

#btnAPromo {
    background-color: #333;
    padding: 6px 13px;
    border-radius: 8px;
    color: #fff;
    text-decoration: none;
    position: relative;
    top: 35px;
}

#slider {
    margin-top: 50px !important;
}

.alnk {
    font-size: 16px !important;
}

li.hid_step{display:none !important;}

@media screen and (min-width: 424px) {
    .recent-content {
        width: 230px;
    }

    #promo-icon {
        width: 380px;
    }

    .bodyPage {
        width: 400px;
    }

    #aregis {
        display: none;
    }

    #logo img {
        height: 45px !important;
    }

    #btnAPromo {
        background-color: #333;
        padding: 6px 13px;
        border-radius: 8px;
        color: #fff;
        text-decoration: none;
        position: relative;
        top: 35px;
    }
}

@media screen and (min-width: 460px) {
    .recent-content {
        float: left;
        white-space: normal;
        width: 240px;
    }
}

@media screen and (min-width: 600px) {
    #register-step {
        border-top: 4px solid #CA0000;
    }

    .img-step-register {
        display: block;
        float: left;
        height: 80px;
        margin-right: 20px;
    }

    #register-step h2, #register-step h3 {
        padding-top: 10px;
    }

    #promo-icon {
        width: 510px;
    }

    .bodyPage {
        width: auto;
        max-width: 700px;
    }

    #aregis {
        display: none;
    }

    .all-nav {
        float: left;
        width: 50%;
        margin-bottom: 40px;
    }

    #logo img {
        height: 45px !important;
    }

    .recent-content {
        float: left;
        white-space: normal;
        width: auto;
    }

    .recent-img > a > img {
        width: 180px;
    }

    #aregis, #aagent, #aagent2 {
        display: inline;
    }
}

@media screen and (min-width: 890px) {
    #promo-icon {
        width: 680px;
    }

    .group-list {
        width: 33.3%;
        float: left;
        padding-right: 20px;
        text-align: center;
        padding: 10px;
    }

    .group-list .arrow {
        display: block;
    }

    .img-step-register {
        display: block;
        float: none;
        margin: auto;
        margin-top: 40px;
    }

    #berger-menu {
        display: none;
    }

    #nav-menu {
        display: block;
    }

    #logo img {
        height: 85px !important;
    }
}

@media screen and (min-width: 1030px) {
    .bodyPage {
        width: auto;
        max-width: 1200px;
        padding-left: 35px;
        padding-right: 35px;
    }

    #present-p, #h1Index {
        text-align: center;
        padding-top: 40px;
    }

    #present-p p {
        text-align: center;
        padding-bottom: 60px;
    }

    #textFull-1 {
        display: inline;
    }

    #linkTextFull {
        display: none;
    }

    .all-nav {
        float: left;
        width: 25%;
        margin-bottom: 40px;
    }

    #rps_1 {
        display: none;
    }

    .recClear {
        display: none;
    }

    .recent {
        float: left;
        width: 25%;
        padding-right: 24px;
        padding-bottom: 30px;
    }

    .recent-img {
        float: none;
        margin-bottom: 2px;
    }

    .recent-img > a > img {
        width: 100%;
    }

    .recent-content {
        float: left;
    }

    .recent-content h2, .recent-content h3 {
        margin-top: 10px;
        overflow-wrap: break-word;
    }

    .recent-content > p {
        display: block;
        margin-top: 5px;
    }

    .specLi {
        display: inline !important;
    }

    #slider {
        margin-top: 0px !important;
    }

    li.hid_step{display:initial !important;}

}

</style>



<div class="zone pp-modif" style="margin-bottom:0px;margin-top:40px;text-align:left;border-top:3px solid #c10000;">
  <div class="bodyPage">
    <div class="all-nav">
    <div class="menu-label">เกี่ยวกับ</div>
    <nav class="nav_foot"><ul id="menu-sitenav" class="nav_body"><li id="menu-item-87" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-has-children menu-item-87"><a href="http://www.kan-eng.com">หน้าแรก</a>
<ul class="sub-menu pp-modif">
	<li id="menu-item-167" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-167"><a href="http://www.kan-eng.com/%e0%b9%80%e0%b8%81%e0%b8%b5%e0%b9%88%e0%b8%a2%e0%b8%a7%e0%b8%81%e0%b8%b1%e0%b8%9a%e0%b9%80%e0%b8%a3%e0%b8%b2/">เกี่ยวกับเรา</a></li>
</ul>
</li>
<li id="menu-item-91" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-91 pp-modif"><a href="http://www.kan-eng.com/%e0%b9%82%e0%b8%9b%e0%b8%a3%e0%b9%82%e0%b8%a1%e0%b8%8a%e0%b8%b1%e0%b9%88%e0%b8%99/">โปรโมชั่น</a></li>
<li id="menu-item-88" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-88 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%aa%e0%b8%a1%e0%b8%b1%e0%b8%84%e0%b8%a3%e0%b8%aa%e0%b8%a1%e0%b8%b2%e0%b8%8a%e0%b8%b4%e0%b8%81/">สมัครสมาชิก</a></li>
<li id="menu-item-89" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-89 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%97%e0%b8%b2%e0%b8%87%e0%b9%80%e0%b8%82%e0%b9%89%e0%b8%b2%e0%b9%80%e0%b8%a5%e0%b9%88%e0%b8%99/">ทางเข้าเล่น</a></li>
<li id="menu-item-110" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-110 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%a7%e0%b8%b1%e0%b8%99%e0%b9%80%e0%b8%a7%e0%b8%a5%e0%b8%b2%e0%b8%98%e0%b8%99%e0%b8%b2%e0%b8%84%e0%b8%b2%e0%b8%a3%e0%b8%9b%e0%b8%b4%e0%b8%94%e0%b8%a3%e0%b8%b0%e0%b8%9a%e0%b8%9a/">วันเวลาธนาคารปิดระบบ</a></li>
<li id="menu-item-90" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-90 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%95%e0%b8%b4%e0%b8%94%e0%b8%95%e0%b9%88%e0%b8%ad%e0%b9%80%e0%b8%a3%e0%b8%b2/">ติดต่อเรา</a></li>
</ul></nav>    </div>
    <div class="all-nav">
    <div class="menu-label">วีดีโอสอนการเล่น</div>
    <nav class="nav_foot"><ul id="menu-thevideo" class="nav_body"><li id="menu-item-149" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-149"><a href="http://www.kan-eng.com/%e0%b8%a7%e0%b8%b5%e0%b8%94%e0%b8%b5%e0%b9%82%e0%b8%ad%e0%b8%a7%e0%b8%b4%e0%b8%98%e0%b8%b5%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b9%81%e0%b8%97%e0%b8%87%e0%b8%9a%e0%b8%ad%e0%b8%a5/">VDOวิธีการแทงบอล</a></li>
<li id="menu-item-94" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-94 pp-modif"><a href="http://www.kan-eng.com/vdo%e0%b8%aa%e0%b8%ad%e0%b8%99%e0%b8%a7%e0%b8%b4%e0%b8%98%e0%b8%b5%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b9%81%e0%b8%97%e0%b8%87%e0%b8%ab%e0%b8%a7%e0%b8%a2/">VDOสอนวิธีการแทงหวย</a></li>
<li id="menu-item-95" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-95 pp-modif"><a href="http://www.kan-eng.com/vdo%e0%b8%aa%e0%b8%ad%e0%b8%99%e0%b8%a7%e0%b8%b4%e0%b8%98%e0%b8%b5%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b9%81%e0%b8%97%e0%b8%87%e0%b8%a1%e0%b8%a7%e0%b8%a2/">VDOสอนวิธีการแทงมวย</a></li>
<li id="menu-item-152" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-152 pp-modif"><a href="http://www.kan-eng.com/vdo%e0%b8%a7%e0%b8%b4%e0%b8%98%e0%b8%b5%e0%b9%80%e0%b8%a5%e0%b9%88%e0%b8%99%e0%b8%84%e0%b8%b2%e0%b8%aa%e0%b8%b4%e0%b9%82%e0%b8%99%e0%b8%ad%e0%b8%ad%e0%b8%99%e0%b9%84%e0%b8%a5%e0%b8%99%e0%b9%8c/">VDOวิธีเล่นคาสิโนออนไลน์</a></li>
<li id="menu-item-498" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-498 pp-modif"><a href="http://www.kan-eng.com/vdo%e0%b8%81%e0%b8%b2%e0%b8%a3%e0%b8%9d%e0%b8%b2%e0%b8%81-%e0%b8%96%e0%b8%ad%e0%b8%99%e0%b9%80%e0%b8%87%e0%b8%b4%e0%b8%99%e0%b8%84%e0%b8%b2%e0%b8%aa%e0%b8%b4%e0%b9%82%e0%b8%99/">VDOการฝาก-ถอนเงินคาสิโน</a></li>
</ul></nav>    </div>
    <div id="rps_1" class="clear"></div>
    <div class="all-nav">
    <div class="menu-label">SPORT & CASINO</div>
    <nav class="nav_foot"><ul id="menu-casino" class="nav_body">
      <li id="menu-item-145" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-145"><a href="http://livescore.kan-eng.com">ผลบอลสด</a></li>
      <li id="menu-item-136" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-136"><a href="http://www.kan-eng.com/%e0%b8%84%e0%b8%b2%e0%b8%aa%e0%b8%b4%e0%b9%82%e0%b8%99%e0%b8%ad%e0%b8%ad%e0%b8%99%e0%b9%84%e0%b8%a5%e0%b8%99%e0%b9%8c/">คาสิโนออนไลน์</a></li>
<li id="menu-item-143" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-143 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%9a%e0%b8%b2%e0%b8%84%e0%b8%b2%e0%b8%a3%e0%b9%88%e0%b8%b2%e0%b8%ad%e0%b8%ad%e0%b8%99%e0%b9%84%e0%b8%a5%e0%b8%99%e0%b9%8c/">บาคาร่าออนไลน์</a></li>
<li id="menu-item-144" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-144 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%a3%e0%b8%b9%e0%b9%80%e0%b8%a5%e0%b9%87%e0%b8%95%e0%b8%ad%e0%b8%ad%e0%b8%99%e0%b9%84%e0%b8%a5%e0%b8%99%e0%b9%8c/">รูเล็ตออนไลน์</a></li>
<li id="menu-item-145" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-145 pp-modif"><a href="http://www.kan-eng.com/%e0%b9%84%e0%b8%ae%e0%b9%82%e0%b8%a5%e0%b8%ad%e0%b8%ad%e0%b8%99%e0%b9%84%e0%b8%a5%e0%b8%99%e0%b9%8c/">ไฮโลออนไลน์</a></li>
</ul></nav>    </div>
    <div class="all-nav">
    <div class="menu-label">LOTTERY AND GAME</div>
    <nav class="nav_foot"><ul id="menu-lotter" class="nav_body"><li id="menu-item-126" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-126"><a href="http://www.kan-eng.com/%e0%b8%ad%e0%b8%b1%e0%b8%95%e0%b8%a3%e0%b8%b2%e0%b8%88%e0%b9%88%e0%b8%b2%e0%b8%a2%e0%b8%a5%e0%b8%ad%e0%b8%95%e0%b9%80%e0%b8%95%e0%b8%ad%e0%b8%a3%e0%b8%b5%e0%b9%88/">อัตราจ่ายหวยและส่วนลด</a></li>
<li id="menu-item-130" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-130 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%ad%e0%b8%b1%e0%b8%95%e0%b8%a3%e0%b8%b2%e0%b8%88%e0%b9%88%e0%b8%b2%e0%b8%a2%e0%b9%81%e0%b8%a5%e0%b8%b0%e0%b8%aa%e0%b9%88%e0%b8%a7%e0%b8%99%e0%b8%a5%e0%b8%94%e0%b8%ab%e0%b8%a7%e0%b8%a2%e0%b8%ab/">อัตราจ่ายและส่วนลดหวยหุ้น</a></li>
<li id="menu-item-131" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-131 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%ab%e0%b8%a7%e0%b8%a2%e0%b8%a5%e0%b8%b2%e0%b8%a7/">หวยลาว</a></li>
<li id="menu-item-132" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-132 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%95%e0%b8%a3%e0%b8%a7%e0%b8%88%e0%b8%ab%e0%b8%a7%e0%b8%a2/">ตรวจหวย</a></li>
<li id="menu-item-133" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-133 pp-modif"><a href="http://www.kan-eng.com/%e0%b8%ab%e0%b8%a7%e0%b8%a2%e0%b9%80%e0%b8%94%e0%b9%87%e0%b8%94/">หวยเด็ด</a></li>
</ul></nav>    </div>
    <div class="clear"></div>
  </div>
</div>
<div id="footer" class="pp-modif">
	<div class="bodyPage">สงวนสิขสิทธิ์ ©2004-2016 , กันเอง.คอม ผู้ให้บริการ แทงบอลออนไลน์ ดีที่สุด มาตรฐานสากล</div>
</div>