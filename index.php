<?php
	include('includes/header.php'); 
?>

<?php
	if(!empty($_GET['searchQuery'])){
		if($_GET['type']=="movie"){
			$movies_url='http://www.omdbapi.com/?apikey=thewdb&type=movie&t=' .urlencode($_GET['searchQuery']);
		}
		else if($_GET['type']=="series"){
			$movies_url='http://www.omdbapi.com/?apikey=thewdb&type=series&t=' .urlencode($_GET['searchQuery']);
		}
		$movies_json=file_get_contents($movies_url);
		$movies_array=json_decode($movies_json, true);
		$title=$movies_array['Title'];
	}
?>
	<div class="content">
		<form action="search.php">
			<div class="search">
				<div class="searchQuery">
					<input type="text" name="searchQuery" class="sqinput">
				</div>	
				<div class="searchButton">
					<input type="submit" value="Search">
					</input>
				</div>
			</div>
			<div class="filter">
				<label class="custom">Movie
					<input type="radio" name="type" checked="checked" value="movie">
					<span class="checkmark"></span>
				</label>
				<label class="custom">Series
					<input type="radio" name="type" value="series">
					<span class="checkmark"></span>
				</label>
			</div>
		</form>
		<div class="data">
			<h1 style="text-align: center;">Search for a Movie, a TV Series or an Episode</h1>
			<br>
			<p>This is an open-source platform making use of OMDB(Open Movies Database) API that provides a dataset of nearly all movies, tv series, episode ever made. This API was free at first but it recently went private after a lot of developers chimed in to maintain this API. I have purchased this and its child API called Posters API at a cost of 1$ a month. This purchase was made solely for the purpose of an assignment and shall not be used commercially.</p>
		</div>
	</div>
<?php
	include('includes/footer.php');
?>