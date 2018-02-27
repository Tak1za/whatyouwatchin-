var express=require("express");
var request=require("request");
var app=express();

app.use(express.static("public"));
app.set("view engine", "ejs");

app.get("/", function(req, res){
	res.render("home");	
})

app.get("/results", function(req, res){
	var url="http://www.omdbapi.com?apikey=thewdb&s=" + req.query.search;
	request(url, function(error, response, body){
		if(!error && response.statusCode==200){
			var data=JSON.parse(body);
			res.render("results", {data: data});
		}
	})
})

app.get("/:newMovie", function(req, res){
	var url2="http://www.omdbapi.com?apikey=thewdb&t=" + req.params.newMovie;
		request(url2, function(error, response, body){
			if(!error && response.statusCode==200){
				var data2=JSON.parse(body);
				res.render("movie", {data2: data2});
			}
		})
})


// app.listen(3000, function(){
// 	console.log("App started!");
// })

app.listen(process.env.PORT || 3000, function(){
	console.log('Listening on', app.address().port);
});