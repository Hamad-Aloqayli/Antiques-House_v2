<?php

session_start();

if (!isset($_SESSION['email'])) {
	header("Location:signIn.php?error=SignIn First!");
}

include "database.php";

$empId = $_SESSION['id'];

$sql_Comment = " SELECT status FROM comment WHERE status = 1 ";

$sql_ItemCart = " SELECT image,title,text,price 
									FROM post
									 WHERE post.id IN ( SELECT orderr.Pid
									 										FROM orderr,employee
																		 WHERE $empId = orderr.Eid AND orderr.status = 1 ) AND NOT EXISTS ( SELECT * FROM orderr WHERE post.id = orderr.Pid AND status = 2 ) ";

$sql_ShowOrder = " SELECT employee.name,employee.email,post.image,post.title,post.price,orderr.id,status
										FROM employee,post,orderr
										WHERE orderr.Eid = employee.id AND orderr.Pid = post.id
										ORDER BY orderr.id DESC ";

$result_ShowOrder = mysqli_query($con,$sql_ShowOrder);

$result_Comment = mysqli_query($con,$sql_Comment);
$result_ItemCart = mysqli_query($con,$sql_ItemCart);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css?ts=<?=time()?>">
	<style>
	
	#Container .mix{ display: none;}

	</style>
</head>
<body>


		<nav class="navbar navbar-dark bg-dark navbar-expand-lg mt-5 stickyBar">

							<span class="headerName text-uppercase font-weight-bold"> <?php  
											echo $_SESSION['name'];
										?></span>
										    <ul class="navbar-nav">

<li class="nav-item dropdown mt-1">
	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<?php
		if ($_SESSION['role'] == 'admin') {
			echo "<i class='fas fa-desktop'></i>";
		}
		else {
			echo "<i class='fas fa-desktop'></i>";
		}

?>
	</a>
	<div class="dropdown-menu mt-1" aria-labelledby="navbarDropdown">

<?php
		if ($_SESSION['role'] == 'admin') {
			echo "  <a class='dropdown-item' href='modify.php'>Modify workers</a>
					<a class='dropdown-item' href='#'>Another action</a>";
		}
		else {
			echo "  <a class='dropdown-item' href='modifyPost.php'>Modify posts</a>
					<a class='dropdown-item' href='comment.php'>View comments</a>";
		}

?>

	</div>
</li>
</ul>

<a href="orderPage.php" class="starIcon">
	<i class="fas fa-star"></i>
</a>

  <a class="navbar-brand headerBrand" href="home.php">Antiques&House</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">


  </div>
  


</nav>


	<div class="container">

				<div class="message">

<?php
		if (isset($_GET['sucsses'])) {

	echo "<div class='alert alert-success text-center mt-5 mx-auto w-25' role='alert'>

									". $_GET['sucsses']."
												
	</div>";
		}
?>

</div>		


<button type="button" class="btn btn-info" onclick="confirmeReadOrder()">Read All</button>

<br>
<br>

<table class="table">
  <thead>
    <tr>
			<th scope="col"> </th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Image</th>
			<th scope="col">Title</th>
			<th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>

	  <?php
	  $i=0;
	  while ($row = mysqli_fetch_array($result_ShowOrder)) {
		?>
	  
    <tr>
	
		<td style="font-size: 12px;"><?php if($row['status'] == '2') echo "<i class='fas fa-circle text-primary hideIconOrder' data='disIcon'></i>"; ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['email'] ?></td>
			<td><img src="savedImg/<?php echo $row['image'] ?>" class="" style="width: 300px; height: 200px;"></td>
			<td><?php echo $row['title'] ?></td>
			<td><?php echo $row['price'] ?></td>
	  
    </tr>

	<?php
	  }
	?>

  </tbody>
</table>



					</div>
<script
  src="https://code.jquery.com/jquery-3.1.0.js"
  integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="js/frames/jquery.mixitup.js"></script>
<script type="text/javascript" src="js/script.js?ts=<?=time()?>"></script>
</body>
</html>
