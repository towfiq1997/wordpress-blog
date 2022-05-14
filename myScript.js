document.addEventListener("DOMContentLoaded",()=>{
    alert();
   const sendNetworkReq =async ()=>{
       const response =await fetch("jsonplaceholderapi.com/posts",{
           method:'POST',
           mode:"no-cors",
           cache:"no-cache",
           headers:{
               'Content-Type':'application/json',
               'Content-Type':'application/x-www-form-urlencoded'
           },
           credentials:"same-origin",
           body:JSON.stringify(data), 
       });
       const result = await response.json();
       if(result.status=="sucess"){
          result.forEach((single)=>{
            const myHeading = document.createElement('h1');
            myHeading.textContent= single.data;
            document.body.appendChild(myHeading);
          });
       }else{
           console.log("something went wrong");
       } 
   }
   sendNetworkReq();
})