{$View->start('css')}
{literal}
  <link href="/common_pc/css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link rel="stylesheet" type="text/css" href="/common_pc/js/source/jquery.fancybox.css" media="all">

    <style type="text/css">        
    </style>
{/literal}
{$View->end()}

{* このページ特有のJavaScript *}
{$View->start('script')}
<!--slider-->
<script language="javascript" type="text/javascript" src="/common_pc/js/jquery-1.10.2.min.js"></script>
<script language="javascript" type="text/javascript" src="/common_pc/js/list_controller.js"></script>
<script type="text/javascript" src="/common_pc/js/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="/common_pc/js/source/jquery.fancybox.pack.js"></script>
<script src="/common_pc/js/modernizr.js"></script>
 <!-- jQuery -->
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>
<!-- FlexSlider -->
<script defer src="/common_pc/js/jquery.flexslider.js"></script>
<script type="text/javascript">
    {*$(function(){
      SyntaxHighlighter.all();
    });*}
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
</script>


<script type="text/javascript">

  var $objLoader = {
      '$init_flag' : false,
      'fOpen' : function(){
        if(!$objLoader.$init_flag){
          $('body').append('<div id="add_loader" class="fancybox-overlay fancybox-overlay-fixed" style="width:auto;height:auto;"><div style="width:100%;height:100%;background-image:url(/common_pc/img/load.gif);background-repeat:no-repeat;background-position:50% 50%;"></div></div>');
          $objLoader.$target = $('#add_loader');
          $objLoader.$init_flag = true;
        }
        $objLoader.$target.fadeIn(100);
      },
      'fClose' : function(){
        if($objLoader.$init_flag){
          $objLoader.$target.fadeOut(200);
        }
      }
    };
    
    $(function () {
      console.log(history.replaceState);
{*        reloadCaptcha();*}  
        $('#test_ajax').click(function() {
          $.ajax({
            url: '/',
            data: { page_type: 'detail'},
            error: function() {
              
            },
            success: function(data) {
              console.log(data);
            },
            type: 'POST'
          });
        });
        $objListController.$url = window.location + "ajax";
        $objListController.fInit();   
    });
    

    {*function reloadCaptcha() {
        document.images.captcha.src = "{$View->Html->url('/captcha?')}" + Math.round(Math.random(0) * 1000) + 1;
        $('#captcha_text').val('');
  }*}
   
</script>

{$View->end()}
{* </head> *}

<body>
<div class="wrap"> 
	<div class="header">
		<div class="logo">
				<a href="index.html"><img src="/common_pc/img/logo.png" alt=""  title="logo"/></a>
		</div>
		<div class="nav-right">
			<ul class="nav">
				<li class="active"><a href="index.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="service.html">Service</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
<div class="menu-bg">
	<ul class="menu">
		<li><a href="home-appliances.html">Home Appliances</a></li>
		<li><a href="accessories.html">Accessories</a>
			<ul>
				<li><a href="accessories.html" >Tablet</a></li>
				<li><a href="accessories.html">Camera</a></li>
				<li><a href="accessories.html">Peripherals</a></li>
			</ul>
		</li>
		<li><a href="computing.html">Computing</a></li>
		<li><a href="accessories.html" >Mobiles</a></li>
	</ul> 
	<div class="search">
	    <form>
	    	<input type="text" value="">
	    	<input type="submit" value="">
	    </form>
	</div>
	<div class="clear"></div>
</div>
<div class="flexslider">
   	<div class="flex-viewport" style="overflow: hidden; position: relative;">
   		<ul class="slides" style="width: 100%; -webkit-transition: 0.6s; transition: 0.6s; -webkit-transform: translate3d(-5032px, 0, 0);">
   			<li class="clone" style="width: 100%; float: left; display: block;">
        		<img src="/common_pc/img/slider1.jpg" alt=""/>
    		</li>
       		<li style="width: 100%; float: left; display: block;" class="">
    	    	<img src="/common_pc/img/slider2.jpg" alt=""/>
    		</li>
    		<li class="" style="width:100%; float: left; display: block;">
    	    	<img src="/common_pc/img/slider3.jpg" alt=""/>
    		</li>
		</ul>
	</div>
