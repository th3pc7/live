MainProg.config.Page_modules["admin"] = new PageJS(MainProg, function(Main){
  // this function run first time on load this file success.
  Main.on("submit","#form_add_link",add_match);
},function(Main){
  // this function run on after open this page.
},function(Main){
  // this function run on befor close this page.
});



function add_match(){
  //
}