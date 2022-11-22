window.onload = ()=>{
    const storage = window.localStorage
    const sessions = JSON.parse(storage.getItem("session"));
    const id = sessions['id'];
    const blocked_list = document.getElementById("blocked_list");
    const blockedField = document.getElementById("block_username");
    const blockButton = document.getElementById("block-button");
    const unblockedField = document.getElementById("unblock_username");
    const unblockButton = document.getElementById("unblock-button");
    axios.get("http://localhost/localInstagram/Backend/blocked_list.php?user_id="+id).then(response=>{
        const list = response.data;
        let htmlTable = "<table><tr><th>Username</th></tr></br>";
        for(let i=0 ; i<list.length; i++){
            htmlTable += "<tr><td>" + list[i]['username']+"</td></tr>";
        }
        htmlTable += "</table>";
        blocked_list.innerHTML = htmlTable;
    });

    blockButton.addEventListener("click" , (e)=>{
        e.preventDefault();
        const username = blockedField.value;
        
        const data = new FormData();
        data.append("user_id1" , id);
        data.append("username" , username);
        axios.post("http://localhost/localInstagram/Backend/block_user.php", data).then(response =>{
            location.reload();
        })
    })


    unblockButton.addEventListener("click" , (e)=>{
        e.preventDefault();
        const username = unblockedField.value;
        
        const data = new FormData();
        data.append("user_id1" , id);
        data.append("username" , username);
        axios.post("http://localhost/localInstagram/Backend/unblock_user.php", data).then(response =>{
            location.reload();
        })
    })

}