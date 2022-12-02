<!doctype html>
<html class="is-menu-fixed">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Editor - Responsive HTML5 Template">
    <meta name="keywords" content="editor, blog, html5, portfolio">
    <meta name="author" content="Pixelwars">
    
    <!-- FAV and TOUCH ICONS -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon" href="images/ico/apple-touch-icon.png"/>
    
    <title>Форма обратной связи</title>
	
    <!-- FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
    
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/fonts/fontello/css/fontello.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.uniform/uniform.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.fluidbox/fluidbox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/selection-sharer/selection-sharer.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('js/responsive-image-gallery/elastislide.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/align.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/768.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/992.css')}}">
    
    <!-- INITIAL SCRIPTS -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/modernizr.min.js"></script>
</head>

<body>

    <!-- page -->
    <div id="page" class="hfeed site">
        
        <!-- site-main -->
        <div id="main" class="site-main">
        
        
        
        	            
            <!-- primary -->
        	<div id="primary" class="content-area">
            	
                <!-- site-content -->
                <div id="content" class="site-content" role="main"> <!-- layout-fixed -->
                	<div class="layout-fixed"> <!-- .hentry -->
                        <article class="hentry page">
                            
                            <header class="entry-header">
                                <h1 class="entry-title">Форма обратной связи</h1>
                            </header>
                                
                                
                            <!-- .entry-content -->
                            <div class="entry-content">
                                
                                
                                
                                  
                                  <!-- .contact-form -->
                                  <div class="contact-form">
                                    
                                      <form id="contact-form" class="validate-form" method="post" action="/">
                                        
                                        <!-- enter mail subject here -->
                                        @csrf
                                        
                                        <p>
                                          <label for="name">ФИО</label>
                                          <input type="text" name="name" id="name" class="required">
                                        </p>
                                        
                                        <p>
                                          <label for="number">Телефон</label>
                                          <input type="text" name="number" id="number" class="required number">
                                        </p>
                                        
                                        <p>
                                          <label for="message">Сообщение</label>
                                          <textarea name="message" id="message" class="required"></textarea>
                                        </p>
                                       
                                        <p>
                                          <button class="submit button"><span class="submit-label">Отправить</span><span class="submit-status"></span></button>
                                        </p>
                                        
                                      </form>
                                      
                                  </div>
                                  <!-- .contact-form -->
                                	
                               
                            </div>
                            <!-- .entry-content -->
                            
                            
                        </article>
                        <!-- .hentry -->
                	
                    
                
               		</div>
                    <!-- layout-fixed -->
                
                
                	
                
                </div>
                <!-- site-content -->
                
            </div>
            <!-- primary -->    
        
        
        
        
        </div>
        <!-- site-main -->
        
	</div>
    <!-- page -->
    
</body>
</html>
