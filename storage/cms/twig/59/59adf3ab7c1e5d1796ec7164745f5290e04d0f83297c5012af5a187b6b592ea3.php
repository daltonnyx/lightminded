<?php

/* /home/october/public_html/themes/news/pages/single-page.htm */
class __TwigTemplate_33689c06dfaf52127dfb091107db840d8030ea836777874438aae9e9f7ac5da0 extends Twig_Template
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
        if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "header_enabled", array())) {
            // line 2
            echo "<div class=\"advertorial-header\" data-mobile=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "header_mobile_only", array()), "html", null, true);
            echo "\">
";
            // line 3
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "header", array());
            echo "
</div>
";
        }
        // line 6
        echo "<div class=\"content\">
    <h3 class=\"half-bottom\">
        ";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title", array()), "html", null, true);
        echo "
    </h3>
    <p class=\"news-article-large-text no-bottom\">
        <img src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "featured_images", array()), "first", array(), "method"), "getPath", array(), "method"), "html", null, true);
        echo "\" alt=\"img\">
        <em>Posted by <a href=\"#\">Enabled</a>, on <a href=\"#\">";
        // line 12
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "published_at", array()), "F jS, Y"), "html", null, true);
        echo "</a></em>
        <em>in 
        ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "categories", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 15
            echo "            <a href=\"#\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "</a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "   
        </em>
    </p>
</div>

<div class=\"content\" id=\"article\">
";
        // line 22
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "content", array());
        echo "
</div>
<div class=\"content buybox-section\">
";
        // line 25
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "buybox", array());
        echo "
</div>
<div class=\"news-article-share full-bottom\">
    <a href=\"https://www.facebook.com/sharer/sharer.php?u=http://lightminded.co/post/";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug", array()), "html", null, true);
        echo "\"><i class=\"facebook-color fa fa-facebook\"></i></a>
    <a href=\"https://twitter.com/home?status=";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title", array()), "html", null, true);
        echo "\"><i class=\"twitter-color fa fa-twitter\"></i></a>
    <a href=\"https://plus.google.com/share?url=http://lightminded.co/post/";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug", array()), "html", null, true);
        echo "\"><i class=\"google-color fa fa-google-plus\"></i></a>
    <a href=\"whatsapp://send?text=";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title", array()), "html", null, true);
        echo "\" data-action=\"share/whatsapp/share\"><i class=\"whatsapp-color fa fa-whatsapp\"></i></a>
    <a href=\"mailto:?&subject=";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title", array()), "html", null, true);
        echo "&body=\"><i class=\"mail-color fa fa-envelope-o\"></i></a>
    <div class=\"clear\"></div>
</div>
<div class=\"content\">
";
        // line 36
        $context['__cms_component_params'] = [];
        echo $this->env->getExtension('CMS')->componentFunction("commentForm"        , $context['__cms_component_params']        );
        unset($context['__cms_component_params']);
        // line 37
        echo "</div>

";
        // line 39
        if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "footer_enabled", array())) {
            // line 40
            echo "<div class=\"sticky-footer\" data-anchor=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "footer_show_position", array()), "html", null, true);
            echo "\" data-mobile=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "footer_mobile_only", array()), "html", null, true);
            echo "\">
";
            // line 41
            echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "sticky_footer", array());
            echo "
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "/home/october/public_html/themes/news/pages/single-page.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 41,  117 => 40,  115 => 39,  111 => 37,  107 => 36,  100 => 32,  96 => 31,  92 => 30,  88 => 29,  84 => 28,  78 => 25,  72 => 22,  64 => 16,  55 => 15,  51 => 14,  46 => 12,  42 => 11,  36 => 8,  32 => 6,  26 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if(post.header_enabled) %}
<div class=\"advertorial-header\" data-mobile=\"{{ post.header_mobile_only }}\">
{{ post.header|raw }}
</div>
{% endif %}
<div class=\"content\">
    <h3 class=\"half-bottom\">
        {{ post.title }}
    </h3>
    <p class=\"news-article-large-text no-bottom\">
        <img src=\"{{ post.featured_images.first().getPath() }}\" alt=\"img\">
        <em>Posted by <a href=\"#\">Enabled</a>, on <a href=\"#\">{{ post.published_at|date(\"F jS, Y\") }}</a></em>
        <em>in 
        {% for category in post.categories %}
            <a href=\"#\">{{ category.name }}</a>
        {% endfor %}   
        </em>
    </p>
</div>

<div class=\"content\" id=\"article\">
{{ post.content|raw }}
</div>
<div class=\"content buybox-section\">
{{ post.buybox | raw }}
</div>
<div class=\"news-article-share full-bottom\">
    <a href=\"https://www.facebook.com/sharer/sharer.php?u=http://lightminded.co/post/{{ post.slug }}\"><i class=\"facebook-color fa fa-facebook\"></i></a>
    <a href=\"https://twitter.com/home?status={{ post.title }}\"><i class=\"twitter-color fa fa-twitter\"></i></a>
    <a href=\"https://plus.google.com/share?url=http://lightminded.co/post/{{ post.slug }}\"><i class=\"google-color fa fa-google-plus\"></i></a>
    <a href=\"whatsapp://send?text={{ post.title }}\" data-action=\"share/whatsapp/share\"><i class=\"whatsapp-color fa fa-whatsapp\"></i></a>
    <a href=\"mailto:?&subject={{ post.title }}&body=\"><i class=\"mail-color fa fa-envelope-o\"></i></a>
    <div class=\"clear\"></div>
</div>
<div class=\"content\">
{% component 'commentForm' %}
</div>

{% if(post.footer_enabled) %}
<div class=\"sticky-footer\" data-anchor=\"{{post.footer_show_position}}\" data-mobile=\"{{ post.footer_mobile_only }}\">
{{ post.sticky_footer|raw }}
</div>
{% endif %}", "/home/october/public_html/themes/news/pages/single-page.htm", "");
    }
}
