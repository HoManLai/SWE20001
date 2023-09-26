var xmlreq = new XMLHttpRequest();
xmlreq.open("GET", "php/SalesReport.php");

xmlreq.onload= function(){
        var data = JSON.parse(xmlreq.responseText);
        var str = "";

        for (var i  = 0; i < data.length; i++)
        {
                saleID = data[i].saleID;
                memID = data[i].memID;
                pdID = data[i].pdID;
                quantity = data[i].quantity;
                saleDate = data[i].saleDate;
                salePrice = data[i].salePrice;

                str += "<tr>";
                str += "<td>" + saleID + "</td>";
                str += "<td>" + memID + "</td>";
                str += "<td>" + pdID + "</td>";
                str += "<td>" + quantity + "</td>";
                str += "<td>" + saleDate + "</td>";
                str += "<td>" + salePrice + "</td>";
                str += "</tr>";
        }

        document.getElementById("saleTable").innerHTML = str; 
};

xmlreq.send();

