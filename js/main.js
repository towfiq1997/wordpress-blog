const newswletter = document.getElementById("croosicon");
const navSticky = document.querySelector(".nav-sticky");
const toogle_parent = document.querySelector(".toogle_parent");
const body = document.querySelector("body");
const mobile_search = document.getElementById("mobile-search");
const mobile_theme_toggle = document.getElementById("mobile-theme-toggle");
const expand_area = document.getElementById("expand-area");

if(mobile_theme_toggle){
  mobile_theme_toggle.addEventListener("click",(e)=>{
    send_theme_toggle();
    body.classList.toggle("darkbody");
    if(e.target.classList.contains('fa-moon-o')){
          mobile_theme_toggle.innerHTML='<i class="fa fa-sun-o" aria-hidden="true"></i>';
    }else{
      mobile_theme_toggle.innerHTML='<i class="fa fa-moon-o" aria-hidden="true"></i>';
    }
  })
}
if(mobile_search){
  mobile_search.addEventListener("click",()=>{
      expand_area.classList.toggle("block");
  })
}
const send_theme_toggle = async ()=>{
  const formdata = new FormData();
  formdata.append("action","theme_toggle");
  const resposne = await fetch("http://localhost/uglypicks/wp-admin/admin-ajax.php",{
    method:"POST",
    body:formdata
  });
  const result = await resposne.json();
  console.log(result);
}
document.addEventListener("DOMContentLoaded", () => {
const toogle_btn = document.getElementById("toogle_btn");
const header_menu_t = document.getElementById("header_menu_t");
const mynav = document.getElementById("mynav");
const menu_cross = document.getElementById("menu_cross");
const body = document.querySelector("body");
const bodyoverlay = document.getElementById("bodyoverlay");
const ul = document.querySelector(".scroll-menus");
if(body.classList.contains("darkbody")){
  toogle_parent.classList.add("dark");
}
const mobile_li = ul.querySelectorAll("li");
mobile_li.forEach((single)=>{
if(single.classList.contains("menu-item-has-children")){
      
    single.addEventListener("click",()=>{
        const subli = single.querySelector("ul");
        if(subli.style.display == "block"){
            subli.style.display = "none";
            single.classList.remove("opened");
        }else{
            mobile_li.forEach((single_li)=>{
                   if(single_li.classList.contains("opened")){
                       single_li.classList.remove("opened");
                      const ul_find = single_li.querySelector("ul");
                      ul_find.style.display = "none";
                   }
            })
            subli.style.display = "block";
            single.classList.add("opened");
        }
    });
  }
});
toogle_btn.addEventListener("click",()=>{
    
    bodyoverlay.classList.toggle("mobile-menu-overlay");
    mynav.classList.toggle("active_canvas");
})

menu_cross.addEventListener("click",()=>{
    mynav.classList.toggle("active_canvas");
    bodyoverlay.classList.toggle("mobile-menu-overlay");
})

document.addEventListener("click",(e)=>{
    console.log();
    if(e.target.classList.contains("mobile-menu-overlay")){
        mynav.classList.toggle("active_canvas");
        bodyoverlay.classList.toggle("mobile-menu-overlay");
    }
    
})

  toogle_btn.addEventListener("click", () => {
    // header_menu_t.classList.toggle("active");
  });

});


if(toogle_parent){
  toogle_parent.addEventListener("click",(e)=>{
    send_theme_toggle();
    toogle_parent.classList.toggle("dark");
    body.classList.toggle("darkbody");
  })
}
const mobile_toggle = document.getElementById










