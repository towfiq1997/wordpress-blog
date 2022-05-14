document.addEventListener("DOMContentLoaded",()=>{
    const singlepage_content = document.getElementById("singlepage_content");
    const allh2 = singlepage_content.querySelectorAll("h2");
    let html = `<div class="toc_style d_none"><h2 id="toc_heading">Contents</h2><div class="toc-main-content">`;
    allh2.forEach((single)=>{
        const filterh2 = single.innerText.replaceAll(" ",'-');
        single.setAttribute("id",filterh2);
        // console.log(filterh2);
        html  += `<a href="#${filterh2}">${single.innerText}</a>`;
    });
    html +=`</div></div>`;
    console.dir(html);
    singlepage_content.innerHTML = html+singlepage_content.innerHTML;
    const toc_heading = document.getElementById("toc_heading");
    console.log(toc_heading);
    toc_heading.addEventListener("click",(e)=>{
        e.target.parentElement.classList.toggle("d_none");
    })
})

