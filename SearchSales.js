const AWS = require('aws - sdk');

AWS.config.update({ accessKeyId: '', secretAccessKey: '', region: '' });

const connection = mysql.createConnection(
	{
		host: 'dbgotogro.cmibhz6gn2ip.us-east-1.rds.amazonaws.com',
		user: 'DB-CL4_T2',
		password: '.Hy-x6BomrTe-aXMArWh',
		//database: 'databasename'
	});

statement = connection.createStatement();

var input = document.getElementById("/*elementId*/");//product name
var requiredFirstName = input.value;
//var input = document.getElementById("/*elementId*/");//last name
//var requiredLastName = input.value;

connection.connect(err => {
	if (err) {
		console.error('Connection failed', err);
		return;
	} console.log('connected!')
})

var sql = "select * from `dbgotogro`.`sale`, `dbgotogro`.`product` on product.pdID = sale.pdID where sale.pdName = input ";

statement = connection.prepareStatement(sql);
result = statement.executeQuery(sql);
if (result.length > 0) {
	for (var i = 0; i < result.length; i++) {
		html += "<tr>" + "<td>" + result[i].saleID + "</td" + "<td" + result[i].memID +
			"</td" + "<td" + result[i].pdID + "</td" + "<td" + result[i].saleDate + "</td" + "<td" + result[i].salePrice
			+ " " + result[i].quantity 
	}
	connection.end();
}
else {
	console.log('no member found.');
	connection.end();
}


