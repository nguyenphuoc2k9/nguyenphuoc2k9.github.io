var menubtn = document.getElementById("close")
var btn = document.getElementById("close-")
var sidenav = document.getElementById("sidenav-box")
    sidenav.style.left = "-30%"
    btn.style.left = "3%"
menubtn.onclick=()=>{
    if(sidenav.style.left == "0%"){
        sidenav.style.left = "-30%"
        menubtn.innerHTML = `<i class="fa-solid fa-bars"></i>`
        btn.style.left = "3%"
    } else {
        sidenav.style.left = "0%"
        menubtn.innerHTML = `<i class="fa-solid fa-xmark"></i>`
        btn.style.left = "21%"
    }
}
//pop-up
for(let i = 0;i< document.getElementsByClassName("popup").length;i++){
    console.log(i);
    document.getElementsByClassName("popup")[i].addEventListener("click",function(){
        document.getElementsByClassName("pop-up")[i].style.display = "block"
    })
}
for(let i =0;i< document.getElementsByClassName("closepop").length;i++){
    document.getElementsByClassName("closepop")[i].addEventListener("click",function(){
        document.getElementsByClassName("pop-up")[i].style.display = "none"
    })
}
function drop(){
    document.getElementById("dropdown").classList.toggle("show");
}
window.onclick = function(event) {
    if (!event.target.matches('#dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }