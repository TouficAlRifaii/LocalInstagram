window.onload = ()=>{
    const storage = window.localStorage
    const sessions = JSON.parse(storage.getItem("session"));
    const id = sessions['id'];
    const emailField = document.getElementById("email");
    const nameField = document.getElementById("name");
    const button = document.getElementById("submit-button");
    const logout = document.getElementById("logout");
    button.addEventListener("click", (e)=>{
        e.preventDefault();

        const email = emailField.value;
        const name = nameField.value;

        const data = new FormData();
        data.append("name" , name);
        data.append("email" , email); 
        data.append("user_id" , id);   
        
        axios.post("http://localhost/localInstagram/Backend/edit_profile.php", data).then((response) => {
            console.log(response.data);
        }).catch((err) => {
            console.log(err);
        });
    
    });
    logout.addEventListener("click" , (e)=>{
        e.preventDefault();
        sessions['loggedin'] = false; 
        sessions['id'] = null;
        sessions['username']=  null;
        storage.setItem("session", JSON.stringify(sessions));
        location.replace("login.html");
    })


}