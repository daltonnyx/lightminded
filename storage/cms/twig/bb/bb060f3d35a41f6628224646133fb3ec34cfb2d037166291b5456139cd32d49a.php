<?php

/* /home/october/public_html/plugins/nyx/comment/components/commentform/default.htm */
class __TwigTemplate_e6677134a68f867ecd3b36015e3eff9992f9c47a30bef47cdb78eea76db11182 extends Twig_Template
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
        if (($this->getAttribute((isset($context["__SELF__"]) ? $context["__SELF__"] : null), "property", array(0 => "layout"), "method") == "layout_a")) {
            // line 2
            echo "    ";
            $context['__cms_partial_params'] = [];
            echo $this->env->getExtension('CMS')->partialFunction("commentForm::layout_a"            , $context['__cms_partial_params']            );
            unset($context['__cms_partial_params']);
        } elseif (($this->getAttribute(        // line 3
(isset($context["__SELF__"]) ? $context["__SELF__"] : null), "property", array(0 => "layout"), "method") == "layout_b")) {
            // line 4
            echo "    ";
            $context['__cms_partial_params'] = [];
            echo $this->env->getExtension('CMS')->partialFunction("commentForm::layout_b"            , $context['__cms_partial_params']            );
            unset($context['__cms_partial_params']);
        }
    }

    public function getTemplateName()
    {
        return "/home/october/public_html/plugins/nyx/comment/components/commentform/default.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 4,  26 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if(__SELF__.property('layout') == 'layout_a') %}
    {% partial 'commentForm::layout_a' %}
{% elseif(__SELF__.property('layout') == 'layout_b') %}
    {% partial 'commentForm::layout_b' %}
{% endif %}
", "/home/october/public_html/plugins/nyx/comment/components/commentform/default.htm", "");
    }
}
