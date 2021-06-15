*****************
Invoice templates
*****************

Before generating an example invoice, it is important to understand that invoice
creation process uses templates.

.. note:: This way, every **brand operator** can adapt which information
          is shown and how this information is shown, add logos, graphs, etc..

Templates are parsed by `handlebars <https://github.com/XaminProject/handlebars.php>`_ and rendered
using `wkhtmltopdf <https://wkhtmltopdf.org/>`_ library.

The helper in the section **Brand configuration** > **Invoice templates** include
a summarized explanation of the creation of templates. In the `official site of wkhtmltopdf
<https://wkhtmltopdf.org/usage/wkhtmltopdf.txt>`_ there is plenty additional information.
You can delve into template expressions `here <http://handlebarsjs.com/expressions.html>`_ as well.

.. tip:: Use *Template testing* option to see a demo invoice for each template.

