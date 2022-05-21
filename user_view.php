<?php session_start(); ?>

<?php
require 'Campy_Amit\attached.php';

// dummy value
$user_id = $_SESSION["ID"] or header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Campy</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js">
	</script>

	<link rel="stylesheet" href="Campy_Amit\css\btn_design.css">
	<link rel="stylesheet" href="Campy_Amit\css\user_view.css">
</head>


<body>
	<div class="ui sidebar vertical left inverted menu">
		<!-- view pending requests -->
		<a class="item">
			<form class="" action="" method="post">
				<button type="submit" name="view_request">Requests</button>
			</form>
		</a>

		<!-- Manage Courses -->
		<a class="item">
			<form action="" method="post">
				<button type="submit" name="manage_courses">Courses</button>
			</form>
		</a>

		<!-- View Students -->
		<a class="item">
			<form action="" method="post">
				<button type="submit" name="view_participants">
					<i class="users icon"></i>
					participants
				</button>
			</form>
		</a>

		<!-- view submission -->
		<a class="item">
			<form action="" method="post">
				<button type="submit" name="view_submission">
					submission
				</button>
			</form>
		</a>
	</div>

	<div class="pusher">
		<div class="ui basic icon top fixed inverted menu">
			<a id="toggle" class="item">
				<i class="sidebar icon"></i>
				Menu
			</a>
			<div class="item mid">
				<h2 class="ui inverted header"><a href="">Campy</a></h2>
			</div>
			<div class="item mid">
				<!-- search bar -->
				<form action="" method="post">
					<div class="ui mini search">
						<div class="ui icon input">
							<input class="prompt" id="search" type="text" placeholder="Search by tag ..." name="search_tag">
							<i class="search icon"></i>
						</div>
						<div class="results"></div>
					</div>
				</form>
				<!-- search bar end -->

			</div>

			<div class="right menu">
				<!-- notification -->
				<div class="ui right simple dropdown item">
					<i class="bell icon"></i>
					<i class="dropdown icon"></i>

					<div class="menu" id="notification"></div>
				</div>

				<!-- Profile -->
				<div class="ui right simple dropdown item">
					<i class="user secret icon"></i>
					<i class="dropdown icon"></i>
					<div class="menu">
						<!-- put options here -->
						<div class="item">
							<form class="" action="" method="post">
								<input type="hidden" name="user_id" value="<?php echo "$user_id"; ?>">
								<button type="submit" name="view_profile">
									<i class="user icon"></i>
									profile
								</button>
							</form>
						</div>

						<div class="item">
							<form class="" action="" method="post">
								<button type="submit" name="logout">
									<i class="power off icon"></i>
									log out
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="ui container" style="padding-top: 100px;">
			<div class="ghostbuster">
				<!-- for log out -->
				<?php if (isset($_POST['logout'])) {
					// redirect to this location
					session_destroy();
					header("Location: index.php");
				} ?>

				<!-- for searching by tag -->
				<?php if (isset($_POST['search_tag'])) {
					$keyword = $_POST['search_tag'];
					search($keyword);
				} ?>

				<!-- end -->


				<!-- for view req. -->
				<?php if (isset($_POST['view_request'])) {
					readPendingRequestCourses();
				}

				if (isset($_POST['view_request_student'])) {
					readRequestStudent();
				}

				if (isset($_POST['accept'])) {
					acceptRequest();
				}

				if (isset($_POST['reject'])) {
					rejectRequest();
				}

				?>

				<!-- end -->

				<!-- for teacher add/remove course -->
				<?php if (isset($_POST['manage_courses'])) {
					view_courses();
				} ?>

				<!-- called from seeAvailableOptions.php -->
				<?php if (isset($_POST['view_enrolled_courses'])) {
					view_enrolled_courses($user_id);
				} ?>

				<!-- called from seeAvailableOptions.php -->
				<?php if (isset($_POST['view_unenrolled_courses'])) {
					view_unenrolled_courses($user_id);
				} ?>

				<?php if (isset($_POST['enroll_course'])) {
					$user_id = $_POST['user_id'];
					$course_id = $_POST['course_id'];

					Teacher_addCourseForm($user_id, $course_id);
				} ?>

				<?php if (isset($_POST['submitFromTeacher_addCourseForm'])) {
					Teacher_addCourse();
				} ?>

				<?php if (isset($_POST['unenroll_course'])) {
					Teacher_removeCourse();
				} ?>

				<!-- end -->

				<!-- for view Students -->
				<?php if (isset($_POST['view_participants'])) {
					view_courses_fromParticipants($user_id);
				} ?>

				<?php if (isset($_POST['view_participants_list'])) {
					view_participants_list();
				} ?>

				<?php if (isset($_POST['removeStudent'])) {
					removeStudent();
				} ?>
				<!-- end -->

				<!-- for adjusting profile -->
				<?php if (isset($_POST['view_profile'])) {
					readProfile();
				} ?>

				<?php if (isset($_POST['saveWorkProfile'])) {
					saveWorkProfile();
				} ?>
				<!-- end -->

				<!--  -->
				<?php if (isset($_POST['view_submission'])) {
					view_courses_fromSubmission();
				} ?>

				<?php if (isset($_POST['view_submission_list'])) {
					getStudentProjectList();
				} ?>

				<!-- end -->
			</div>
		</div>
	</div>

	<script src="user_view.js"></script>

	<script>
		$("#toggle").click(() => {
			$('.ui.sidebar').sidebar('toggle');
		});

		fetch("http://localhost/Campy_Amit/search_engine/getTagList.php")
			.then(response => response.json())
			.then(data => {
				let tagList = [];
				for (let i = 0; i < data.content.length; i++) {
					tagList.push({
						title: data.content[i]
					})
				}

				$('.ui.mini.search')
					.search({
						source: tagList
					});
			});
	</script>
</body>

</html>