</div>
<div class="content">
<div class="section group">
	<div class="col_1_of_3 span_1_of_3">
		<div class="grid-imgs">
			<a href="details.html"><img src="/common_pc/img/pic1.jpg" alt=""/></a> 
		</div>
		<h2>Lorem Ipsum is simply dummy text </h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
	</div>
	<div class="col_1_of_3 span_1_of_3">
		<div class="grid-imgs">
				<a href="details.html"><img src="/common_pc/img/pic2.jpg" alt=""/></a> 
		</div>
		<h2>Lorem Ipsum is simply dummy text </h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
	</div>
	<div class="col_1_of_3 span_1_of_3">
		<div class="grid-imgs">
				<a href="details.html"><img src="/common_pc/img/pic3.jpg" alt=""/></a> 
		</div>
		<h2>Lorem Ipsum is simply dummy text </h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
	</div>
</div>
<div class="text-h">
	<h2>feature products</h2>
</div>
  <div id="condition">
    <input type="checkbox" value="123"  name="data[option1]"/>
    <input type="checkbox" value="456"  name="data[option2]"/>
  </div>
<div class="section group" id="result_list">
  {foreach $data.product as $product}
      <div class="col_1_of_5 span_1_of_5">
      <div class="grid-img">
          <a href="details.html"><img src="/common_pc/img/pic4.jpg" alt=""/></a> 
      </div>
        <p>{$product.Product.name}</p>
      <button class="left">{$product.Product.price}</button>
      <div class="btn right"><a href="details.html">view</a></div>
    </div>
      
    {/foreach}
</div>
</div>
<div class="footer">
	<div class="section group">
		<div class="col_1_of_4 span_1_of_4">
			<h2>My Account</h2>
			<ul class="nav1">
				<li><a href="">Always free from repetition</a></li>
				<li><a href="">Morbi blandit turpis ewuhre</a></li>
				<li><a href="">Integer id ante nec elit mo</a></li>
				<li><a href="">Maecenas accumsan lorem sed</a></li>
			</ul>
		</div>
		<div class="col_1_of_4 span_1_of_4">
			<h2>Information</h2>
			<ul class="nav1">
				<li><a href="">Always free from repetition</a></li>
				<li><a href="">Morbi blandit turpis ewuhre</a></li>
				<li><a href="">Integer id ante nec elit mo</a></li>
				<li><a href="">Maecenas accumsan lorem sed</a></li>
			</ul>
		</div>
		<div class="col_1_of_4 span_1_of_4">
			<h2>Follow Us</h2>
			<ul class="nav">
				<li><a href=""><img src="/common_pc/img/facebook.png" title="facebook" alt=""/></a></li>
				<li><a href=""><img src="/common_pc/img/twitter.png" title="twitter" alt=""/></a></li>
				<li><a href=""><img src="/common_pc/img/rss.png" title="rss" alt=""/></a></li>
			</ul>
		</div>
		<div class="col_1_of_4 span_1_of_4">
			<h2>Contact Us</h2>
			<ul class="nav">
				<li><a href=""> 500 Lorem Ipsum Dolor Sit,</a></li>
				<li><a href="">22-56-2-9 Sit Amet, Lorem,</a></li>
				<li><a href="">USA </a></li>
				<li><a href="">Phone:(00) 222 666 444 </a></li>
				<li><a href=""> Email: <span>info@mycompany.com</span></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="footer1">
		<p class="w3-link">© All Rights Reserved | Designed by&nbsp; <a href="http://w3layouts.com/"> W3Layouts</a></p>
	</div>
</div>
</body>
