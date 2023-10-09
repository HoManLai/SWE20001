var xmlreq = new XMLHttpRequest();
xmlreq.open("GET", "php/ProductList.php");

xmlreq.onreadystatechange= function()
{
        if (xmlreq.readyState==4 && xmlreq.status==200)
        {
                var data = JSON.parse(xmlreq.responseText);
                var str = "";

                for (var i  = 0; i < data.length; i++)
                {
                        pdID = data[i].pdID;
                        pdName = data[i].pdName;
                        category = data[i].category;
                        price = data[i].price;
                        supplier = data[i].supplier;
                        description = data[i].description;

                        str += "<tr>";
                        str += "<td>" + pdID + "</td>";
                        str += "<td>" + pdName + "</td>";
                        str += "<td>" + category + "</td>";
                        str += "<td>" + price + "</td>";
                        str += "<td>" + supplier + "</td>";
                        str += "<td>" + description + "</td>";
                        str += "</tr>";
                }

                document.getElementById("pdTable").innerHTML = str; 
        }
};

xmlreq.send();

