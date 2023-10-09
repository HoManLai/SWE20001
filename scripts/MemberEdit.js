function init() {
    var memData = document.getElementsByClassName("memData");
    var data = new FormData();

    // stores its keys and values
    for(var i=0; i<memData.length; i++) 
    {
        data.append(memData[i].name, memData[i].value);
    }

    var xmlreq = new XMLHttpRequest();
    
    xmlreq.open("POST", "php/MemberEdit.php");
    
    xmlreq.send(data);

    xmlreq.onreadystatechange= function(){
        if (xmlreq.readyState==4 && xmlreq.status==200)
        {
            document.getElementById("memForm").reset(); 

            //show console text 
            document.getElementById("message").innerHTML = xmlreq.responseText;

            //remove success msg after 2 secs 
            setTimeout(function(){
                document.getElementById("message").innerHTML  = "";
            }, 2000 )
        }
    };
}
