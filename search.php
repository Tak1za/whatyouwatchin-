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
		$movies_json=file_get_contents($movies_url); // storing all the json data into a variable
		$movies_array=json_decode($movies_json, true); // decoding the JSON data into a PHP array
		$title=$movies_array['Title'];
		$year=$movies_array['Year'];
		$released=$movies_array['Released'];
		$runtime=$movies_array['Runtime'];
		$rated=$movies_array['Rated'];
		$genre=$movies_array['Genre'];
		$director=$movies_array['Director'];
		$writer=$movies_array['Writer'];
		$actors=$movies_array['Actors'];
		$plot=$movies_array['Plot'];
		$rating=$movies_array['imdbRating'];
		$poster=$movies_array['Poster'];
		$language=$movies_array['Language'];
	}
?>
	
	<div class="content">
		<form action="">
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
			<p>
				<?php
					echo "<img src='$poster' height='200px' width='150px' style='float: right;'>";
					echo "<h1>$title($year)</h1><br>";
					echo "<h3>Genre: $genre</h3>";
					echo "<h3>Runtime: $runtime</h3>";
					echo "<h3>Directed By: $director</h3>";
					echo "<h3>Written By: $writer</h3>";
					echo "<h3>Cast: $actors</h3>";
					echo "<h3>Plot: $plot</h3>";
					echo "<h3>Language: $language</h3>";
					echo "<h3>Imdb: $rating</h3>";
				?>
			</p>
		</div>
	</div>

<?php
	include('includes/footer.php');
?>