window.onload = function(){

    let createBtn = document.getElementById("btn");

    createBtn.addEventListener("click",buttonClicked);

    function buttonClicked(e){

        e.preventDefault();

        let title = document.getElementById("title").value;
        let description = document.getElementById("description").value;
        let assignedTo = document.getElementById("assign").value;
        let type = document.getElementById("type").value;
        let priority = document.getElementById("priority").value;

        console.log(assignedTo);

        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("show").innerHTML = this.responseText;
            }
        }

        xhr.open('GET', "scripts/createissue.php?title=" + title +"&description=" + description +"&assignedTo=" + assignedTo +"&type=" + type +"&priority=" + priority, true);
        xhr.send();
        
        console.log(title);
    }
    
}