<?php

/* /home/october/public_html/themes/news/partials/header.htm */
class __TwigTemplate_9408b5b25dca644cb672d1a5fc344b72c8aa811ee3b58db7cfb445fe4d593dcd extends Twig_Template
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
        echo "<!DOCTYPE HTML>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<meta name=\"viewport\" content=\"user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui\" />
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\" />
<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">
<title>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["this"]) ? $context["this"] : null), "page", array()), "title", array()), "html", null, true);
        echo "</title>

</head>

<body>
    
<div class=\"gallery-fix\"></div>         <!-- Fix Gallery next/prev error on Android -->
<div class=\"sidebar-tap-close\"></div>   <!-- Overlay for content to close Sidebar -->

<div class=\"header-fixed\">
    <a href=\"#\" class=\"header-icon-1 open-left-sidebar\"><i class=\"fa fa-navicon\"></i></a>
    <a href=\"index.html\" class=\"header-logo\">NEWS</a>
    <!--<a href=\"#\" class=\"header-icon-2 open-right-sidebar\"><i class=\"fa fa-heart\"></i></a>-->
    <a href=\"#\" class=\"header-icon-3 open-search-bar\"><i class=\"fa fa-search\"></i></a>
</div>
    
<div class=\"header-search\">
    <input type=\"text\" value=\"Looking for something?\">
    <a class=\"close-search-bar\" href=\"#\"><i class=\"fa fa-times\"></i></a>
</div>";
    }

    public function getTemplateName()
    {
        return "/home/october/public_html/themes/news/partials/header.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 7,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE HTML>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<meta name=\"viewport\" content=\"user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui\" />
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\" />
<meta name=\"apple-mobile-web-app-status-bar-style\" content=\"black\">
<title>{{ this.page.title }}</title>

</head>

<body>
    
<div class=\"gallery-fix\"></div>         <!-- Fix Gallery next/prev error on Android -->
<div class=\"sidebar-tap-close\"></div>   <!-- Overlay for content to close Sidebar -->

<div class=\"header-fixed\">
    <a href=\"#\" class=\"header-icon-1 open-left-sidebar\"><i class=\"fa fa-navicon\"></i></a>
    <a href=\"index.html\" class=\"header-logo\">NEWS</a>
    <!--<a href=\"#\" class=\"header-icon-2 open-right-sidebar\"><i class=\"fa fa-heart\"></i></a>-->
    <a href=\"#\" class=\"header-icon-3 open-search-bar\"><i class=\"fa fa-search\"></i></a>
</div>
    
<div class=\"header-search\">
    <input type=\"text\" value=\"Looking for something?\">
    <a class=\"close-search-bar\" href=\"#\"><i class=\"fa fa-times\"></i></a>
</div>", "/home/october/public_html/themes/news/partials/header.htm", "");
    }
}
