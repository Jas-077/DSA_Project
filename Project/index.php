<html>
	<head>
		<title>Home Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style> 
*{
	font-family: 'Josefin Sans', sans-serif;

}
body{
    background: linear-gradient(#00FF00, #FF6347) center center fixed; 
    background-size: cover;
	margin: 0%;
}

header{
    height: 10vh;
}

header ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

header li {
  float: left;

}

header li a {
  display: block;
  color: white;
  font-size: 1.3em;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  position: absolute;
  margin-left: 0%;

}

 header li a:hover {
  color: cyan;
}
.nav1
{
    margin: 0%;
    background-color: rgb(2, 2, 2);
    height: 100%;
}
.nav2
{

    width: 70%;
    height: 100%;
  display: flex;
          justify-content: space-between;
}

.logo
{
    height: 100%;
    width: 100px;
    border-radius: 100%;
    
}

.active
{
    color: lightgreen;
}

.form
{
    height: 68%;
    width: 20%;
    background-color: rgb(3, 3, 3, .6);
    padding: 14px 25px;
    margin-left:38%;
    margin-top: 5%;
}
.avatar{
height: 120px;
border-radius: 50%;
opacity: 80%;
margin-top: -20%;
margin-left: 30%;
}
main
{
	padding: 5px 5px;
	height: 80vh;
}
footer
{
    position: absolute;
    height: 10vh;
    width: 100%;
}

.foot
{
    background-color: #000;
    height: 100%;
    width: 100%;
    margin: 0;
}
.foot p
{
    margin-left: 42%;
    color: white;
    font-size: 1.3em;
  text-shadow: 2px 2px 4px rgb(53, 214, 53);
}
.foot a
{
    margin-left: 49%;
    color: white;
    font-size: 1.3em;
    position: absolute;
    margin-top: -1%;
}
#bin
{
	font-size: 7em;
	color: whitesmoke;
	font-family: Chalkboard;
	animation: fade1 5s ease-out infinite alternate ;
	animation-direction: alternate;
	opacity: 0%;
	margin-left: 15%;
	margin-top: 0%;
}
@keyframes fade1 {
	0%
	{
		opacity: 0%;
	}
	100%
	{
		opacity: 100%;
	}

	
}

#bin2
{
	font-size: 7em;
	color: whitesmoke;
	font-family: Chalkboard;
	animation: fade1  7s ease-out infinite alternate ;
	animation-direction: alternate;
	opacity: 0%;
	margin-left: 45%;
	margin-top: -7%;
}
@keyframes fade1 {
	0%
	{
		opacity: 0%;
	}
	20%
	{
		opacity: 0%;
	}
	100%
	{
		opacity: 100%;
	}

	
}
</style>
</head>
<body>
	<header >
		<div class="nav1">
			<div class="nav2">
				<img src="logo.jpg" class="logo">
				<li>
					<a href="index.php" class="active">HOME</a>
				</li>
				<li>
					<a href="sign.php">SIGNUP</a>
				</li>
				<li>
					<a href="login.php" >LOGIN</a>
				</li>
			</div>
		</div>
	</header>
	<main>

      <h2>PROBLEM DEFINITION</h2>
	  <p> Given a path in the form of a rectangular matrix having few landmines arbitrarily placed (marked as 0), calculate length of the shortest safe route possible from any cell in the first column to any cell in the last column of the matrix. We are allowed to move to only adjacent cells which are not landmines. i.e. the route cannot contains any diagonal moves.
</p>
      <h4> Steps to execute </h4>
	  <ul>
	  <li>A matrix with m rows and n columns is pre declared in the form of Binary Maze. </li>
	  <li> Input source cell’s coordinates of the matrix. </li>
	  <li> Input destination cell’s coordinates of the matrix. </li>
	  <li> The shortest path between the sorce and destination cell is calculated by clicking the Button.</li>
	  </ul>
	  <h4> Expected output</h4>
      <ul>
	  <li>If the shortest distance between the source and destination cell is found then the value of the
Shortest path is printed.
</li>
	  <li>If the shortest distance is not found then the Shortest
Path doesn’t exist is printed. </li>
	  </ul>
	 <p id="bin">BINARY</p>
	 <p id="bin2">MAZE</p>
	</main>
	<footer>
		<div class="foot">
			<p>Copyright © 2020 BinaryMaze</p>
		  <a href="https://github.com/Jas-077/SE_Project.git" target="_blank">
			<i class="fa fa-github" style="color: rgb(53, 228, 53);font-size: 1.8em;"></i>
			</a>
		</div>
	</footer>
</body>
</html>