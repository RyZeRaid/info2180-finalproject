window.onload = function(){

    let button1 = document.querySelector("#all");
    let button2 = document.querySelector("#open");
    let button3 = document.querySelector("#myticket");

    button1.addEventListener("click", onClick);
    button2.addEventListener("click", onClick);
    button3.addEventListener("click", onClick);

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
        
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("show").innerHTML = this.responseText;
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
        }
        xhr.send();
        return;
    }
        
    
}