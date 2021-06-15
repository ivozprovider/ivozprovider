.. _invoices:

##################
Invoice generation
##################

The final goal of this section is to generate invoices with the call that imply
cost of a given company.

*****************
Invoice templates
*****************

Before generating an example invoice, it is important to understand that invoice
creation process uses templates.

.. hint:: This way, every **brand operator** can adapt which information
          is shown and how this information is shown, add logos, graphs, etc..

Templates are parsed by `handlebars <https://github.com/XaminProject/handlebars.php>`_ and rendered
using `wkhtmltopdf <https://wkhtmltopdf.org/>`_ library.

The helper in the section **Brand configuration** > **Invoice templates** include
a summarized explanation of the creation of templates. In the `official site of wkhtmltopdf
<https://wkhtmltopdf.org/usage/wkhtmltopdf.txt>`_ there is plenty additional information.
You can delve into template expressions `here <http://handlebarsjs.com/expressions.html>`_ as well.

By default, this section provides some basic example templates:

.. image:: img/invoices_templates.png

***********
Fixed costs
***********

Fixed cost are a constant concept that can be added to invoices that use invoice
templates that take into account these fixed costs.

Take this image as an example (section **Fixed costs**):

.. image:: img/fixed_costs.png

We will explain afterwords how these fixed costs can be added to a invoice and
in what amount.

****************
Invoice creation
****************

**Invoices** section lets **brand operator** to generate invoices to issue to its
clients.

This is the process to add a create a new invoice:

.. image:: img/invoice_add.png
    :align: center

.. glossary::

    Number
        Will be included in the invoice and shows the invoice number

    Company
        The company whose calls will be invoiced

    Start/End date
        The time period of the calls that will be invoiced

    Taxes
        Taxes to add to the final cost (e.g. VAT)

    Template
        Invoice template that will be used

Let's add some fixed costs to this invoice:

.. image:: img/invoice_add2.png
    :align: center

Select previously defined fixed costs and their amounts:

.. image:: img/invoice_add3.png
    :align: center

At this point, we can generate the invoice pressing this button:

.. image:: img/invoice_add4.png
    :align: center

Pressing this button we can see which calls have been included in the invoice:

.. image:: img/invoice_add5.png
    :align: center

And pressing this one we can download the invoice in PDF format:

.. image:: img/invoice_add6.png
    :align: center


.. warning:: End date must be a past date. In other words, it is not allowed to
   generate invoices for future dates o dates including today.

.. error:: All the calls of the selected period must be billed.
