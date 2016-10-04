<form id="form_add_link" style="width:300px;background-color:#000;padding:40px;">
  <input name="action" type="text" value="add_link" class="hidden">
  <div class="form-group">
    <label for="exampleInputEmail1">ชื่อรายการ</label>
    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="ชื่อรายการ" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Link</label>
    <input name="link" type="text" class="form-control" id="exampleInputPassword1" placeholder="Link" autocomplete="off">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input name="file" type="file" id="exampleInputFile">
    <p class="help-block">เลือกรูปภาพสำหรับรายการ</p>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
