<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");


$color = "white";
$border = '1px solid';
$grow = 200;
$Techcolor = "#90bc00";
$Codingcolor = "#61bfb1";
$Graphicscolor = "#fb885c";

$Lerpcolor= dechex(rand(0x000000, 0xFFFFFF));
$Chosencolor= "#80dfd6";
$Welcome_image="https://www.xmple.com/wallpaper/gradient-yellow-blue-linear-1920x1080-c2-ffff00-00bfff-a-330-f-14.svg";

?>
#blurgrad{
  background-image:url("<?=$Welcome_image?>");
}
.widthscale{
  width:85%;
}
.spantext{
   font-family: 'Roboto', sans-serif;
   color: #e0e0e0;
   font-size:36px;
   padding:0px;
}
.openIndicator1{
  width:20px;
  display:inline-block;
  height:20px;
  border-radius:100%;
  background-color:green;
}
.closedIndicator{
   width:20px;
   display:inline-block;
  height:20px;
  border-radius:100%;
  background-color:red;
}
#dogitars{
  margin:auto; 
  text-align:center;
   width:60%;
}
#imgholder{
  text-align:center; margin:auto; width:80%;
}
.imgbox{

  width:220px;
  height:220px;
  background:red;
  background-size: auto 100%;
    background-repeat: repeat;
  background-image: url("https://wagwalking.com/img/home/product-screen-2.png");

}
#yourdog{
  background-image: url("data:image/jpeg;base64,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");
   
}
#dog1{
  background-image: url("data:image/jpeg;base64,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");
    }
    #dog2{
    background-image:url("http://i1379.photobucket.com/albums/ah149/Carlgordon64/hearticon_zps5dt9u46c.png");
   }
    #dog3{
  background-image: url("data:image/jpeg;base64,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");
    }
    #dog4{
    background-image:url("http://www.scriptsplus.com/sites/all/themes/bartik/images/petSuppliesIcon.png");
  }
.dogitar{
    background-position:50% 50%; 
    background-repeat: no-repeat;
    background-size: 250px;
  background-color: #fff;
  width: 250px;
  height: 250px;
  border-radius: 100%;
  border:4px solid #f0f0f0;
  margin: auto;

  text-align: center;
}
.dogicon{
    background-position:50% 50%; 
    background-repeat: no-repeat;
    background-size: 120px;
  background-color: #fff;
  width: 120px;
  height: 120px;
  border-radius: 100%;
  border:4px solid #f0f0f0;
  margin: auto;
  text-align: center;
}
.step{
  background-color:#fff
  padding:20px;
  font-size:18px;
  font-family: 'Roboto', sans-serif;
}
.step div{
  padding:50px;
}
#welcometint{

  width:100%; height:auto; margin-top:0px; background-color:rgba(0,0,0,0.3);
}
#welcometint2{

  width:100%; height:auto; margin-top:0px; background-color:rgba(0,0,0,0.0);
}

#jamesjean{

    background-image: url("<?=$Welcome_image?>");
    background-size: auto 100%;
    background-repeat: repeat;

background-position: center;

  }

