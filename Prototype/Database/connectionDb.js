var mysql = require('mysql');

var con = mysql.createConnection({
 		host: "localhost",
  	user: "root",
  	password: "",
});

con.connect(function(err) {
  		if (err) throw err;
  		//Select all customers and return the result object:
  		console.log("Connected!");
});

con.end();