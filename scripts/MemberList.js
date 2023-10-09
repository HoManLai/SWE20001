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
                        memIcon = data[i].memIcon;

                        str += "<tr>";
                        str += "<td>" + memID + "</td>";
                        str += "<td>" + memFirst + "</td>";
                        str += "<td>" + memLast + "</td>";
                        str += "<td>" + dob + "</td>";
                        str += "<td>" + phone + "</td>";
                        str += "<td>" + streetName + "</td>";
                        str += "<td>" + suburb + "</td>";
                        str += "<td>" + state + "</td>";
                        str += "<td>" + memIcon + "</td>";
                        str += "</tr>";
                }

                document.getElementById("memTable").innerHTML = str; 
        }
}

xmlreq.send();

function downloadCSV(csv, filename) {
        var csvFile;
        var downloadLink;
    
        // CSV file
        csvFile = new Blob([csv], {type: "text/csv"});
    
        // Download link
        downloadLink = document.createElement("a");
    
        // File name
        downloadLink.download = filename;
    
        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);
    
        // Hide download link
        downloadLink.style.display = "none";
    
        // Add the link to DOM
        document.body.appendChild(downloadLink);
    
        // Click download link
        downloadLink.click();
    }

function exportTableToCSV(filename) {
var csv = [];
var rows = document.querySelectorAll("memTable");

for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
        row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
}

// Download CSV file
downloadCSV(csv.join("\n"), filename);
}