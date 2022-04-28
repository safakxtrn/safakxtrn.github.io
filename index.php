<?php 
	session_start();
		
	if (isset($_POST["input_email"])){	//	E-mail adresinden başlayarak girilen veriler değerlendiriliyor.
	
		

		$name=$_POST["input_name"];
		$profession=$_POST["input_profession"];
		$code = $_POST["input_country_code"];
		$mobile=$_POST["input_mobile"];
		$email=$_POST["input_email"];
		$message=trim($_POST["input_message"]);
		
		$errorMessage = "Please check the inputs.";
		
		$data = array("email"=>$email,"name"=>$name, "mobile"=>$mobile, "message"=>$message, "profession"=>$profession, "code"=>$code);
		
		$_SESSION['data'] = $data;
		
		if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])){	//	Recaptcha check ediliyor.
				$errorMessage = "Please check the recaptcha.";
				
		} else{
			
			$result = reCaptcha($_POST['g-recaptcha-response']);
			if($result['success'] == 1){
				if($name!="" and $mobile!="" and $email!=""){
					//$to = "<mimselinkucuk@gmail.com>";
					$to = "<safakturan.trn@gmail.com>";
					//$to = "<tajesoj747@viemery.com>";
					//$to = "<sahinal16@itu.edu.tr>";
					$subject = "From FieldTech Web Site";
					$messages = "<div style='font-weight: bold'>Name: </div>".$name."\r\n"."<div style='font-weight: bold'>Profession: </div>".$profession."\r\n"."<div style='font-weight: bold'>Mobile: </div>".$code.$mobile."\r\n"."<div style='font-weight: bold'>E-mail: </div>".$email."\r\n"."<div style='font-weight: bold'>Message: </div>".$message;
					$header = "From: ".$name."<".$email.">\r\n";
					$header .= "Reply-to : reply@fieldtech.com\r\n";
					$header .= "Content-type: text/html; charset=utf-8\r\n";
					
					$success = mail($to,$subject,$messages,$header,'-fwebmaster@example.com');
					echo $success;
					// if(mail($to,$subject,$messages,$header)){	//	Mail fonksiyonu çağırılıyor.
					// 	$errorMessage = "Dear ".$name." we will respond your message as soon as possible. Thank you!";
					// 	$_SESSION['data'] = null;
					// 	session_unset();
					// 	session_destroy();
					// 	if(isset($_SESSION['data'])){
					// 		$email = $_SESSION['data']['email'];
					// 		$name = $_SESSION['data']['name'];
					// 		$mobile = $_SESSION['data']['mobile'];
					// 		$message = $_SESSION['data']['message'];
					// 		$profession = $_SESSION['data']['profession'];
					// 		$code = $_SESSION['data']['code'];
					// 	}else{
							
					// 		$email ='';
					// 		$name ='';
					// 		$mobile ='';
					// 		$message ='';
					// 		$profession='';
					// 		$code = '';
					// 	}
					// }else {
					// 	$errorMessage = "Something went wrong.";
					// }
				}
			}
		}
		
		echo "<script type='text/javascript'>alert('".$errorMessage."');</script>";
	}
	
		
	function setValues(){	//	Bir önceki işlemin girdileri değişkenlerde tutuluyor.
		if(isset($_SESSION['data'])){
			$email = $_SESSION['data']['email'];
			$name = $_SESSION['data']['name'];
			$mobile = $_SESSION['data']['mobile'];
			$message = $_SESSION['data']['message'];
			$profession = $_SESSION['data']['profession'];
			$code = $_SESSION['data']['code'];
		}else{
			$email ='';
			$name ='';
			$mobile ='';
			$message ='';
			$profession='';
			$code = '';
		}
	}

	function reCaptcha($response){	//	Google recaptcha fonksiyonu.
		$fields=[
			'secret' => '6Lfz1GEaAAAAABv0yydnrQGNiDmK_CJtldFb8dJb',
			'response' =>$response
		];
		
		$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
		curl_setopt_array($ch, [
			CURLOPT_POST => true, 
			CURLOPT_POSTFIELDS => 
			http_build_query($fields), 
			CURLOPT_RETURNTRANSFER => true
			]);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result, true);
	}
?>

