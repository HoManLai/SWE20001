var xmlreq = new XMLHttpRequest();
xmlreq.open("GET", "php/MemberList.php");

xmlreq.onreadystatechange= function()
{
        if (xmlreq.readyState==4 && xmlreq.status==200)
        {
                var data = JSON.parse(xmlreq.responseText);
                var str = "";

                for (var i  = 0; i < data.length; i++)
                {
                        memID = data[i].memID;
                        memFirst = data[i].memFirst;
                        memLast = data[i].memLast;
                        dob = data[i].dob;
                        phone = data[i].phone;
                        email = data[i].email;
                        streetName = data[i].streetName;
                        suburb = data[i].suburb;
                        state = data[i].state;
                        postcode = data[i].postcode;
                        memIcon = data[i].memIcon;

                        str += "<tr>";
                        str += "<td>" + memID + "</td>";
                        str += "<td>" + memFirst + "</td>";
                        str += "<td>" + memLast + "</td>";
                        str += "<td>" + dob + "</td>";
                        str += "<td>" + phone + "</td>";
                        str += "<td>" + email + "</td>";
                        str += "<td>" + streetName + "</td>";
                        str += "<td>" + suburb + "</td>";
                        str += "<td>" + state + "</td>";
                        str += "<td>" + postcode + "</td>";
                        str += "<td>" + memIcon + "</td>";
                        //edit specific member
                        str += "<td><button><a href=\"MemberEditPage.php?updateID=" + memID + "\">Update</a></button>";
                        //delete specific member
                        str += "<button><a href=\"MemberDeletePage.php?deleteID=" + memID + "\">Delete</a></button></td>";
                        str += "</tr>";
                }

                document.getElementById("memTable").innerHTML = str; 
        }
}

xmlreq.send();
