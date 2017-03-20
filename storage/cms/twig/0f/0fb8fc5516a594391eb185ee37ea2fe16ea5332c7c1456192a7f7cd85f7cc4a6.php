<?php

/* /home/october/public_html/plugins/nyx/comment/components/commentform/post_form.htm */
class __TwigTemplate_c5207f394453d03fccda66c92b53130b9214f01394cfc4df32f3663602b1055e extends Twig_Template
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
        echo "<textarea placeholder=\"Sign in to comment\"></textarea>

";
    }

    public function getTemplateName()
    {
        return "/home/october/public_html/plugins/nyx/comment/components/commentform/post_form.htm";
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
        return new Twig_Source("<textarea placeholder=\"Sign in to comment\"></textarea>

", "/home/october/public_html/plugins/nyx/comment/components/commentform/post_form.htm", "");
    }
}
