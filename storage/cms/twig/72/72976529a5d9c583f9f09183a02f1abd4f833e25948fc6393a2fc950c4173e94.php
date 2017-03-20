<?php

/* /home/october/public_html/themes/news/partials/leftbar.htm */
class __TwigTemplate_9c442e5ddfb95e168b84dee21e53b17a110e466d58083930b0f399e07536cdea extends Twig_Template
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
        echo "<div class=\"sidebar-left\">
    <div class=\"sidebar-scroll\">
        <div class=\"sidebar-header left-sidebar-header\">
            <h3>News!</h3>            
            <a href=\"#\"><i class=\"fa fa-twitter\"></i></a>
            <a href=\"#\"><i class=\"fa fa-facebook\"></i></a>
            <a class=\"close-sidebar\" href=\"#\"><i class=\"fa fa-times\"></i></a>
            <div class=\"clear\"></div>
        </div>
        <div class=\"sidebar-divider\">
            Navigation
        </div>
        <div class=\"sidebar-menu\">
            <a class=\"menu-item active-item\" href=\"/\"><!-- active-item -->
                <i class=\"fa fa-home bg-red-dark\"></i>
                Home
                <i class=\"fa fa-circle\"></i>
            </a>            
            <a class=\"menu-item\" href=\"/blog\"><!-- active-item -->
                <i class=\"fa fa-image bg-green-dark\"></i>
                Blog
                <i class=\"fa fa-circle\"></i>
            </a>
                    
        </div>    
        <em class=\"sidebar-copyright\">Copyright 2016. All Rights Reserved</em>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "/home/october/public_html/themes/news/partials/leftbar.htm";
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
        return new Twig_Source("<div class=\"sidebar-left\">
    <div class=\"sidebar-scroll\">
        <div class=\"sidebar-header left-sidebar-header\">
            <h3>News!</h3>            
            <a href=\"#\"><i class=\"fa fa-twitter\"></i></a>
            <a href=\"#\"><i class=\"fa fa-facebook\"></i></a>
            <a class=\"close-sidebar\" href=\"#\"><i class=\"fa fa-times\"></i></a>
            <div class=\"clear\"></div>
        </div>
        <div class=\"sidebar-divider\">
            Navigation
        </div>
        <div class=\"sidebar-menu\">
            <a class=\"menu-item active-item\" href=\"/\"><!-- active-item -->
                <i class=\"fa fa-home bg-red-dark\"></i>
                Home
                <i class=\"fa fa-circle\"></i>
            </a>            
            <a class=\"menu-item\" href=\"/blog\"><!-- active-item -->
                <i class=\"fa fa-image bg-green-dark\"></i>
                Blog
                <i class=\"fa fa-circle\"></i>
            </a>
                    
        </div>    
        <em class=\"sidebar-copyright\">Copyright 2016. All Rights Reserved</em>
    </div>
</div>", "/home/october/public_html/themes/news/partials/leftbar.htm", "");
    }
}
