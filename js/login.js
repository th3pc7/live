MainProg.config.Page_modules["login"] = new PageJS(MainProg, function(Main){
  // this function run first time on load this file success.
  Main.on("submit","#login-form",login);
},function(Main){
  // this function run on after open this page.
},function(Main){
  // this function run on befor close this page.
});


function login(ev){
  ev.preventDefault();
  $.post("/live/login/action/",$("#login-form").serialize(),function(data){
    if(data==="pass"){ window.location.reload(); }
    else{ alert(data); }
  });
}
