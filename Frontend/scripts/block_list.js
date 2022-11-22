window.onload = ()=>{
    const storage = window.localStorage
    const sessions = JSON.parse(storage.getItem("session"));
    const id = sessions['id'];
    const blocked_list = document.getElementById("blocked_list");
    axios.get("http://localhost/localInstagram/Backend/blocked_list.php?user_id="+id).then(response=>{
        const list = response.data;
        let htmlTable = "<table><tr><th>Username</th></tr></br>";
        for(let i=0 ; i<list.length; i++){
            htmlTable += "<tr><td>" + list[i]['username']+"</td></tr>";
        }
        htmlTable += "</table>";
        blocked_list.innerHTML = htmlTable;
    });
}