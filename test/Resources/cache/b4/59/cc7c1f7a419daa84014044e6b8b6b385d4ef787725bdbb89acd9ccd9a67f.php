<?php

/* @test/user.html.twig */
class __TwigTemplate_b459cc7c1f7a419daa84014044e6b8b6b385d4ef787725bdbb89acd9ccd9a67f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('body', $context, $blocks);
        // line 8
        echo "
";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "    <h1>Title : ";
        echo call_user_func_array($this->env->getFilter('bolder')->getCallable(), array($this->env, (isset($context["pos"]) ? $context["pos"] : null)));
        echo "</h1>
    <font color=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["color"]) ? $context["color"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "</font>
";
    }

    public function getTemplateName()
    {
        return "@test/user.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  33 => 5,  30 => 4,  25 => 8,  23 => 4,  20 => 3,);
    }
}
