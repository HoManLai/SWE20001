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

var input = document.getElementById("/*elementId*/");//first name
var requiredFirstName = input.value;
var input = document.getElementById("/*elementId*/");//last name
var requiredLastName = input.value;

connection.connect(err => {
	if (err) {
		console.error('Connection failed', err);
		return;
	} console.log('connected!')
})

var sql = "select * from DB - CL4_T2 where mamFirst = requiredFirstName or mamLast = requiredLastName";


statement = connection.prepareStatement(sql);
result = statement.executeQuery(sql);
if (result.length > 0) {
	for (var i = 0; i < result.length; i++) {
		html += "<tr>" + "<td>" + result[i].memID + "</td" + "<td" + result[i].memFirst + " " + result[i].memLast +
			"</td" + "<td" + result[i].Phone + "</td" + "<td" + result[i].memEmail + "</td" + "<td" + result[i].memStreet
			+ " " + result[i].memSuburb + " " + result[i].memState + "</td" + "<td" + result[i].memPostcode + "</td" + "<td"
			+ result[i].memDOB + "</td" + "<td" + result[i].memIcon
	}
}
else {
	console.log('no member found.')
}

connection.end();




/*try {
	var DbUrl = "dbgotogro.cmibhz6gn2ip.us-east-1.rds.amazonaws.com"; //数据库连接字
	var DbName = "DB-CL4_T2";
	var DbPass = ".Hy-x6BomrTe-aXMArWh";
	con = DriverManager.getConnection(DbUrl, DbName, DbPass);//加载并注册驱动程序
	st = con.createStatement();//statement对象的初始化


	var sql = "select * from DB - CL4_T2 where mamFirst = requiredFirstName or mamLast = requiredLastName";
	stmt = con.prepareStatement(sql);//先实例化stmt对象，之后再执行sql语句
	rs = stmt.executeQuery(sql);


	while (rs.next()) {
		out.print("<td>" + rs.getString(1) + "</td>");
		out.print("<td>" + rs.getString(2) + "</td>");
		out.print("<td>" + rs.getString(3) + "</td>");
		out.print("<td>" + rs.getString(4) + "</td>");
		out.print("<td>" + rs.getInt("java") + "</td>");
		out.print("<td>" + rs.getInt("os") + "</td>");
		out.print("<td>" + rs.getInt("math") + "</td>");
		out.print("</tr>");
	}
} catch (SQLException e) {
	out.print(e);
}*/
