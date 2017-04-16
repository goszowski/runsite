<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Runsite</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://api.runsite.com.ua/cmf/resources/bootstrap-sass-3.3.7/assets/stylesheets/bootstrap.css">
    <link rel="stylesheet" href="https://api.runsite.com.ua/cmf/resources/rippler/dist/css/rippler.min.css">
    <link rel="stylesheet" href="https://api.runsite.com.ua/cmf/resources/jquery.typeProgress/jquery.typeProgress.css">
  </head>
  <body>
    @yield('app')



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://api.runsite.com.ua/cmf/resources/bootstrap-sass-3.3.7/assets/javascripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://api.runsite.com.ua/cmf/resources/rippler/dist/js/jquery.rippler.min.js"></script>
    <script type="text/javascript" src="https://api.runsite.com.ua/cmf/resources/slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="https://api.runsite.com.ua/cmf/resources/jquery.typeProgress/jquery.typeProgress.js"></script>
    <script type="text/javascript">
      $(function() {
        call_after_loading();

        $('iframe[name=runsiteIframe]').on('load', function() {
          $('#app-content').html($(this).contents().find('#app-content'));
          $('#app-menu').html($(this).contents().find('#app-menu'));
          history.pushState(null, null, $(this).contents().get(0).location.href);
          call_after_loading();
        });

        $(window).on("popstate", function(e) {
      		var href = location.href;
          $('iframe[name=runsiteIframe]').attr('src', href);
      	});

        function call_after_loading()
        {
          $('.rippler').rippler({
            effectClass      :  'rippler-effect'
            ,effectSize      :  0      // Default size (width & height)
            ,addElement      :  'div'   // e.g. 'svg'(feature)
            ,duration        :  400
          });

          $('.scroll').each(function() {
            $(this).slimScroll({
                height: $(this).parent().height(),
                wheelStep: 10,
                color: '#737373',
                allowPageScroll: true,
                alwaysVisible: true,
            });
          });

          $('.type-progress').each(function() {
            $(this).typeProgress();
          });
        }
      });
    </script>
  </body>
</html>
