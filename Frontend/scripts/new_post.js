window.onload = ()=>{
    const storage = window.localStorage
    const sessions = JSON.parse(storage.getItem("session"));
    const id = sessions['id'];
    const fileField = document.getElementById("file");
    const descriptionField = document.getElementById("Description");
    const button = document.getElementById("create-button");

    button.addEventListener("click", async(e)=>{
        e.preventDefault();

        const description = descriptionField.value;
        const file = fileField.value;

        const data = new FormData();
        data.append("file" , file);
        data.append("description" , description); 
        data.append("user_id" , id);   
        
        axios.post("http://localhost/localInstagram/Backend/create_post.php", data).then((response) => {
            console.log(response.data);
        }).catch((err) => {
            console.log(err);
        });
    
    })


}