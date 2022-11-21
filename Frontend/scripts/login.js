window.onload = ()=> {
    const usernameField = document.getElementById("username");
    const loginButton = document.getElementById("login-button");
    const passwordField = document.getElementById("password");
    loginButton.addEventListener("click" , async(e)=>{
        e.preventDefault();
        const username = usernameField.value;
        const password = passwordField.value; 
        console.log(password);
        const data = new FormData();
        data.append("username" , username);
        data.append("password" , password);
        await axios.post("http://localhost/localInstagram/Backend/login.php",data).then(response => console.log(response.data));
        const res = await axios.get("http://localhost/localInstagram/Backend/session.php");
        console.log(res.data);
    });


}