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
    <link rel="stylesheet" href="base_designcss.css">
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
        <div class="ui container" style="padding-top: 100px;">
            <!-- put everything here -->
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis sed ducimus quam optio officiis neque veritatis ipsa, soluta asperiores nisi quae consequuntur aspernatur autem maiores magnam sint debitis fuga dolores!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis dolores, aspernatur deserunt ducimus eius excepturi necessitatibus amet totam nesciunt eaque sint, nostrum delectus est quisquam, sapiente illum officia quod voluptates?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quaerat sed, eum voluptate magni non excepturi quod ipsum incidunt? Expedita, maiores. Ullam repudiandae asperiores itaque odio explicabo quia animi reiciendis?
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas, magnam? Esse recusandae velit quo numquam et. Iusto labore dolores officiis nisi ipsam libero quos voluptates dolore ducimus odio. Minus, quasi!
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptates mollitia a atque nihil, consectetur modi laudantium ratione deleniti blanditiis laborum voluptatibus delectus, sit porro recusandae sint vitae deserunt, similique suscipit.
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia expedita magnam aliquid enim, laborum impedit. Excepturi architecto sapiente quos consectetur. Animi vitae inventore iure mollitia modi quaerat facilis obcaecati voluptate.
        </div>
    </div>
    
    

	<script>
        $("#toggle").click(function(){
            $('.ui.sidebar').sidebar('toggle');
        });
		
	</script>
</body>
</html>