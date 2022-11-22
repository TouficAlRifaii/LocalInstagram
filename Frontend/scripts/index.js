window.onload = ()=>{
    const logout = document.getElementById("logout");


    logout.addEventListener("click" , (e)=>{
        e.preventDefault();
        sessions['loggedin'] = false; 
        sessions['id'] = null;
        sessions['username']=  null;
        storage.setItem("session", JSON.stringify(sessions));
        location.replace("login.html");
    })
}
