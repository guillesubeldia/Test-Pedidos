<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>simple error 404</title>


  <link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

      <style type="text/css">
			@import url(https://fonts.googleapis.com/css?family=Oswald);


body
{
   font-family: 'Oswald', sans-serif;
   margin:0px;

  background-color:rgba(30, 127, 203,0.8);
  color:white;
}

h1
{
  font-size:150px;

  text-shadow:-5px 0px 6px rgba(255,255,255,0.6),-5px 0px rgba(0,0,0,0.6);

  letter-spacing:8px;
  text-align:center;
}

h1 span
{
    /* Chrome, Safari, Opera */
    -webkit-animation-name: animRotate;
    -webkit-animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-delay: 1s;
    -webkit-animation-direction:normal;
    -webkit-animation-iteration-count: infinite;
    -webkit-animation-play-state: running;
    /* Standard syntax */
    animation-name: animRotate;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-delay: 1s;
    animation-direction:normal;
    animation-iteration-count: infinite;
    animation-play-state: running;
}

/* Animation */

@keyframes animRotate
{
  to{
    transform:rotate3d(0,1,0,360deg);
  }
}

@-webkit-keyframes animRotate
{
  to{
    transform:rotate3d(0,1,0,360deg);
  }
}

div
{
  width:100%;
  text-align:center;
  position:relative;

  font-size:20px;
  margin-left:10px;
  letter-spacing:8px;
  top:-130px;
}


			</style>


</head>

<body>

<h1>4<span>0</span>4</h1>
<div id='FNF'>Archivo no encontrado</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

<script>
$(function(){
  $('h1').toggle();
  $('h1').delay(1000).toggle('Drop');//Effect at the begining
});
</script>
</body>
</html>
