<?php

/* /home/october/public_html/themes/news/pages/blog.htm */
class __TwigTemplate_fb6371f3ffc2e33ec3016175040dd707b84116152d7b127331603709e7fe635d extends Twig_Template
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
        echo "<div class=\"content\">
    <div class=\"thumb-layout thumb-layout-page\">
     ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 4
            echo "     <a href=\"post/";
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "slug", array()), "html", null, true);
            echo "\">
        <img class=\"preload-image\" data-original=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["post"], "featured_images", array()), "first", array()), "getPath", array(), "method"), "html", null, true);
            echo "\" alt=\"img\">
        <strong>";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "title", array()), "html", null, true);
            echo "</strong>
        <em>";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "excerpt", array()), "html", null, true);
            echo "</em>
    </a>        
     ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    </div>
    <div class=\"decoration\"></div>
    <a href=\"#\" class=\"load-more-thumbs button button-fullscreen button-green full-bottom\">Load More</a>
</div>";
    }

    public function getTemplateName()
    {
        return "/home/october/public_html/themes/news/pages/blog.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 10,  40 => 7,  36 => 6,  32 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"content\">
    <div class=\"thumb-layout thumb-layout-page\">
     {% for post in posts %}
     <a href=\"post/{{ post.slug }}\">
        <img class=\"preload-image\" data-original=\"{{ post.featured_images.first.getPath() }}\" alt=\"img\">
        <strong>{{ post.title }}</strong>
        <em>{{ post.excerpt }}</em>
    </a>        
     {% endfor %}
    </div>
    <div class=\"decoration\"></div>
    <a href=\"#\" class=\"load-more-thumbs button button-fullscreen button-green full-bottom\">Load More</a>
</div>", "/home/october/public_html/themes/news/pages/blog.htm", "");
    }
}
