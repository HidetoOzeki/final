
let option = [];
let option_count = 0;
function add_option(){
  console.log("option added");
  let a = document.getElementById("option_input");
  var myinput = document.createElement("input");
  myinput.setAttribute("type","text");
  myinput.setAttribute("class","create_post_vote_option");
  myinput.setAttribute("name","options");
  a.appendChild(myinput);
  option_count++;
}