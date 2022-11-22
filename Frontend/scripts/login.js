window.onload = ()=> {
    const usernameField = document.getElementById("username");
    const loginButton = document.getElementById("login-button");
    const passwordField = document.getElementById("password");
    const storage = window.localStorage;
    loginButton.addEventListener("click" , (e)=>{
        e.preventDefault();
        const username = usernameField.value;
        const password = passwordField.value; 
        const data = new FormData();
        data.append("username" , username);
        data.append("password" , password);
        axios.post("http://localhost/localInstagram/Backend/login.php",data).then(response =>{
            const list = response.data; 
            if(list['success']){
                storage.setItem("session" , JSON.stringify(list));
                location.replace("index.html");
            }
        });
    });


}