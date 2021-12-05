window.onload = function(){

    let button1 = document.querySelector("#all");
    let button2 = document.querySelector("#open");
    let button3 = document.querySelector("#myticket");
    let button4 = document.querySelector("#createBtn");

    

    let btnClicked = false;
    var check=[];
    var stat=[];

    button1.addEventListener("click", onClick);
    button2.addEventListener("click", onClick);
    button3.addEventListener("click", onClick);
    button4.addEventListener("click", Click);

    function Click(e){
        window.location.href = "createIssue.php";
    }

    let logout = document.querySelector('.logout')
    let pcogLogo = document.querySelector('#pcog-logo')

    logout.addEventListener("click", clicked);
    pcogLogo.addEventListener("click", clicked);

    function clicked(e){
        if (e.target.id === "pcog-logo"){
            window.location.href = "HomeScreen.php";
        }else{
            window.location.href = "logout.php";
        }  
    }


    function onClick(e){

        btnClicked = true;
        
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("show").innerHTML = this.responseText;
                let button5 = document.querySelector("#issueLink");
                button5.addEventListener("click", onClick);
                
            }
        }

        if(e.target.id === "all"){
            console.log('all clicked');
            xhr.open('GET', 'scripts/dashboard.php?context=all', true);
            

        }else if (e.target.id === "open"){
            console.log('open clicked');
            xhr.open('GET', 'scripts/dashboard.php?context=open', true);
            

        }else if (e.target.id === "myticket"){
            console.log('myticket clicked');
            xhr.open('GET', 'scripts/dashboard.php?context=myticket', true);
            
        
        }else if (e.target.id === "issueLink"){
            console.log('got issue');
            var grid = document.getElementById("Table1");
            var showbtn = grid.getElementsByTagName("INPUT"); 
            
            for (var i = 0; i < showbtn.length; i++) {
                console.log(showbtn[i].value);
                check.push(showbtn[i].value);
            }
            
            xhr.open('GET', 'scripts/issuelink.php?show=show'+"&issue="+ check, true);
          
            xhr.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("show").innerHTML = this.responseText;
                    let button6 = document.querySelector("#closedBtn");
                    let button7 = document.querySelector("#inProgressBtn");
                    button7.addEventListener("click", onClicked);
                    button6.addEventListener("click", onClicked);
                }
            }
        
        }

        xhr.send();

    }

    console.log('gotten here');
    
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
        
    
}