.landpad{
	padding:20px;
}
.landpad p{
	color:white;
	font-size:20px;
}
.stylebreak{
transition:0.8s ease all;
	width:100%;
	height:20px;
	opacity:0.5;
}
#paintTech{
	background-color: <?=$Techcolor?>;
  font-family: 'Raleway', sans-serif;
  font-size:20px;
}
#paintGraphics{
	background-color: <?=$Graphicscolor?>;
  font-family: 'Raleway', sans-serif;
  font-size:20px;
}
#paintCoding{
	background-color: <?=$Codingcolor?>;
  font-family: 'Raleway', sans-serif;
  font-size:20px;
}
.instylesmall{
 font-family: 'Roboto', sans-serif;
 width:100%;
 background-color: rgba(128,195,66,0);
 border: 2px solid transparent;
 text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
  font-size: 18px;
min-height:50px;
max-height:70px;
  color: #fff;
padding: 20px;
border-radius: 0px;
}
.instyle{
 font-family: 'Roboto', sans-serif;
 width:100%;
 background-color: rgba(128,195,66,0.9);
 border: 2px solid transparent;
 text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
	font-size: 18px;
min-height:50px;
max-height:70px;
	color: #fff;
padding: 20px;
border-radius: 0px;
}
.instyle:hover{

background-color: rgba(255,223,0,0.9);
color: #fff;
transition:0.5s ease all;
}
#branded{
  
   font-family: 'Rajdhani', sans-serif;


}
.boom{
transition:0.5s ease all;
	background-color:<?=$color?>;
	padding: 0px;
text-align: center;
height: 350px;
min-height: 300px;
overflow: scroll;
}
#shadowed{
  
  text-shadow: 6px 8px 4px rgba(0,0,0,0.9);
}
.Techfancy{
  opacity: 0.8;

text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
  color: #eeeeee;
  padding: 5px;
  background-color:  <?=$Techcolor?>;
   border-top-right-radius: 10px;
  border-top-left-radius: 10px;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
text-align: center;
   font-family: 'Raleway', sans-serif;
}
.Graphicsfancy{
  opacity: 0.8;

text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
  color: #eeeeee;
  padding: 5px;
  background-color: <?=$Graphicscolor?>;
   border-top-right-radius: 10px;
  border-top-left-radius: 10px;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
text-align: center;
   font-family: 'Raleway', sans-serif;
}
.Codingfancy{
  opacity: 0.8;

text-shadow: 2px 4px 3px rgba(0,0,0,0.3);
  color: #eeeeee;
  padding: 5px;
  background-color: <?=$Codingcolor?>;
  border-top-right-radius: 10px;
  border-top-left-radius: 10px;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
text-align: center;
   font-family: 'Raleway', sans-serif;
}
.Techbreaker{
  width: 100%;
  height: 2px;
  margin-top: 0px;
  margin-bottom: 2px;
  background-color:<?=$Techcolor?>;
}
.Codingbreaker{
  width: 100%;
  height: 2px;
  margin-top: 0px;
  margin-bottom: 2px;
  background-color: <?=$Codingcolor?>;
}
.Graphicsbreaker{
  width: 100%;
  height: 2px;
  margin-top: 0px;
  margin-bottom: 2px;
  background-color: <?=$Graphicscolor?>;
}
.button.tech:active,
.button.tech.is-checked,
.button.tech.is-selected {
  transition:1s ease all;
  border-bottom: 4px solid <?=$Techcolor?>;
}
.button.all:active,
.button.all.is-checked,
.button.all.is-selected {
  transition:1s ease all;
  border-bottom: 4px solid;
    border-image: url("http://i1379.photobucket.com/albums/ah149/Carlgordon64/all_border_zps8iptlfta.png?t=1466567125") 1 stretch repeat;

}
.button.coding:active,
.button.coding.is-checked,
.button.coding.is-selected {
  transition:1s ease all;
  border-bottom: 4px solid <?=$Codingcolor?>;
}
.button.graphics:active,
.button.graphics.is-checked,
.button.graphics.is-selected {
  transition:1s ease all;
  border-bottom: 4px solid <?=$Graphicscolor?>;
}
.bigwell{
	text-align:left;
	 font-size: 16px;
   font-family: 'Roboto', sans-serif;
   font-weight: 300;
  height: auto;
  color: #000;
  margin-left: 0px;
  margin-right: 0px;
  position: inherit;
  width: 100%;
  padding: 50px;
  padding-left:10px;
  background-color: rgba(255,255,255,0.3);
}
.statusAvailable{
	background-color:green;
	margin-top:-10px;
	width:15px;
	height:15px;
	border-radius:100%;
}
.statusBusy{
	background-color:yellow;
	margin-top:-10px;
	width:15px;
	height:15px;
	border-radius:100%;
}
.statusUnavailable{
	background-color:red;
	margin-top:-10px;
	width:15px;
	height:15px;
	border-radius:100%;
}
.boost{
	
		background-color: #454545;
	color: white;
	width: 100%;
  max-height: 1200px;
	height: auto;
	overflow: scroll;
	margin-left: 0px;
	margin-right: 0px;
	margin-top: 5px;

		border-bottom-right-radius: 0px;
  		border-bottom-left-radius: 0px;
}
.instyled{
background-color: rgba(0,0,0,0.3);;
 font-family: 'Roboto', sans-serif;
 overflow:hidden;
 width: 100%;
 text-transform: uppercase;
 border: 2px solid transparent;
  font-size: 18px;
  margin-top: 0px;
  min-height: 350px;
  color: #fff;
padding: 20px;
border-radius: 0px;
}
/*medium to large*/
  @media screen and (min-width: 767px) {
  .landpad{
padding:0px;
  }
#move{
  margin-top: 130px;
  padding-right: 20px;
}
#move2{
  margin-top: 100px;
}

}

/*small*/
@media screen and (max-width: 767px) {
.dogitar{
    background-position:50% 50%; 
    background-repeat: no-repeat;
    background-size: 200px;
  width: 200px;
  height: 200px;

  text-align: center;
}
.widthscale{
  width:100%;
}
#imgholder{
  text-align:center; margin:auto; width:100%;
}
.imgbox{
width:100%;
height:486px;
}
#jamesjean{
background-position:10 50;
    background-size: auto 100%;
  }
.dogicon{
    background-size: 100px;
  width: 100px;
  height: 100px;
}
#dogitars{
  margin:auto; 
  text-align:center;
   width:80%;
}
#welcometint{

  width:100%; min-height:340px; margin-top:0px; background-color:rgba(0,0,0,0.5);
}
.step div{
  padding:30px;
}
#move2{
margin-top: 100px;
}
#move{
  margin-top: -20px;
}

 .landpad{
padding:0px;
  }
  .bigwell{
  text-align:center;
  padding:20px;
  padding-top:0px;
  }
}
@media screen and (max-width: 450px) {

#dogitars{
  margin:auto; 
  text-align:center;
   width:100%;
}
.dogicon{
    background-size: 80px;
  width: 80px;
  height: 80px;
}
}


                       