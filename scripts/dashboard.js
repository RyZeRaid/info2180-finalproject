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

export {onClick};
