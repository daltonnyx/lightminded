<?php

/* /home/october/public_html/themes/news/partials/footer.htm */
class __TwigTemplate_06266ce869b55771dd23901aa3634aeb720ef85bd60d03773a4508be636c2c78 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"share-bottom\">
    <h3>Share Page</h3>
    <div class=\"share-socials-bottom\">
        <a href=\"https://www.facebook.com/sharer/sharer.php?u=http://www.themeforest.net/\">
            <i class=\"fa fa-facebook facebook-color\"></i>
            Facebook
        </a>
        <a href=\"https://twitter.com/home?status=Check%20out%20ThemeForest%20http://www.themeforest.net\">
            <i class=\"fa fa-twitter twitter-color\"></i>
            Twitter
        </a>
        <a href=\"https://plus.google.com/share?url=http://www.themeforest.net\">
            <i class=\"fa fa-google-plus google-color\"></i>
            Google
        </a>

        <a href=\"https://pinterest.com/pin/create/button/?url=http://www.themeforest.net/&media=https://0.s3.envato.com/files/63790821/profile-image.jpg&description=Themes%20and%20Templates\">
            <i class=\"fa fa-pinterest-p pinterest-color\"></i>
            Pinterest
        </a>
        <a href=\"sms:\">
            <i class=\"fa fa-comment-o sms-color\"></i>
            Text
        </a>
        <a href=\"mailto:?&subject=Check this page out!&body=http://www.themeforest.net\">
            <i class=\"fa fa-envelope-o mail-color\"></i>
            Email
        </a>
        <div class=\"clear\"></div>
    </div>
</div>
<script type=\"text/javascript\" src=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/scripts/jquery.js\"></script>
<script type=\"text/javascript\" src=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/scripts/plugins.js\"></script>
<script type=\"text/javascript\" src=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/scripts/custom.js\"></script>
<script type=\"text/javascript\">
jQuery(document).ready(function(\$){
    var \$header = \$('.advertorial-header');
    if(\$header.data('mobile') == 1) {
        if(window.navigator.userAgent.indexOf('Mobi') == -1) {
            \$header.remove();    
        }   
    }
    
    var \$footer= \$('.sticky-footer');
    if(\$footer.data('mobile') == 1) {
        if(window.navigator.userAgent.indexOf('Mobi') == -1) {
            \$footer.remove();    
        }   
    }
    
    if(\$footer.data('anchor')) {
        var anchor = \$footer.data('anchor');
        \$('#page-content-scroll').on('scroll', function(){
           if( \$(this).scrollTop() > \$(\"#article\").height() * anchor / 100 ) {
               \$footer.addClass('on');    
           }
           else {
               \$footer.removeClass('on');
           }
        });
    }
});
</script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:900,800,700' rel='stylesheet' type='text/css'>
<link href=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/styles/font-awesome.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/styles/style.umin.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/styles/framework.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/styles/predefined.css\" rel=\"stylesheet\" type=\"text/css\">
</body>";
    }

    public function getTemplateName()
    {
        return "/home/october/public_html/themes/news/partials/footer.htm";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"share-bottom\">
    <h3>Share Page</h3>
    <div class=\"share-socials-bottom\">
        <a href=\"https://www.facebook.com/sharer/sharer.php?u=http://www.themeforest.net/\">
            <i class=\"fa fa-facebook facebook-color\"></i>
            Facebook
        </a>
        <a href=\"https://twitter.com/home?status=Check%20out%20ThemeForest%20http://www.themeforest.net\">
            <i class=\"fa fa-twitter twitter-color\"></i>
            Twitter
        </a>
        <a href=\"https://plus.google.com/share?url=http://www.themeforest.net\">
            <i class=\"fa fa-google-plus google-color\"></i>
            Google
        </a>

        <a href=\"https://pinterest.com/pin/create/button/?url=http://www.themeforest.net/&media=https://0.s3.envato.com/files/63790821/profile-image.jpg&description=Themes%20and%20Templates\">
            <i class=\"fa fa-pinterest-p pinterest-color\"></i>
            Pinterest
        </a>
        <a href=\"sms:\">
            <i class=\"fa fa-comment-o sms-color\"></i>
            Text
        </a>
        <a href=\"mailto:?&subject=Check this page out!&body=http://www.themeforest.net\">
            <i class=\"fa fa-envelope-o mail-color\"></i>
            Email
        </a>
        <div class=\"clear\"></div>
    </div>
</div>
<script type=\"text/javascript\" src=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/scripts/jquery.js\"></script>
<script type=\"text/javascript\" src=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/scripts/plugins.js\"></script>
<script type=\"text/javascript\" src=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/scripts/custom.js\"></script>
<script type=\"text/javascript\">
jQuery(document).ready(function(\$){
    var \$header = \$('.advertorial-header');
    if(\$header.data('mobile') == 1) {
        if(window.navigator.userAgent.indexOf('Mobi') == -1) {
            \$header.remove();    
        }   
    }
    
    var \$footer= \$('.sticky-footer');
    if(\$footer.data('mobile') == 1) {
        if(window.navigator.userAgent.indexOf('Mobi') == -1) {
            \$footer.remove();    
        }   
    }
    
    if(\$footer.data('anchor')) {
        var anchor = \$footer.data('anchor');
        \$('#page-content-scroll').on('scroll', function(){
           if( \$(this).scrollTop() > \$(\"#article\").height() * anchor / 100 ) {
               \$footer.addClass('on');    
           }
           else {
               \$footer.removeClass('on');
           }
        });
    }
});
</script>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:900,800,700' rel='stylesheet' type='text/css'>
<link href=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/styles/font-awesome.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/styles/style.umin.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/styles/framework.css\" rel=\"stylesheet\" type=\"text/css\">
<link href=\"http://2260af158ec7ac69370f-de0ae1c84c2cb9b8631ec8f1b74b1860.r84.cf3.rackcdn.com/assets/styles/predefined.css\" rel=\"stylesheet\" type=\"text/css\">
</body>", "/home/october/public_html/themes/news/partials/footer.htm", "");
    }
}