<html>

	

    <head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-EX095HJFBD"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-EX095HJFBD');
	</script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		
		<link rel="icon" href="images/fieldtech_logo.png" sizes="16x16" type="image/png">

        <link href="css/hexagonTeam.css" rel="stylesheet" type="text/css" />
        <link href="css/styleTeam.css" rel="stylesheet" type="text/css" />
        <link href="css/mediaTeam.css" rel="stylesheet" type="text/css" />

        <link href="css/styleTotal.css" rel="stylesheet" type="text/css" />

        <link href="css/hexagonMain.css" rel="stylesheet" type="text/css" />
        <link href="css/styleMain.css" rel="stylesheet" type="text/css" />
        

        <link href="css/mediaTotal.css" rel="stylesheet" type="text/css" />
        <link href="css/styleTopMenu.css" rel="stylesheet" type="text/css" />
		
		<link href="css/hexagonNew.css" rel="stylesheet" type="text/css" />
		<link href="css/popup.css" rel="stylesheet" type="text/css" />

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,300,200,100,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script>
		
            function resizeEvent(){	//	Pencere boyutu değişince çalışacak fonksiyon.
				checkParentRecaptcha();
                if(document.body.clientWidth<970){
                    document.getElementById("upText").style.marginLeft="58.5%";
				}

                else if(document.body.clientWidth<1050){
                    document.getElementById("upText").style.marginLeft="58%";
				}
					

                else if(document.body.clientWidth<1100)
                    document.getElementById("upText").style.marginLeft="57.5%";

                else if(document.body.clientWidth<1150)
                    document.getElementById("upText").style.marginLeft="57%";
                
                else if(document.body.clientWidth<1200)
                    document.getElementById("upText").style.marginLeft="56.5%";

                else if(document.body.clientWidth<1250)
                    document.getElementById("upText").style.marginLeft="56.4%";
                
                else if(document.body.clientWidth<1300)
                    document.getElementById("upText").style.marginLeft="56%";
            }
			
			function checkParentRecaptcha(){	//	Google recaptcha'nın parent div'i düzenleniyor.
				if(window.innerWidth < 1021){
					document.getElementById("parent-recaptcha").style.gridTemplateColumns = "auto 304px 90px 60px auto";
				} else {
					document.getElementById("parent-recaptcha").style.gridTemplateColumns = "auto 304px 90px 60px 0";
				}
			}
			
            function bodyOnLoad(){	//	Sayfa yüklendiğinde çalışacak olan fonksiyon.
				
				hideHex(5);
				checkParentRecaptcha();
				
				<?php echo setValues();?>
				

                if(document.body.clientWidth<1000)
                    document.getElementById("upText").style.marginLeft="58.5%";

                else if(document.body.clientWidth<1050)
                    document.getElementById("upText").style.marginLeft="58%";

                else if(document.body.clientWidth<1100)
                    document.getElementById("upText").style.marginLeft="57.5%";

                else if(document.body.clientWidth<1150)
                    document.getElementById("upText").style.marginLeft="57%";
                
                else if(document.body.clientWidth<1200)
                    document.getElementById("upText").style.marginLeft="56.5%";

                else if(document.body.clientWidth<1250)
                    document.getElementById("upText").style.marginLeft="56.4%";
                
                else if(document.body.clientWidth<1300)
                    document.getElementById("upText").style.marginLeft="56%";
            }
			
            window.smoothScroll = function (target) {	//	ID'si gönderilen tag'in bulunduğu konuma scroll ediyor.
                    var scrollContainer = target;
                    do { //find scroll container
                        scrollContainer = scrollContainer.parentNode;
                        if (!scrollContainer) return;
                        scrollContainer.scrollTop += 1;
                    } while (scrollContainer.scrollTop == 0);

                    var targetY = 0;
                    do { //find the top of target relatively to the container
                        if (target == scrollContainer) break;
                        targetY += target.offsetTop;
                    } while (target = target.offsetParent);

                    scroll = function (c, a, b, i) {
                        i++;
                        if (i > 30) return;
                        c.scrollTop = a + (b - a) / 30 * i;
                        setTimeout(function () {
                            scroll(c, a, b, i);
                        }, 8);//Speed of scrolling : 8
                }
                    // start scrolling

                scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
            }

            function onTeam(id){	//	ID'si gönderilen tag'in arkaplan fotoğrafını değiştirip öne getiriyor.
                document.getElementById(id).style.zIndex="4";
                document.getElementById(id+"T").style.backgroundImage="url()";
                    
            }
            function outTeam(id){	//	ID'si gönderilen tag'in arkaplan fotoğrafını değiştirip arkaya gönderiyor.
                document.getElementById(id).style.zIndex="0";
                document.getElementById(id+"T").style.backgroundImage="url(images/"+id+"T.png)";
            }

            function onMain(id1, id2){	//	ID'si gönderilen tag'lerin arkaplan fotoğrafını değiştirip öne getiriyor.
                document.getElementById(id1).style.zIndex="4";
                document.getElementById(id2).style.backgroundImage="url()";
            }
            function outMain(id1, id2){	//	ID'si gönderilen tag'lerin arkaplan fotoğrafını değiştirip arkaya gönderiyor.
                document.getElementById(id1).style.zIndex="0";
                document.getElementById(id2).style.backgroundImage="url(images/"+id2+".png)";
            }
            function navClick(){	//	Üst bar'a tıklanırsa sayfayı aşağı kaydırıyor veya eski haline getiriyor.
                if(document.getElementById("tt").style.paddingTop == "185px")
                    document.getElementById("tt").style.paddingTop="15px";
                else
                    document.getElementById("tt").style.paddingTop="185px";
            }

            var d1=0, d2=0, d3=0;

            function pageClick() {	//	Üst bar'daki listeler açıksa, sayfaya tıklandığında kapatıyor.
            
                if(d1==1){
                    d1==0;
                    myFunction1();
                }
                    
                if(d2==1){
                    d2==0;
                    myFunction2();
                }
                if(d3==1){
                    d3==0;
                    myFunction3();
                }
            }

            function dropdownFunction(d){	//	Üst bar'daki açılır listelerin kapanmasını ve açılmasını sağlıyor.
                if(d==1)
                {
                    if(d2==1)
                        myFunction2();
                    if(d3==1)
                        myFunction3();
                }

                if(d==2)
                {
                    if(d1==1)
                        myFunction1();
                    if(d3==1)
                        myFunction3();
                }
                if(d==3)
                {
                    if(d1==1)
                        myFunction1();
                    if(d2==1)
                        myFunction2();
                }
            }

            function myFunction1() {	//	Üst bar'daki açılır listelerin kapanmasını ve açılmasını sağlıyor.
                document.getElementById("myDropdown1").classList.toggle("show");
                if(d1==0)
                    d1=1;
                else
                    d1=0;
                document.getElementById("myDropdown1").style.minWidth="170px";
            }

            function myFunction3() {	//	Üst bar'daki açılır listelerin kapanmasını ve açılmasını sağlıyor.
                document.getElementById("myDropdown3").classList.toggle("show");
                if(d3==0)
                    d3=1;
                else
                    d3=0;
                document.getElementById("myDropdown3").style.minWidth="170px";
            }
                    
            function myFunction2() {	//	Üst bar'daki açılır listelerin kapanmasını ve açılmasını sağlıyor.
                document.getElementById("myDropdown2").classList.toggle("show");
                if(d2==0)
                    d2=1;
                else
                    d2=0;
                document.getElementById("myDropdown2").style.minWidth="630px";

            }

            var counter=0;
            window.onclick = function(event) {	//	Sayfaya tıklanıldığının algılandığı yer.
                if(d1==1 || d2==1 || d3==1){
                    if(counter==1){
                        counter=0;
                        pageClick();
                    }
                    else
                        counter++;
                }
                else
                    counter=0;
            }
			
			function hideHex(from){	//	Team kısmındaki altıgenlerin gizlenilmesini sağlar.
				var hexElements_0 = document.getElementsByName("hex_0");
				var hexElements_1 = document.getElementsByName("hex_1");
				var hexElements_2 = document.getElementsByName("hex_2");
				
				document.getElementById("hex_hide_image").style.display = "none";
				document.getElementById("hex_show_image").style.display = "";
				
				for(var i = from;i < hexElements_0.length;i++){
					hexElements_0[i].style.display = "none";
				}
				
				for(var i = from;i < hexElements_1.length;i++){
					hexElements_1[i].style.display = "none";
				}
				
				for(var i = from;i < hexElements_2.length;i++){
					hexElements_2[i].style.display = "none";
				}
			}
			
			function hideHexWithScroll(from){	//	Team kısmındaki altıgenlerin gizlenilmesini sağlar ve scroll eder.
				hideHex(from);
				smoothScroll(document.getElementById("team"));
			}
			
			function showHex(from){	//	Team kısmındaki altıgenlerin gösterilmesini sağlar ve scroll eder.
				var hexElements_0 = document.getElementsByName("hex_0");
				var hexElements_1 = document.getElementsByName("hex_1");
				var hexElements_2 = document.getElementsByName("hex_2");
				
				document.getElementById("hex_hide_image").style.display = "";
				document.getElementById("hex_show_image").style.display = "none";
				
				for(var i = from;i < hexElements_0.length;i++){
					hexElements_0[i].style.display = "";
				}
				
				for(var i = from;i < hexElements_1.length;i++){
					hexElements_1[i].style.display = "";
				}
				
				for(var i = from;i < hexElements_2.length;i++){
					hexElements_2[i].style.display = "";
				}
				
				smoothScroll(document.getElementById("img24T"));
			}

			function popUpSubmit(){

				var username = document.getElementById("usernamepopup").value;
				var password = document.getElementById("passwordpopup").value;
				if(username == "FieldTech" && password =="123123")
				{
					document.getElementById("show-popup").checked = false;
					window.location.href = "http://www.fieldtech.com.tr/FieldCAD.rar";
					return false;
				}
				else
				{
					alert("Username or password is wrong.");
				}

				
			}
                
        </script>
        <title>FieldTech Engineering</title>
    </head>
    <body onresize="resizeEvent();" onload="bodyOnLoad();" style="font-family: Arial, Helvetica, sans-serif; min-width: 800px;"> 
        
        
        <div id="link-top"></div>	<!--	Scroll için link.	-->
        <div id="top">	<!--	Mobile ve PC için bar ve menülerin bulunduğu kısım.	-->
            <div class="navDiv">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button onclick='navClick();' class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div style="color: #038ed1;" style="font-family: Arial, Helvetica, sans-serif;">We bring the office to the field!</div>
                    <div>
                        <div class="miniLogo" onclick="smoothScroll(document.getElementById('link-top'))" style="cursor: pointer;"></div>
                        <a class="navbar-brand" onclick="smoothScroll(document.getElementById('link-top'))" style="cursor: pointer; color: #038ed1; font-weight: bold; font-size: 12pt;">FieldTech</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <div style="color: #038ed1; cursor: pointer;" class="menu1 menu" style="margin-top: 6px; font-size: 12pt;" onclick="smoothScroll(document.getElementById('link-about'))">ABOUT</div>
                            <div style="color: #038ed1; cursor: pointer;" class="menu1 menu" style="margin-top: 6px; font-size: 12pt;" onclick="smoothScroll(document.getElementById('link-product-range'))">PRODUCTS & SOLUTIONS</div>
                            <div style="color: #038ed1; cursor: pointer;" class="menu1 menu" style="margin-top: 6px; font-size: 12pt;" onclick="smoothScroll(document.getElementById('link-services'))">SERVICES</div>
                            <div style="color: #038ed1; cursor: pointer;" class="menu1 menu" style="margin-top: 6px; font-size: 12pt;" onclick="window.open('https://fieldtechx.tumblr.com')">BLOG</div>
                            <div style="color: #038ed1; cursor: pointer;" class="menu1 menu" style="margin-top: 6px; font-size: 12pt;" onclick="smoothScroll(document.getElementById('link-contact'))">CONTACT</div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="menu">
                <div class="menu1 menu" style="cursor: pointer;">
                    <div class="dropdown">
                        <button onclick="myFunction1(); dropdownFunction(1);" class="dropbtn">ABOUT US</button>
                        <div id="myDropdown1" class="dropdown-content">
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link-about'))">About FieldTech</a>
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link-fieldtech-team'))">FieldTech Team</a>
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link-our-technology'))">Our Technology</a>
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link-supporters-solutions-references'))">Supporters & Sponsors</a>
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link-supporters-solutions-references'))">Solution Partners</a>
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link-supporters-solutions-references'))">References</a>
                        </div>
                    </div>
                </div>

                <div class="menu1 menu" style="cursor: pointer;">
                    <div class="dropdown">
                        <button onclick="myFunction2(); dropdownFunction(2);" class="dropbtn">PRODUCTS & SOLUTIONS</button>
                        <div id="myDropdown2" class="dropdown-content" style="cursor: default;">
                            <div class="productDiv" style="width: 25%;">
                                <div class="productText1">
                                    Hardware Solutions
                                </div>
                                
                                <div class="" style="cursor: pointer;" onclick="smoothScroll(document.getElementById('link-product-range'))">
                            
                                    <div class="productImage pImg1"></div>
                                
                                    <div class="productText1">
                                        Ergo-Field
                                    </div>
                                    
                                </div>
                                
                            </div>

                            <div class="productDiv" style="width: 70%;">
                                <div class="productText1">
                                    Software Solutions
                                </div>
                                <div class="productDiv" style="cursor: pointer;" onclick="smoothScroll(document.getElementById('link-product-range'))">
                                    <div class="productImage pImg2">
                                    </div>
                                    <div class="productText1">
                                        FieldTech Assistant
                                    </div>
                                </div>
                                
                                <div class="productDiv" style="cursor: pointer;" onclick="smoothScroll(document.getElementById('link-product-range'))">                                     
                                    <div class="productImage pImg3">
                                    </div>
                                    <div class="productText1">
                                        FieldCAD
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<!--
                <div class="menu1 menu" style="cursor: pointer;">
                    <div class="dropdown">
                        <button onclick="myFunction3(); dropdownFunction(3);" class="dropbtn">SERVICES</button>
                        <div id="myDropdown3" class="dropdown-content">
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link11'))">Surveying & Mapping</a>
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link12'))">Fair Stand Design</a>
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link13'))">Architecture</a>
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link14'))">Counselling</a>
                        </div>
                    </div>
                </div> 
				-->

                <div class="menu2 menu" style="cursor: pointer;" onclick="smoothScroll(document.getElementById('link-contact'))">
                    <div class="dropdown">
                        <button class="dropbtn">CONTACT</button>
                    </div>
                </div>

                <div class="menu2 menu" style="cursor: pointer;" onclick="window.open('https://fieldtechx.tumblr.com')">
                    <div class="dropdown">
                        <button class="dropbtn">BLOG</button>
                    </div>
                </div>
				
				<div class="menu2 menu" style="cursor: pointer;">
                    <div class="dropdown">
                        <button onclick="myFunction3(); dropdownFunction(3);" class="dropbtn">SERVICES</button>
                        <div id="myDropdown3" class="dropdown-content">
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link-services'))">Surveying & Mapping</a>
                            <a style="text-decoration: none;" onclick="smoothScroll(document.getElementById('link-services'))">Architecture</a>
                        </div>
                    </div>
                </div> 
            </div>
               
            <div id="upImage" onclick="smoothScroll(document.getElementById('link-top'))" style="cursor: pointer;"></div>
            <div id="upText" style="font-family: Arial, Helvetica, sans-serif;">We bring the office to the field!</div>
            <div id="upText" style="margin-left: 2%; font-family: Arial, Helvetica, sans-serif;">FieldTech Engineering</div>
                
        </div>

        <div id="tt" style="padding-top:100px; transition: 0.3s;">	<!--	Body kısmı.	-->
		
            <div id="main">	<!--	Altıgen menülerin bulunduğu kısım.	-->
                <div class="mainPage" id="mainPageId">
                    <div id="img13H" onclick="smoothScroll(document.getElementById('link-about'))" onmouseover='onMain("img13Main", "img13H");' onmouseout='outMain("img13Main", "img13H");' class="cursor hexagonMain img13Main hexaImageMain type1Main">
                        <div id="img13Main" class="hexaDivMain"><div class="subHexa">ABOUT</div></div>
                        <div class="hexTopMain hexaBackgroundMain"></div>
                        <div class="hexBottomMain hexaBackgroundMain"></div>
                    </div>

                    <div class="hexagonMain type2Main">
                        <div class="hexTopMain"></div>
                        <div class="hexBottomMain"></div>
                    </div>
					<!--
					<div class="hexagonMain type3Main">
                        <div class="hexTopMain"></div>
                        <div class="hexBottomMain"></div>
                    </div>
                    -->
					
					<div id="img14H" onclick="smoothScroll(document.getElementById('link-services'))" onmouseover='onMain("img14Main", "img14H");' onmouseout='outMain("img14Main", "img14H");' class="cursor hexagonMain img14Main hexaImageMain type3Main">
                        <div id="img14Main" class="hexaDivMain"><div class="subHexa">SERVICES</div></div>
                        <div class="hexTopMain hexaBackgroundMain"></div>
                        <div class="hexBottomMain hexaBackgroundMain"></div>
                    </div>
					
                    <div id="img15H" onclick="smoothScroll(document.getElementById('link-product-range'))" onmouseover='onMain("img15Main", "img15H");' onmouseout='outMain("img15Main", "img15H");' class="cursor hexagonMain img15Main hexaImageMain type5Main">
                        <div id="img15Main" class="hexaDivMain"><div class="subHexa">PRODUCTS & SOLUTIONS</div></div>
                        <div class="hexTopMain hexaBackgroundMain"></div>
                        <div class="hexBottomMain hexaBackgroundMain"></div>
                    </div>
					
					<div class="hexagonMain type4Main">
                            <div class="hexTopMain"></div>
                            <div class="hexBottomMain"></div>
                    </div>
					
					<div id="img16H" onclick="window.open('https://fieldtechx.tumblr.com')" onmouseover='onMain("img16Main", "img16H");' onmouseout='outMain("img16Main", "img16H");' class="cursor hexagonMain img16Main hexaImageMain type6Main">
                        <div id="img16Main" class="hexaDivMain"><div class="subHexa">BLOG</div></div>
                        <div class="hexTopMain hexaBackgroundMain"></div>
                        <div class="hexBottomMain hexaBackgroundMain"></div>
                    </div>
					<!--
                    <div class="hexagonMain type6Main">
                            <div class="hexTopMain"></div>
                            <div class="hexBottomMain"></div>
                    </div>
					
                    <div id="img18H" onclick="smoothScroll(document.getElementById('link17'))" onmouseover='onMain("img18Main", "img18H");' onmouseout='outMain("img18Main", "img18H");' class="cursor hexagonMain img18Main hexaImageMain type6Main">
                        <div id="img18Main" class="hexaDivMain"><div class="subHexa">PROJECTS</div></div>
                        <div class="hexTopMain hexaBackgroundMain"></div>
                        <div class="hexBottomMain hexaBackgroundMain"></div>
                    </div>
					-->
					<div id="img17H" onclick="smoothScroll(document.getElementById('link-contact'))" onmouseover='onMain("img17Main", "img17H");' onmouseout='outMain("img17Main", "img17H");' class="cursor hexagonMain img17Main hexaImageMain type3Main">
                        <div id="img17Main" class="hexaDivMain"><div class="subHexa">CONTACT</div></div>
                        <div class="hexTopMain hexaBackgroundMain"></div>
                        <div class="hexBottomMain hexaBackgroundMain"></div>
                    </div>
					<!--
                    <div class="hexagonMain type3Main">
                        <div class="hexTopMain"></div>
                        <div class="hexBottomMain"></div>
                    </div>
					
                    <div id="img16H" onclick="smoothScroll(document.getElementById('link16'))" onmouseover='onMain("img16Main", "img16H");' onmouseout='outMain("img16Main", "img16H");' class="cursor hexagonMain img16Main hexaImageMain type5Main">
                        <div id="img16Main" class="hexaDivMain"><div class="subHexa">BLOG</div></div>
                        <div class="hexTopMain hexaBackgroundMain"></div>
                        <div class="hexBottomMain hexaBackgroundMain"></div>
                    </div>
                    -->

                    
                </div>
                
            </div>

        <!--//////////////////////////////////////////////////////////////////////-->
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
		<!--//////////////////////////////////////////////////////////////////////-->
			<div class="parentPage">	<!--	Dokümandaki sayfaları içeren parent.	-->
				<div id="link-about"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 2 -->
				<div class="subPage" style="background-size: cover; background-image: url(../images/page_2_background.jpeg); padding-top: 225px; padding-bottom: 225px;">
					<div class="hexagon" style="background-color: #038ed1; opacity: 0.5; border-style: none; margin-right: auto; margin-left: auto; transform: scaleX(2.3) scaleY(2.2);">
						<div class="hexTop" style="margin-left: 5px;"></div>
						<div class="hexBottom" style="margin-left: 5px;"></div>
					</div>
					
					<div class="parentDiv-1" style="width: 95%; height: 766px; margin-top: -556px; position: absolute; z-index: 3; grid-template-rows: auto auto auto;">
						<div></div>
						<div style="width: 670px; height: auto; margin: 0 auto; padding: 10px;">
							<div class="horizontalSpace10"></div>
							<div class="horizontalSpace10"></div>
							<div class="horizontalSpace10"></div>
							<div class="horizontalSpace10"></div>
							<div class="hex-header-text">About Us</div>
							<div class="horizontalSpace10"></div>
							<div class="horizontalSpace10"></div>
							<div class="hex-body-text">
								As FieldTech, we develop innovative products and value-added systems with a sustainable holistic approach by delving deep into sophisticated work processes. We offer solutions that facilitate, accelerate, reform and regulate the project cycle. <br/>
								The interdisciplinary company was founded in 2017 in İzmir by MSc Architect Selin Küçük. FieldTech team is consisted of engineers, designers, and historians working both in the office and in the field. <br/>
								Construction, mining, surveying & mapping, architecture and archaelogy are the primary sectors that FieldTech is in service. <br/>
								The company developed Ergo-Field system with the slogan ‘We bring the office to the field!’. Ergo-Field is awarded as best national invention in 2019, and has first prize by UK Space Agency in 2020. The system provides users to carry out whole project cycles in a single real-time platform. It accelarates and eases the process, decreases operation costs, and avoids the mistakes. <br/>
								In Archaeology, FieldTech carried out the fastest mapping and architectural documentation in 2019, and the world’s largest in 2020.
							</div>
						</div>
						<div></div>
					</div>
					<div id="link-fieldtech-team"></div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 3 -->
				<div class="headerSubPage" style="width: 100%; height: auto; text-align: center;">FIELD-TECH TEAM</div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="subPage" style="padding-top: 225px; padding-bottom: 225px;">
					<div class="hexagon" style="background-image: url(../images/FTTeam.jpg); margin-right: auto; margin-left: auto; transform: scale(2.2);">
						<div class="hexTop" style="margin-left: 4px;"></div>
						<div class="hexBottom" style="margin-left: 4px;"></div>
					</div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 4_1 -->
				<div class="subPage" style="" id="team">
					<div class="teamPage">
						<div class="teamPageH3"><h3 style="font-size: 18pt;">Team & Advisors</h3></div>

						<div name="hex_0" id="img1T" onmouseover='onTeam("img1");' onmouseout='outTeam("img1");' class="hexagonTeam img1 type1Team">
							<div id="img1" class="hexaDivTeam"><div class="subHexa">Founder M.Sc Architect (İTÜ) <br/>Selin KÜÇÜK</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_0" id="img5T" onmouseover='onTeam("img5");' onmouseout='outTeam("img5");' class="hexagonTeam img5 type2Team">
							<div id="img5" class="hexaDivTeam"><div class="subHexa">Advisor M.Sc EEE (İTÜ)<br/>Fırat CİVANER</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_0" id="img21T" onmouseover='onTeam("img21");' onmouseout='outTeam("img21");' class="hexagonTeam img21 type3Team">
							<div id="img21" class="hexaDivTeam"><div class="subHexa">Senior Software Developer<br/>Şafak TURAN</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_0" id="img22T" onmouseover='onTeam("img22");' onmouseout='outTeam("img22");' class="hexagonTeam img22 type2Team">
							<div id="img22" class="hexaDivTeam"><div class="subHexa">Backend Developer M.Sc (İTÜ)<br/>Gökçe GÖK</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_0" id="img23T" onmouseover='onTeam("img23");' onmouseout='outTeam("img23");' class="hexagonTeam img23 type3Team">
							<div id="img23" class="hexaDivTeam"><div class="subHexa">Advisor Prof. Dr (İTÜ)<br/>Ergin TARI</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_0" id="img24T" onmouseover='onTeam("img24");' onmouseout='outTeam("img24");' class="hexagonTeam img24 type2Team">
							<div id="img24" class="hexaDivTeam"><div class="subHexa">Art Historian<br/>Caner BÜKTEL</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_0" id="img35T" onmouseover='onTeam("img35");' onmouseout='outTeam("img35");' class="hexagonTeam img35 type3Team">
							<div id="img35" class="hexaDivTeam"><div class="subHexa">Advisor Nottingham Uni<br/>Paul BHATIA</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_0" id="img25T" onmouseover='onTeam("img25");' onmouseout='outTeam("img25");' class="hexagonTeam img25 type2Team">
							<div id="img25" class="hexaDivTeam"><div class="subHexa">Representive in UK<br/>William HUMPHREYS</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_0" id="img34T" onmouseover='onTeam("img34");' onmouseout='outTeam("img34");' class="hexagonTeam img34 type3Team">
							<div id="img34" class="hexaDivTeam"><div class="subHexa">Geomatics Engineer (İTÜ)<br/>Ali ŞAHİN</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
					</div>
					
				<!--//////////////////////////////////////////////////////////////////////-->

					<div class="teamPage">
						<div class="teamPageH3"><h3 style="font-size: 18pt;">Freelancers, Part-Timers & Service Providers</h3></div>

						<div name="hex_1" id="img7T" onmouseover='onTeam("img7");' onmouseout='outTeam("img7");' class="hexagonTeam img7 type1Team">
							<div id="img7" class="hexaDivTeam"><div class="subHexa">Industrial Designer (İTÜ) <br/> Eli BENSUSAN</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>

						<div name="hex_1" id="img8T" onmouseover='onTeam("img8");' onmouseout='outTeam("img8");' class="hexagonTeam img8 type2Team">
							<div id="img8" class="hexaDivTeam"><div class="subHexa">Mechanical Engineer<br/>Sercan OKAN</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>

						<div name="hex_1" id="img9T" onmouseover='onTeam("img9");' onmouseout='outTeam("img9");' class="hexagonTeam img9 type3Team">
							<div id="img9" class="hexaDivTeam"><div class="subHexa">EEE<br/>Caner ADIYAMAN</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>

						<div name="hex_1" id="img10T" onmouseover='onTeam("img10");' onmouseout='outTeam("img10");' class="hexagonTeam img10 type2Team">
							<div id="img10" class="hexaDivTeam"><div class="subHexa">EEE<br/>Orhan İŞTENHİÇKORKMAZ</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<!--<div name="hex_1" id="img11T" onmouseover='onTeam("img11");' onmouseout='outTeam("img11");' class="hexagonTeam img11 type3Team">
							<div id="img11" class="hexaDivTeam"><div class="subHexa">Mathematics (İTÜ)<br/>Koray YILMAZ</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>-->
						
						<div name="hex_1" id="img26T" onmouseover='onTeam("img26");' onmouseout='outTeam("img26");' class="hexagonTeam img26 type3Team">
							<div id="img26" class="hexaDivTeam"><div class="subHexa">Freelancer Architect (ODTÜ)<br/>Emine YILDIZ</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_1" id="img27T" onmouseover='onTeam("img27");' onmouseout='outTeam("img27");' class="hexagonTeam img27 type2Team">
							<div id="img27" class="hexaDivTeam"><div class="subHexa">VR Developer (İTÜ)<br/>Alp Doğan URUT</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_1" id="img28T" onmouseover='onTeam("img28");' onmouseout='outTeam("img28");' class="hexagonTeam img28 type3Team">
							<div id="img28" class="hexaDivTeam"><div class="subHexa">Service Provider, Assembly<br/>Nuri ÖZCAN</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_1" id="img29T" onmouseover='onTeam("img29");' onmouseout='outTeam("img29");' class="hexagonTeam img29 type2Team">
							<div id="img29" class="hexaDivTeam"><div class="subHexa">Service Provider, Electronics<br/>Murat NERGİZ</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>

					</div>
					
				<!--//////////////////////////////////////////////////////////////////////-->

					<div class="teamPage">
						<div class="teamPageH3"><h3 style="font-size: 18pt;">Former Stuff & Interns</h3></div>

						<div name="hex_2" id="img12T" onmouseover='onTeam("img12");' onmouseout='outTeam("img12");' class="hexagonTeam img12 type1Team">
							<div id="img12" class="hexaDivTeam"><div class="subHexa">Software Developer ('17-'19)<br/>Uğur Can Yıldız</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>

						<div name="hex_2" id="img13T" onmouseover='onTeam("img13");' onmouseout='outTeam("img13");' class="hexagonTeam img13 type2Team">
							<div id="img13" class="hexaDivTeam"><div class="subHexa">EEE ('17)<br/>Ozan KOÇ</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>

						<div name="hex_2" id="img14T" onmouseover='onTeam("img14");' onmouseout='outTeam("img14");' class="hexagonTeam img14 type3Team">
							<div id="img14" class="hexaDivTeam"><div class="subHexa">EEE ('18)<br/>Tuğçe AK</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>

						<div name="hex_2" id="img15T" onmouseover='onTeam("img15");' onmouseout='outTeam("img15");' class="hexagonTeam img15 type2Team">
							<div id="img15" class="hexaDivTeam"><div class="subHexa">EEE ('17)<br/>Emrecan BAYRAK</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_2" id="img16T" onmouseover='onTeam("img16");' onmouseout='outTeam("img16");' class="hexagonTeam img16 type3Team">
							<div id="img16" class="hexaDivTeam"><div class="subHexa">Software Developer ('17)<br/>Yalçın TATAR</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>

						<div name="hex_2" id="img17T" onmouseover='onTeam("img17");' onmouseout='outTeam("img17");' class="hexagonTeam img17 type2Team">
							<div id="img17" class="hexaDivTeam"><div class="subHexa">Intern ('18)<br/>Tuba Avcıoğlu</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_2" id="img18T" onmouseover='onTeam("img18");' onmouseout='outTeam("img18");' class="hexagonTeam img18 type3Team">
							<div id="img18" class="hexaDivTeam"><div class="subHexa">Software Engineer ('17)<br/>Muhsin EGE</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div id="solution"></div>
						
						<div name="hex_2" id="img20T" onmouseover='onTeam("img20");' onmouseout='outTeam("img20");' class="hexagonTeam img20 type2Team">
							<div id="img20" class="hexaDivTeam"><div class="subHexa">Software Engineer<br/>Uğur BAKAY</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_2" id="img2T" onmouseover='onTeam("img2");' onmouseout='outTeam("img2");' class="hexagonTeam img2 type3Team">
							<div id="img2" class="hexaDivTeam"><div class="subHexa">Industrial Designer<br/>Çağdaş DORAK</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>

						<div name="hex_2" id="img3T" onmouseover='onTeam("img3");' onmouseout='outTeam("img3");' class="hexagonTeam img3 type2Team">
							<div id="img3" class="hexaDivTeam"><div class="subHexa">Geomatics Engineer<br/>Serhat AYDEMİR</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_2" id="img30T" onmouseover='onTeam("img30");' onmouseout='outTeam("img30");' class="hexagonTeam img30 type3Team">
							<div id="img30" class="hexaDivTeam"><div class="subHexa">Senior Software Developer<br/>Onur DURAN</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_2" id="img31T" onmouseover='onTeam("img31");' onmouseout='outTeam("img31");' class="hexagonTeam img31 type2Team">
							<div id="img31" class="hexaDivTeam"><div class="subHexa">Intern, Urban Planner (MSGSÜ)<br/>Kevser ÇALIK</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_2" id="img32T" onmouseover='onTeam("img32");' onmouseout='outTeam("img32");' class="hexagonTeam img32 type3Team">
							<div id="img32" class="hexaDivTeam"><div class="subHexa">Intern, Architect<br/>Dulda IŞIK</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						<div name="hex_2" id="img33T" onmouseover='onTeam("img33");' onmouseout='outTeam("img33");' class="hexagonTeam img33 type2Team">
							<div id="img33" class="hexaDivTeam"><div class="subHexa">Intern, Geomatics Engineer (İTÜ)<br/>Ceren DUMANSIZ</div></div>
							<div class="hexTopTeam"></div>
							<div class="hexBottomTeam"></div>
						</div>
						
						
					</div>
					
				</div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 4_2 -->
				<div class="subPage" style="text-align: center; margin-top: -75px">
					<hr style="background-color: #038ed1; height: 2px"/>
					<img id="hex_show_image" onclick="showHex(5);" class="subPageImage" src="images/hex_show_hide.png" style="width: 30px; cursor: pointer;"/>
					<img id="hex_hide_image" onclick="hideHexWithScroll(5);" class="subPageImage" src="images/hex_show_hide.png" style="width: 30px; cursor: pointer; transform: rotate(180deg);"/>
					
					<div id="link-our-technology"></div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 5 -->
				<div class="subPage" style="background-size: cover; background-image: url(../images/page_5_background.jpg); padding-top: 225px; padding-bottom: 225px; position: relative;">
					<div class="hexagon" style="background-color: #038ed1; opacity: 0.5; border-style: none; margin-right: auto; margin-left: auto; transform: scaleX(2.3) scaleY(2.2);">
						<div class="hexTop" style="margin-left: 5px;"></div>
						<div class="hexBottom" style="margin-left: 5px;"></div>
					</div>
					
					<div class="parentDiv-1" style="width: 100%; height: 766px; margin-top: -556px; position: absolute; z-index: 3; grid-template-rows: auto auto auto;">
						<div></div>
						<div style="width: 670px; height: auto; margin: 0 auto; padding: 10px;">
							<div class="horizontalSpace10"></div>
							<div class="horizontalSpace10"></div>
							<div class="horizontalSpace10"></div>
							<div class="horizontalSpace10"></div>
							<div class="hex-header-text">Our Technology</div>
							<div class="horizontalSpace10"></div>
							<div class="horizontalSpace10"></div>
							<div class="hex-body-text">
								AEC industry have both fieldwork and office work. Surveying equipments such as GNSS, Total Station, UAV, and laser scanners are controlled by handheld units, tablets and joysticks and field data is collected. The data is processed and projected in the office, implementations and controls are carried out in the field. This complicated and time-consuming process causes data loss and high operational costs. <br/>
								Ergo-Field solves the problems of conventional systems. It provides users to manage data collection and processing simultaneously on a single ergonomic platform. Thus, it facilitates and accelerates the project cycle, reduces operational costs, prevents data loss and errors. <br/>
								Ergo-Field real-time surveying platform is designed for field professionals. It has a user-friendly and developable interface, and an ergonomic design. Having its own SDK enables Ergo-Field to be integrated with various equipment and software.
							</div>
							
						</div>
						<div></div>
					</div>
					
					<div class="social-media">
						<a href="https://www.instagram.com/fieldtech_muhendislik" target="_blank"><div class="social instagram_blue"></div></a>
						<a href="https://www.facebook.com/fieldtech.tr" target="_blank"><div class="social facebook_blue"></div></a>
						<a href="https://www.linkedin.com/company/fieldtech-ltd" target="_blank"><div class="social linkedin_blue"></div></a>
						<a href="https://www.youtube.com/channel/UCSoOL9c0XFIPqq6eFsTyfYg/featured " target="_blank"><div class="social youtube_blue"></div></a>
					</div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
			<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 6 -->
				<div class="subPage" style="background-size: cover; background-image: url(../images/page_6_background.jpeg); padding-top: 225px; padding-bottom: 225px;">
					<div class="hexagon" style="background-color: #038ed1; opacity: 0.5; border-style: none; margin-right: auto; margin-left: auto; transform: scaleX(2.3) scaleY(2.2);">
						<div class="hexTop" style="margin-left: 5px;"></div>
						<div class="hexBottom" style="margin-left: 5px;"></div>
					</div>
					
					<div class="parentDiv-1" style="width: 95%; height: 766px; margin-top: -556px; position: absolute; z-index: 3; grid-template-rows: auto 110px auto;">
						<div></div>
						<div style="width: 670px; align-self: center; margin-left: auto; margin-right: auto; padding: 10px;">
							<div class="hex-body-text" style="font-size: 18pt;">
								FieldTech develops innovative products and provides regular systems with a sustainable holistic approach by delving deep into sophisticated work process.
							</div>
						</div>
						<div></div>
					</div>
					
					<div id="link-product-range"></div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 7 -->
				<div class="subPage">
					<div class="headerSubPage">Product Range</div>
					<div class="horizontalSpace10"></div>
					<div class="textSubPage">
						Ergo-Field is both a hardware and software solution.<br/>
						The hardware is designed for ergonomic use at field. It has necessary components such as buttons and function keys for real-time surveying.<br/>
						FieldTech Assistant provides a user-friendly interface and includes two panels.<br/>
						One is used at the beginning of fieldwork for project management along with device and software settings. Other panel is used for data observation and quick access to necessary tools during real-time surveying.<br/>
						FieldCAD is a CAD Plug-in includes practical commands developed by our field experienced team. The software extremely eases and accelerates field drawings.
					</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_7.png"/>
					<div>
		<input class="checkbox-popup" type="checkbox" id="show-popup">
		<div style="display: grid; grid-template-columns: repeat(3, minmax(max-content, 1fr)); gap: 30px;">
		<div></div>
		<div></div>
		<label for="show-popup" style="text-align: center; color: #53bdeb;">Click to download</label>
		</div>
		
		<div class="containerpopup">
			<label for="show-popup" class="close-btn fas fa-times"></label>
			<div class="text-popup">Login Form</div>
			<form class="form-popup" onsubmit="return popUpSubmit()">
				<div class="data-popup">
					<label>User Name</label>
					<input id ="usernamepopup" type="text" required>
				</div>
				<div class="data-popup">
					<label>Password</label>
					<input id="passwordpopup" type="password" required>
				</div>
				<div class="btn-popup">
					<div class="inner-popup">

					</div>
					<button type="submit">Login</button>
				</div>
			</form>
		</div>
					
					

		
		

			<!--//////////////////////////////////////////////////////////////////////-->
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 8 -->
				<div class="subPage">
					<div class="headerSubPage">Ergo-Field EFX01</div>
					<div class="horizontalSpace10"></div>
					<div class="textSubPage">
						Ergo-Field is an ergonomic real-time data processing platform which can be integrated into land surveying devices, laser scanning devices, and unmanned aerial vehicles through tablet PCs, so to be used in survey, design, documentation, implementation, and control processes of projects in field sectors such as surveying, mapping and construction.
					</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<div class="parentDiv-1" style="grid-template-columns: 1fr 1fr; grid-gap: 5%; border: solid 3px #038ed1;">
						<img class="subPageImage" src="images/page_8_1.png"/>
						<img class="subPageImage" src="images/page_8_2.png"/>
					</div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 9 -->
				<div class="subPage">
					<div class="parentDiv-1" style="grid-template-columns: 1fr 2fr; grid-gap: 20%;">
						<a style="text-decoration: none;" href="FieldTech_Catalogue_EN_low2.pdf" target="_blank">
							<img class="subPageImage" src="images/page_9_1.png"/>
						</a>
						<div class="parentDiv-1" style="grid-template-rows: 6fr 1fr; grid-gap: 30px;">
							<div style="width: 100%; border: solid 2px #038ed1;">
								<img class="subPageImage" src="images/page_9_2.png"/>
							</div>
							<div style="width: 40%;" class="selfCenter">
								<img class="subPageImage" src="images/page_9_3.png"/>
							</div>
						</div>
					</div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 10 -->
				<div class="subPage">
					<div class="headerSubPage">Ergo-Field System</div>
					<div class="horizontalSpace10"></div>
					<div class="textSubPage">
						Ergo-Field system gives surveyors freedom<br/>
						The flexible system that user can customize according to own device and software selection.<br/>
						It is fully integrated with windows operating system. You can integrate GNSS, Robotic Total Station, Laser Scanner or UAV as surveying device, process their data in any CAD Platform simultaneously, use a pole mount or shoulder strap upon the device selection. Any size of tablet PC is also attachable through slider/slot mechanism of Ergo-Field.
					</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_10.png"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 11 -->
				<div class="subPage">
					<div class="headerSubPage">Conventional Surveying</div>
					<div class="horizontalSpace10"></div>
					<div class="textSubPage">
						In conventional surveying systems, data collected from surveying devices via controllers have to be transferred into office PC and post-processed in CAD Software.
					</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_11.png"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 12 -->
				<div class="subPage">
					<div class="headerSubPage">Real-Time Surveying with Ergo-Field</div>
					<div class="horizontalSpace10"></div>
					<div class="textSubPage">
						Unlike conventional surveying, Ergo-Field system provides real-time data processing. There is not data transfer nor data loss. Simple connection to surveying devices, easy to use, practical commands for drawings. Just connect the device, press the function key, capture the data and it is on CAD screen. Welcome to the future of survey!
					</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_12.png"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 13 -->
				<div class="subPage">
					<div class="headerSubPage">Conventional Process vs. Ergo-Field System</div>
					<div class="horizontalSpace10"></div>
					<div class="subHeaderSubPage">Problem - Solution</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_13.png"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 14 -->
				<div class="subPage">
					<div class="headerSubPage">Innovation</div>
					<div class="horizontalSpace10"></div>
					<div class="textSubPage">
						Ergo-Field awarded Best National Invention by Turkish Patent Institute in 2019. Besides, the system was awarded first prize in Space Tec-3 Business Pitch Event by UK Space Agency in 2020.<br/>
						The award-wining technology solves a real problem of field sector with a smart integration.
					</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_14.png"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 15 -->
				<div class="subPage">
					<div class="headerSubPage">User Scenario</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_15.png"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 16 -->
				<div class="subPage">
					<img class="subPageImage" src="images/page_16.png"/>
					<div id="link-services"></div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 17 -->
				<div class="subPage">
					<div class="headerSubPage">Services</div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_17.jpg"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 18 -->
				<div class="subPage">
					<div class="headerSubPage">Mapping and Architectural Documentation</div>
					<div class="horizontalSpace10"></div>
					<div class="subHeaderSubPage">Value Proposition</div>
					<div class="horizontalSpace10"></div>
					<div class="textSubPage">
						We reformed archaeological survey!<br/>
						FieldTech contributes substantially to social sciences with Ergo-Field solution. Ergo-Field is the latest and most efficient documentation technology for Archaeological Survey and Excavation Projects. Forget about the graph papers!
					</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_18.jpg"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 19 -->
				<div class="subPage">
					<div class="headerSubPage">Outputs</div>
					<div class="horizontalSpace10"></div>
					<div class="subHeaderSubPage">Base Map and Schematic Plan</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_19.jpg"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 20 -->
				<div class="subPage">
					<div class="headerSubPage">Stone Plan</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_20.png"/>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 21 -->
				<div class="subPage">
					<div class="headerSubPage">3d Models of the Site and Critical Sections</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<img class="subPageImage" src="images/page_21.jpg"/>
					<div id="link-supporters-solutions-references"></div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 22_1 -->
				<div class="subPage">
					<div class="headerSubPage" style="text-align: center;">Supporters & Sponsors</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<div class="parentDiv-1" style="grid-template-rows: repeat(2, 1fr); grid-gap: 30px;">
						<div class="parentDiv-1" style="grid-template-columns: repeat(5, 1fr); grid-gap: 2%;">
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_1_1.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_1_2.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_1_3.jpg"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_1_4.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_1_5.png"/>
							</div>
						</div>
						<div class="parentDiv-1" style="grid-template-columns: repeat(4, 1fr); grid-gap: 2%;">
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_1_7.png"/>
							</div>
							<div class="">
								<img class="subPageImage" src="images/page_22_1_8.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_1_10(1).png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_1_11.png"/>
							</div>
						</div>
					</div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 22_2 -->
				<div class="subPage">
					<div class="headerSubPage" style="text-align: center;">Solution Partners</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<div class="parentDiv-1" style="grid-template-rows: repeat(2, 1fr); grid-gap: 30px;">
						<div class="parentDiv-1" style="grid-template-columns: repeat(4, auto); grid-gap: 2%;">
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_2_1.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_2_2.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_2_3.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_2_4.png"/>
							</div>
							
						</div>
						<div class="parentDiv-1" style="grid-template-columns: repeat(5, 1fr); grid-gap: 2%;">
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_2_7.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_2_8.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_2_9.png"/>
							</div>
							<div class="selfCenter" style="">
								<img class="subPageImage" src="images/page_22_2_10.png"/>
							</div>
							<div class="selfCenter">
								<img class="subPageImage" src="images/page_22_2_11(1).png"/>
							</div>
						</div>
					</div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 22_3 -->
				<div class="subPage">
					<div class="headerSubPage" style="text-align: center;">References</div>
					<div class="horizontalSpace10"></div>
					<div class="horizontalSpace10"></div>
					<div class="parentDiv-1" style="grid-template-columns: repeat(5, auto); grid-gap: 2%;">
						<div class="selfCenter">
							<img class="subPageImage" src="images/page_22_3_1.jpg"/>
						</div>
						<div class="selfCenter">
							<img class="subPageImage" src="images/page_22_3_2.png"/>
						</div>
						<div class="selfCenter">
							<img class="subPageImage" src="images/page_22_3_3.jpg"/>
						</div>
						<div class="selfCenter">
							<img class="subPageImage" src="images/page_22_3_4.png"/>
						</div>
						<div class="selfCenter">
							<img class="subPageImage" src="images/page_22_3_5.png"/>
						</div>
					</div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 23 -->
				<div class="subPage">
					<div style="position: absolute; color: white; margin-bottom: -25px;">http://spacemodels.nuxit.net/Panoramas/index-A14.htm</div>
					<img class="subPageImage" src="images/page_23.jpg"/>
					<div id="link-contact"></div>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 24_1 -->
				<div class="subPage">
					<div class="parentDiv-1" style="grid-template-columns: auto auto auto auto auto; grid-gap: 1%;">
						<div style="padding: 5px;">
							<div class="footerHeader">ABOUT</div>
							<div class="footerText" onclick="smoothScroll(document.getElementById('link1'))">About FieldTech</div>
							<div class="footerText" onclick="smoothScroll(document.getElementById('link2'))">Our Technology</div>
							<div class="footerText" onclick="smoothScroll(document.getElementById('link4'))">FieldTech Team</div>
							<div class="footerText" onclick="smoothScroll(document.getElementById('link6'))">Solution Partners</div>
							<div class="footerText" onclick="smoothScroll(document.getElementById('link7'))">References</div>
						</div>
						<div style="padding: 5px;">
							<div class="footerHeader">PRODUCTS & </br> SOLUTIONS</div>
							<div class="footerText" onclick="smoothScroll(document.getElementById('link17'))">Hardware Solutions</div>
							<div class="footerText" onclick="smoothScroll(document.getElementById('link17'))">Software Solutions</div>
						</div>
						<div style="padding: 5px;">
							<div class="footerHeader">SERVICES</div>
							<div class="footerText">Surveying & Mapping</div>
							<div class="footerText">Fair Stand Design</div>
							<div class="footerText">Architecture</div>
							<div class="footerText">Counselling</div>
						</div>
						<div style="padding: 5px;">
							<div class="footerHeader">PROJECTS</div>
							<div class="footerText">R&D Projects</div>
							<div class="footerText">References</div>
							
						</div>
						<div style="padding: 5px;">
							<div class="footerHeader">CONTACT</div>
							<div class="footerText">+90 505 983 13 55</div>
							<div class="footerText">info@fieldtech.com.tr</div>
							<div class="footerText">İzmir Bilimpark İTOB</div>
							<div class="footerText">OSB Mah 10032 Sok. No:2</div>
							<div class="footerText">Menderes/İzmir</div>
							<div class="footerText">TURKEY</div>
							
							<div style="margin-top: 15px; margin-left: -5px;">
								<a href="https://www.instagram.com/fieldtech_muhendislik" target="_blank"><div class="social instagram_blue"></div></a>
								<a href="https://www.facebook.com/fieldtech.tr" target="_blank"><div class="social facebook_blue"></div></a>
								<a href="https://www.linkedin.com/company/fieldtech-ltd" target="_blank"><div class="social linkedin_blue"></div></a>
								<a href="https://www.youtube.com/channel/UCSoOL9c0XFIPqq6eFsTyfYg/featured " target="_blank"><div class="social youtube_blue"></div></a>
							</div>
						</div>
					</div>
					
				</div>
		
			<!--////////////////////////////////////////////////////////////////////// PAGE 24_3 -->
				<div class="subPage" style="position: relative; height: 60px;">
					<a href="https://www.google.com/maps/place/fieldtech+mühendislik/@38.1877237,27.1984281,17z/data=!3m1!4b1!4m5!3m4!1s0x14b959e8af8c93ef:0xc02a47eca0b7e546!8m2!3d38.1877237!4d27.2006168" target="_blank"><img src="images/page_24_3.png" style="width: 108px; height: 60px; position: absolute; right: 2%;"/></a>
				</div>
			<!--//////////////////////////////////////////////////////////////////////-->
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
				<div class="horizontalSpace10"></div>
			<!--////////////////////////////////////////////////////////////////////// PAGE 24_2 -->
				<div class="subPage">
					<form action="" method="post">
						<div style="width: 100%; text-align: center;">
							<div style="width: auto; height: auto; display: inline-block;">
								<div style="width: 160px; display: inline-block;text-align: left;">
									<div class="footerText" style="font-weight: bold; padding: 5px;">Name-Surname*</div>
									<div class="footerText" style="font-weight: bold; padding: 5px;">Profession</div>
									<div class="footerText" style="font-weight: bold; padding: 5px;">Mobile*</div>
									<div class="footerText" style="font-weight: bold; padding: 5px;">Email*</div>
								</div>
								<div style="width: 310px; display: inline-block;">
									<div class="footerText" style="padding: 5px;">
										<input id="input_name" name="input_name" style="width: 300px; font-size: 12pt;" type="text" class="borderForm" value="<?php echo (isset($name))? $name:'';?>"/>
									</div>
									<div class="footerText" style="padding: 5px;">
										<input id="input_profession" name="input_profession" style="width: 300px; font-size: 12pt;" type="text" class="borderForm" value="<?php echo (isset($profession))? $profession:'';?>"/>
									</div>
									<div class="footerText" style="width: 310px;">
										<div style="padding: 5px; display: inline-block; width: 84px;">
											<select style="width: 75px; font-size: 14.5pt;" class="borderForm" id="input_country_code" name="input_country_code">
												<option value="90">+90</option>
												<option value="1">+1</option>
												<option value="7">+7</option>
												<option value="20">+20</option>
												<option value="30">+30</option>
												<option value="31">+31</option>
												<option value="33">+33</option>
												<option value="39">+39</option>
												<option value="40">+40</option>
												<option value="41">+41</option>
												<option value="43">+43</option>
												<option value="44">+44</option>
												<option value="46">+46</option>
												<option value="48">+48</option>
												<option value="49">+49</option>
												<option value="51">+51</option>
												<option value="52">+52</option>
												<option value="55">+55</option>
												<option value="58">+58</option>
												<option value="61">+61</option>
												<option value="66">+66</option>
												<option value="86">+86</option>
												<option value="91">+91</option>
												<option value="92">+92</option>
												<option value="359">+359</option>
												<option value="387">+387</option>
												<option value="595">+595</option>
												<option value="852">+852</option>
												<option value="886">+886</option>
												<option value="966">+966</option>
												<option value="993">+993</option>
												<option value="994">+994</option>
											</select>
										</div>
										<div style="padding: 5px; display: inline-block; width: 220px;">
											<input id="input_mobile" name="input_mobile" style="width: 210px; font-size: 12pt;" type="text" class="borderForm" value="<?php echo (isset($mobile))? $mobile:'';?>"/>
										</div>
									</div>
									<div class="footerText" style="padding: 5px;">
										<input id="input_email" name="input_email" style="width: 300px; font-size: 12pt;" type="text" class="borderForm" value="<?php echo (isset($email))? $email:'';?>"/>
									</div>
								</div>
								<div style="width: 475px; display: inline-block;">
									<div class="footerText" style="font-weight: bold; padding: 5px;">
										<textarea id="input_message" name="input_message" style="height: 135px; font-size: 12pt; max-height: 135px; min-height: 135px; width: 465px;" rows="8" cols="53" class="borderForm"><?php echo (isset($message))? $message:'';?></textarea>
									</div>
								</div>
								<div id="parent-recaptcha" class="parentDiv-1" style="grid-template-columns: auto 304px 90px 60px 0; grid-gap: 5px; width: 100%; margin: 0 auto;">
									<div></div>
									<div style="width: 304px;">
										<div id="recaptcha" class="g-recaptcha rc-anchor-light" data-sitekey="6Lfz1GEaAAAAANrhfoSyT7S4lBN8i3XITWDQlFnR" style="" data-size=""></div>
									</div>
									<div></div>
									<div style="width: 60px;">
										<button type="submit" style="" id="btn1" class="buttonStyle">Send</button>
									</div>
									<div></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			
			<!--//////////////////////////////////////////////////////////////////////-->
			</div>
		<!--//////////////////////////////////////////////////////////////////////-->
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
			<div class="horizontalSpace10"></div>
		<!--//////////////////////////////////////////////////////////////////////-->
            <div style="font-size: 11pt; text-align: center; color: #038ed1;">
				FieldTech Mühendislik Tasarım ArGe Danışmanlık San. ve Tic. Ltd. Şti. <br/>&copy;2019
			</div>
	<!--//////////////////////////////////////////////////////////////////////-->
        </div>

<!--//////////////////////////////////////////////////////////////////////-->
		<?php session_unset();?>
		<!--	Gerekli javascript, jQuery bootstrap linkleri	-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </body>
</html>
