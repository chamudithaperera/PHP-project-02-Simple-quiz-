<?php
include('database.php');
session_start();

if (isset($_POST['log'])) {
  $name = $_POST['username'];
  $name = stripslashes($name);
  $name = addslashes($name);

  $email = $_POST['email'];
  $email = stripslashes($email);
  $email = addslashes($email);

  $college = $_POST['college'];

  $password = $_POST['password'];
  $password = stripslashes($password);
  $password = addslashes($password);

  $sql = "select email from users where email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo "<h3><script>alert('Already registerd email');</script><h3>";
    header('refresh:0;url=Register.php');
  } else {
    $sql = "insert into users (name, college,email,password) values ('$name','$college','$email','$password')";
    if ((mysqli_query($conn, $sql)))
      echo "<h3><script>Successfully Registered</script></h3>";
    header('location:Login.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Design by foolishdeveloper.com -->
  <title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="./css/Signin.css">
</head>

<body>
  <canvas></canvas>
  <script>
    const STAR_COLOR = '#fff';
    const STAR_SIZE = 3;
    const STAR_MIN_SCALE = 0.2;
    const OVERFLOW_THRESHOLD = 50;
    const STAR_COUNT = (window.innerWidth + window.innerHeight) / 8;

    const canvas = document.querySelector('canvas'),
      context = canvas.getContext('2d');

    let scale = 1, // device pixel ratio
      width,
      height;

    let stars = [];

    let pointerX,
      pointerY;

    let velocity = { x: 0, y: 0, tx: 0, ty: 0, z: 0.0005 };

    let touchInput = false;

    generate();
    resize();
    step();

    window.onresize = resize;
    canvas.onmousemove = onMouseMove;
    canvas.ontouchmove = onTouchMove;
    canvas.ontouchend = onMouseLeave;
    document.onmouseleave = onMouseLeave;

    function generate() {

      for (let i = 0; i < STAR_COUNT; i++) {
        stars.push({
          x: 0,
          y: 0,
          z: STAR_MIN_SCALE + Math.random() * (1 - STAR_MIN_SCALE)
        });

      }

    }

    function placeStar(star) {

      star.x = Math.random() * width;
      star.y = Math.random() * height;

    }

    function recycleStar(star) {

      let direction = 'z';

      let vx = Math.abs(velocity.x),
        vy = Math.abs(velocity.y);

      if (vx > 1 || vy > 1) {
        let axis;

        if (vx > vy) {
          axis = Math.random() < vx / (vx + vy) ? 'h' : 'v';
        } else {
          axis = Math.random() < vy / (vx + vy) ? 'v' : 'h';
        }

        if (axis === 'h') {
          direction = velocity.x > 0 ? 'l' : 'r';
        } else {
          direction = velocity.y > 0 ? 't' : 'b';
        }
      }

      star.z = STAR_MIN_SCALE + Math.random() * (1 - STAR_MIN_SCALE);

      if (direction === 'z') {
        star.z = 0.1;
        star.x = Math.random() * width;
        star.y = Math.random() * height;
      } else
        if (direction === 'l') {
          star.x = -OVERFLOW_THRESHOLD;
          star.y = height * Math.random();
        } else
          if (direction === 'r') {
            star.x = width + OVERFLOW_THRESHOLD;
            star.y = height * Math.random();
          } else
            if (direction === 't') {
              star.x = width * Math.random();
              star.y = -OVERFLOW_THRESHOLD;
            } else
              if (direction === 'b') {
                star.x = width * Math.random();
                star.y = height + OVERFLOW_THRESHOLD;
              }

    }

    function resize() {

      scale = window.devicePixelRatio || 1;

      width = window.innerWidth * scale;
      height = window.innerHeight * scale;

      canvas.width = width;
      canvas.height = height;

      stars.forEach(placeStar);

    }

    function step() {

      context.clearRect(0, 0, width, height);

      update();
      render();

      requestAnimationFrame(step);

    }

    function update() {

      velocity.tx *= 0.5;
      velocity.ty *= 0.5;

      velocity.x += (velocity.tx - velocity.x) * 0.8;
      velocity.y += (velocity.ty - velocity.y) * 0.8;

      stars.forEach(star => {

        star.x += velocity.x * star.z;
        star.y += velocity.y * star.z;

        star.x += (star.x - width / 2) * velocity.z * star.z;
        star.y += (star.y - height / 2) * velocity.z * star.z;
        star.z += velocity.z;

        // recycle when out of bounds
        if (star.x < -OVERFLOW_THRESHOLD || star.x > width + OVERFLOW_THRESHOLD || star.y < -OVERFLOW_THRESHOLD || star.y > height + OVERFLOW_THRESHOLD) {
          recycleStar(star);
        }

      });

    }

    function render() {

      stars.forEach(star => {

        context.beginPath();
        context.lineCap = 'round';
        context.lineWidth = STAR_SIZE * star.z * scale;
        context.globalAlpha = 0.5 + 0.5 * Math.random();
        context.strokeStyle = STAR_COLOR;

        context.beginPath();
        context.moveTo(star.x, star.y);

        var tailX = velocity.x * 2,
          tailY = velocity.y * 2;

        // stroke() wont work on an invisible line
        if (Math.abs(tailX) < 0.1) tailX = 0.5;
        if (Math.abs(tailY) < 0.1) tailY = 0.5;

        context.lineTo(star.x + tailX, star.y + tailY);

        context.stroke();

      });

    }

    function movePointer(x, y) {

      if (typeof pointerX === 'number' && typeof pointerY === 'number') {

        let ox = x - pointerX,
          oy = y - pointerY;

        velocity.tx = velocity.tx + ox / 8 * scale * (touchInput ? 1 : -1);
        velocity.ty = velocity.ty + oy / 8 * scale * (touchInput ? 1 : -1);

      }

      pointerX = x;
      pointerY = y;

    }

    function onMouseMove(event) {

      touchInput = false;

      movePointer(event.clientX, event.clientY);

    }

    function onTouchMove(event) {

      touchInput = true;

      movePointer(event.touches[0].clientX, event.touches[0].clientY, true);

      event.preventDefault();

    }

    function onMouseLeave() {

      pointerX = null;
      pointerY = null;

    }
  </script>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form method="post" action="register.php" enctype="multipart/form-data">
    <h3><span class="lable">Sign up</span> Here</h3>

    <label for="username">Username</label>
    <input type="text" placeholder="Username" id="username" name="username">

    <label for="Email">Email</label>
    <input type="text" placeholder="Email " id="username" name="email">

    <label for="College">College</label>
    <input type="text" placeholder="College " id="username" name="college">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password">

    <button class="pushable" name="log">
      <span class="shadow"></span>
      <span class="edge"></span>
      <span class="front">
        Sign in
      </span>
    </button>
    <label style="font-size:9pt;text-align:center;">Already have an account?<a href="Login.php"
        style="color:aqua;">Login</a> here</label>
  </form>
</body>

</html>