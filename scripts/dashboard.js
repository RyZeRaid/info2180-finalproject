function onClick(e){
    

    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("table").innerHTML = this.responseText;
            var button5 = document.getElementsByClassName("issueLink");
            
            for(var i = 0; i<button5.length; i++){
                button5[i].addEventListener("click", onClick);
                console.log(button5[i]);
            }

            
            
        }
    }

    if(e.target.id === "all"){
        console.log('all clicked');
        xhr.open('GET', 'scripts/dashboard.php?context=all', true);
        xhr.send();
        

    }else if (e.target.id === "open"){
        console.log('open clicked');
        xhr.open('GET', 'scripts/dashboard.php?context=open', true);
        xhr.send();
        

    }else if (e.target.id === "myticket"){
        console.log('myticket clicked');
        xhr.open('GET', 'scripts/dashboard.php?context=myticket', true);

        xhr.send();
        
    
    }else if (e.target.tagName === "BUTTON"){
        console.log('got issue');
        
        
        xhr.open('GET', 'scripts/issuelink.php?show=show'+"&issue="+ e.target.value, true);
      
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("show").innerHTML = this.responseText;
                let button6 = document.querySelector("#closedBtn");
                let button7 = document.querySelector("#inProgressBtn");
                button7.addEventListener("click", onClicked);
                button6.addEventListener("click", onClicked);
            }
        }

        xhr.send();
    
    }

    

}

function onClicked(e){
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("show").innerHTML = this.responseText;
            
        }
    }
    if (e.target.id === "closedBtn"){
        console.log('close status clicked');
        var showbtn = document.getElementsByClassName("BUTTON"); 

        var stat=[];

        for (var i = 0; i < showbtn.length; i++) {
            console.log(showbtn[i].value);
            stat.push(showbtn[i].value);
        }
        xhr.open('GET', 'scripts/updatestatus.php?status=close'+"&id="+ stat, true);
        
    }else if (e.target.id === "inProgressBtn"){
        console.log('inprogress status clicked');
        var showbtn = document.getElementsByClassName("BUTTON"); 

        for (var i = 0; i < showbtn.length; i++) {
            console.log(showbtn[i].value);
            stat.push(showbtn[i].value);
        }
        xhr.open('GET', 'scripts/updatestatus.php?status=inprogress'+"&id="+ stat, true);
    } 
    xhr.send();
}

export {onClick};
