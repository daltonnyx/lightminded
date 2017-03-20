<?php

/* /home/october/public_html/plugins/nyx/comment/components/commentform/layout_a.htm */
class __TwigTemplate_778418a7faaae3446cadedb5506863fcde9056b295aa92a0516b116fe2ecd2da extends Twig_Template
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
        echo "<div class=\"comments-section\">
    <h3>Comments</h3>
    <div class=\"comment-form\">
        ";
        // line 4
        $context['__cms_partial_params'] = [];
        echo $this->env->getExtension('CMS')->partialFunction("commentForm::post_form"        , $context['__cms_partial_params']        );
        unset($context['__cms_partial_params']);
        echo " 
    </div>
";
        // line 6
        if ($this->getAttribute($this->getAttribute((isset($context["commentForm"]) ? $context["commentForm"] : null), "comments", array()), "count", array())) {
            // line 7
            echo "    <ul class=\"comment-list\">
    ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["commentForm"]) ? $context["commentForm"] : null), "comments", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 9
                echo "        <li class=\"comment-item\">
            <div class=\"comment-avatar\">
                <img alt=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "title", array()), "html", null, true);
                echo "\" class=\"comment-img\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["comment"], "avatar", array()), "getThumb", array(0 => 100, 1 => 100, 2 => array("mode" => "crop")), "method"), "html", null, true);
                echo "\" />
            </div>
            <div class=\"comment-content\">
                <div class=\"comment-header\">
                    <h5 class=\"comment-owner\"><a href=\"mailto:";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "email", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "owner", array()), "html", null, true);
                echo "</a></h5>
                    <span class=\"comment-date\">";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "created_at", array()), "html", null, true);
                echo "</span>
                </div>
                <div class=\"comment-message\">
                    ";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["comment"], "message", array()), "html", null, true);
                echo "
                </div>
            </div>
        </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "    </ul>
";
        }
        // line 26
        echo "</div>

";
    }

    public function getTemplateName()
    {
        return "/home/october/public_html/plugins/nyx/comment/components/commentform/layout_a.htm";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 26,  76 => 24,  65 => 19,  59 => 16,  53 => 15,  44 => 11,  40 => 9,  36 => 8,  33 => 7,  31 => 6,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"comments-section\">
    <h3>Comments</h3>
    <div class=\"comment-form\">
        {% partial 'commentForm::post_form' %} 
    </div>
{% if commentForm.comments.count %}
    <ul class=\"comment-list\">
    {% for comment in commentForm.comments %}
        <li class=\"comment-item\">
            <div class=\"comment-avatar\">
                <img alt=\"{{ comment.title }}\" class=\"comment-img\" src=\"{{ comment.avatar.getThumb(100,100, {'mode': 'crop'}) }}\" />
            </div>
            <div class=\"comment-content\">
                <div class=\"comment-header\">
                    <h5 class=\"comment-owner\"><a href=\"mailto:{{comment.email}}\">{{ comment.owner }}</a></h5>
                    <span class=\"comment-date\">{{ comment.created_at }}</span>
                </div>
                <div class=\"comment-message\">
                    {{ comment.message }}
                </div>
            </div>
        </li>
    {% endfor %}
    </ul>
{% endif %}
</div>

", "/home/october/public_html/plugins/nyx/comment/components/commentform/layout_a.htm", "");
    }
}
