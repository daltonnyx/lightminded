<?php

/* /home/october/public_html/themes/news/layouts/default.htm */
class __TwigTemplate_c8c4955f51862c06d35b1163ccc28ac9e5e0dc43dbb68f6220ac092c1eb211eb extends Twig_Template
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
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('CMS')->partialFunction("header"        , $context['__cms_partial_params']        );
        unset($context['__cms_partial_params']);
        // line 2
        echo "
";
        // line 3
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('CMS')->partialFunction("leftbar"        , $context['__cms_partial_params']        );
        unset($context['__cms_partial_params']);
        // line 4
        echo "
<div id=\"page-content\"><!--Add sidebar-move to move with body-->
    <div id=\"page-content-scroll\"><!--Enables this element to be scrolled -->        
        <div class=\"header-clear-large\"></div>
        ";
        // line 8
        echo $this->env->getExtension('CMS')->pageFunction();
        // line 9
        echo "        <div class=\"footer\">
            <div class=\"footer-content\">
                <h3 class=\"footer-logo\">NEWS MOBILE</h3>
                <p class=\"footer-text\">
                    We aim to simplify your life by creating a beautiful and simple product that's feature rich and easy to use!
                </p>
            </div>
            <div class=\"footer-socials\">
                <a href=\"#\" class=\"scale-hover facebook-color\"><i class=\"fa fa-facebook\"></i></a>
                <a href=\"#\" class=\"scale-hover twitter-color\"><i class=\"fa fa-twitter\"></i></a>
                <a href=\"#\" class=\"scale-hover google-color\"><i class=\"fa fa-google-plus\"></i></a>
                <a href=\"#\" class=\"scale-hover phone-color\"><i class=\"fa fa-phone\"></i></a>
                <a href=\"#\" class=\"scale-hover mail-color\"><i class=\"fa fa-envelope-o\"></i></a>
                <a href=\"#\" class=\"scale-hover bg-night-dark back-to-top\"><i class=\"fa fa-angle-up\"></i></a>
                <div class=\"clear\"></div>
            </div>
            <p class=\"footer-strip\">Copyright <span id=\"copyright-year\"></span> Enabled. All Rights Reserved</p>
        </div>
    </div>
    
</div>



";
        // line 33
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('CMS')->partialFunction("footer"        , $context['__cms_partial_params']        );
        unset($context['__cms_partial_params']);
    }

    public function getTemplateName()
    {
        return "/home/october/public_html/themes/news/layouts/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 33,  38 => 9,  36 => 8,  30 => 4,  26 => 3,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% partial 'header' %}

{% partial 'leftbar' %}

<div id=\"page-content\"><!--Add sidebar-move to move with body-->
    <div id=\"page-content-scroll\"><!--Enables this element to be scrolled -->        
        <div class=\"header-clear-large\"></div>
        {% page %}
        <div class=\"footer\">
            <div class=\"footer-content\">
                <h3 class=\"footer-logo\">NEWS MOBILE</h3>
                <p class=\"footer-text\">
                    We aim to simplify your life by creating a beautiful and simple product that's feature rich and easy to use!
                </p>
            </div>
            <div class=\"footer-socials\">
                <a href=\"#\" class=\"scale-hover facebook-color\"><i class=\"fa fa-facebook\"></i></a>
                <a href=\"#\" class=\"scale-hover twitter-color\"><i class=\"fa fa-twitter\"></i></a>
                <a href=\"#\" class=\"scale-hover google-color\"><i class=\"fa fa-google-plus\"></i></a>
                <a href=\"#\" class=\"scale-hover phone-color\"><i class=\"fa fa-phone\"></i></a>
                <a href=\"#\" class=\"scale-hover mail-color\"><i class=\"fa fa-envelope-o\"></i></a>
                <a href=\"#\" class=\"scale-hover bg-night-dark back-to-top\"><i class=\"fa fa-angle-up\"></i></a>
                <div class=\"clear\"></div>
            </div>
            <p class=\"footer-strip\">Copyright <span id=\"copyright-year\"></span> Enabled. All Rights Reserved</p>
        </div>
    </div>
    
</div>



{% partial 'footer' %}", "/home/october/public_html/themes/news/layouts/default.htm", "");
    }
}
