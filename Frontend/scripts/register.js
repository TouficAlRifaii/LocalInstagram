window.onload = ()=>{
    const usernameField = document.getElementById("username");
    const emailField = document.getElementById("email");
    const fullNameField = document.getElementById("fullName");
    const passwordField = document.getElementById("password");
    const button = document.getElementById("signupButton");

    button.addEventListener("click" , (e)=>{
        e.preventDefault();

        const username = usernameField.value;
        const email  = emailField.value;
        const password = passwordField.value;
        const fullName = fullNameField.value; 

        const data = new FormData();
        data.append("username", username);
        data.append("password", password);
        data.append("email" , email);
        data.append("name", fullName);
        
        axios.post("http://localhost/localInstagram/Backend/register.php" , data).then(response => {
            const list  = response.data; 
            console.log(list);
            if(list['success'] && !list['exist']){
                location.replace("login.html");
            }
        })
    })
};