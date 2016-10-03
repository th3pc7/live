<style>
#form_add_soccer *, #form_add_team *{
  color:#000;
}
</style>


<form id="form_add_soccer">
  <input name="start_time" type="datetime-local" >
  <select name="home"><option value="team_id">Team_name</option></select>
  &nbsp;Vs&nbsp;
  <select name="away"><option value="team_id">Team_name</option></select>
  <input type="submit">
</form>

<form id="form_add_team">
  <input name="team" type="text" >
  <input name="file" type="file">
  <input type="submit">
</form>

<div style="padding:40px;">
  <table class="table table-bordered">
    <thead>
      <tr>
        <td>วันเวลา</td>
        <td>รายละเอียด</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2016/10/04 02:30 AM</td>
        <td>พบกันระหว่าง</td>
      </tr>
      <tr>
        <td colspan="2">The link</td>
      </tr>
    </tbody>
  </table>
</div>