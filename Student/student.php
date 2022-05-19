<!DOCTYPE html>
<html>

<head>
	<title>Semantic UI Sidebar Types</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
	<link href=
"https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
		rel="stylesheet" />

	<script src=
"https://code.jquery.com/jquery-3.1.1.min.js"
			integrity=
"sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
			crossorigin="anonymous">
	</script>
	<script src=
        "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js">
	</script>
    <link rel="stylesheet" href="student.css">
</head>

<body>
	<div class="ui sidebar vertical left inverted menu">
		<a class="item">Web Development</a>
		<a class="item">Machine Learning</a>
		<a class="item">Data Science</a>
		<a class="item">Blockchain</a>
	</div>
	<div class="ui basic icon top fixed inverted menu" >
        <a id="toggle" class="item">
            <i class="sidebar icon"></i>
            Menu
        </a>
        <div class="item mid" ><h2 class="ui inverted header">Campy</h2></div>
        <div class="ui right inverted simple dropdown item">
            Dropdown
            <i class="dropdown icon"></i>
            <div class="menu">
              <div class="item"><button type="submit" id="profile">Profile</button></div>
              <div class="item">Choice 2</div>
              <div class="item">Choice 3</div>
              <div class="item">Choice 3</div>
            </div>
        </div>
    </div>

    <div class="pusher">
        <div class="ui_container" style="padding-top: 100px;">
            <!-- put everything here -->
            
        </div>
    </div>
    
    

	<script>
        $("#toggle").click(function(){
            $('.ui.sidebar').sidebar('toggle');
        });
        document.querySelector('#profile').addEventListener(
            'click', () => {
                fetch('http://localhost/Campy_Anamul/Student/student_back.php')
                .then(res => res.json())
                .then(data => {
                    let html = "";
                   
					html += data.content;
					
                    console.log(html)
                    document.querySelector(".ui_container").innerHTML = html;
                })
            }
        );
	</script>
</body>
</html>