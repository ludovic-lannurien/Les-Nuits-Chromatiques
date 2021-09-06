<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* genre/browse.html.twig */
class __TwigTemplate_4b2285e03a05c43a7ac91d745c45eaa3fd1e424b523a0e8e12c255a927ba0afa extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'active_genre' => [$this, 'block_active_genre'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "genre/browse.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "genre/browse.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "genre/browse.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "LNC | Liste des genres";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_active_genre($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "active_genre"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "active_genre"));

        echo "active";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "\t<main>
\t\t<section class=\"container list\">
\t\t\t<h1>Liste des genres</h1>

\t\t\t";
        // line 12
        echo twig_include($this->env, $context, "_flash_messages.html.twig");
        echo "

            <a class=\"btn btn-item btn-secondary\" href=\"";
        // line 14
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_genre_add");
        echo "\">Ajouter un genre</a>

\t\t\t<table class=\"table table-striped table-dark\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
                        <th scope=\"col\">#</th>
\t\t\t\t\t\t<th scope=\"col\">Nom</th>
\t\t\t\t\t\t<th scope=\"col\">Afficher</th>
                        <th scope=\"col\">Modifier</th>
                        <th scope=\"col\">Supprimer</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["genres"]) || array_key_exists("genres", $context) ? $context["genres"] : (function () { throw new RuntimeError('Variable "genres" does not exist.', 27, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["genre"]) {
            // line 28
            echo "\t\t\t\t\t\t<tr>
                            <th scope=\"row\">";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["genre"], "id", [], "any", false, false, false, 29), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["genre"], "name", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t<td><a class=\"btn btn-primary\" href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_genre_read", ["slug" => twig_get_attribute($this->env, $this->source, $context["genre"], "slug", [], "any", false, false, false, 31)]), "html", null, true);
            echo "\"><i class=\"fas fa-eye\"></i></a></td>
                            <td><a class=\"btn btn-success\" href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_genre_edit", ["slug" => twig_get_attribute($this->env, $this->source, $context["genre"], "slug", [], "any", false, false, false, 32)]), "html", null, true);
            echo "\"><i class=\"fas fa-edit\"></i></a></td>
                            <td><a class=\"btn btn-danger\" href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_genre_delete", ["slug" => twig_get_attribute($this->env, $this->source, $context["genre"], "slug", [], "any", false, false, false, 33)]), "html", null, true);
            echo "\" onclick=\"return confirm('Etes-vous sûr de vouloir supprimer le genre ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["genre"], "name", [], "any", false, false, false, 33), "html", null, true);
            echo " ?')\"><i class=\"fas fa-trash-alt\"></i></a></td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['genre'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t</section>
\t</main>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "genre/browse.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 36,  158 => 33,  154 => 32,  150 => 31,  146 => 30,  142 => 29,  139 => 28,  135 => 27,  119 => 14,  114 => 12,  108 => 8,  98 => 7,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}LNC | Liste des genres{% endblock %}

{% block active_genre %}active{% endblock %}

{% block body %}
\t<main>
\t\t<section class=\"container list\">
\t\t\t<h1>Liste des genres</h1>

\t\t\t{{ include('_flash_messages.html.twig') }}

            <a class=\"btn btn-item btn-secondary\" href=\"{{ path('admin_genre_add') }}\">Ajouter un genre</a>

\t\t\t<table class=\"table table-striped table-dark\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
                        <th scope=\"col\">#</th>
\t\t\t\t\t\t<th scope=\"col\">Nom</th>
\t\t\t\t\t\t<th scope=\"col\">Afficher</th>
                        <th scope=\"col\">Modifier</th>
                        <th scope=\"col\">Supprimer</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t{% for genre in genres %}
\t\t\t\t\t\t<tr>
                            <th scope=\"row\">{{ genre.id }}</th>
\t\t\t\t\t\t\t<td>{{ genre.name }}</td>
\t\t\t\t\t\t\t<td><a class=\"btn btn-primary\" href=\"{{ path('admin_genre_read', { slug: genre.slug }) }}\"><i class=\"fas fa-eye\"></i></a></td>
                            <td><a class=\"btn btn-success\" href=\"{{ path('admin_genre_edit', { slug: genre.slug }) }}\"><i class=\"fas fa-edit\"></i></a></td>
                            <td><a class=\"btn btn-danger\" href=\"{{ path('admin_genre_delete', { slug: genre.slug }) }}\" onclick=\"return confirm('Etes-vous sûr de vouloir supprimer le genre {{ genre.name }} ?')\"><i class=\"fas fa-trash-alt\"></i></a></td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t{% endfor %}
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</section>
\t</main>
{% endblock %}
", "genre/browse.html.twig", "/Applications/MAMP/htdocs/projet-les-nuits-chromatiques/templates/genre/browse.html.twig");
    }
}
