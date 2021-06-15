#############
Pricing plans
#############

In :ref:`noplan_nocall` section the process of creating a *pricing plan* was
described quite thoroughly and main concepts were introduced:

- A pricing plan groups some pricing patterns (prefixes) with their cost details:

    - Cost per minute
    - Call establishment cost
    - Bill by seconds, by minutes, etc.

- A pricing plan is linked to an specific company with a period of time in which
  this asociation is valid.

- One company may have more than one valid pricing plan for an specific call in
  an specific moment.

- In such cases, the call price will be calculated using the price detail of the
  matching pricing plan with minor metric.

***************
Manual creation
***************

:ref:`Manual creation of a pricing plan <price_plan>` implied the previous
creation of at least one :ref:`price pattern <price_pattern>`.

At this point, the future brand operator may have noticed that creating thousands
of pricing patterns would be a really annoying and time consuming task, as there
are 254 countries, each of them with their mobile networks, landline networks,
special service numbers, etc.

That's why the creation of pricing patterns and pricing plans is done using a
`CSV <https://es.wikipedia.org/wiki/CSV>`_ file.

********************
Importing a CSV file
********************

The first step is creating an empty pricing plan to import the prices in (section
**Brand configuration** > **Pricing plans**):

.. image:: img/pricing_plans_add.png

We enter the empty pricing plan we have just created:

.. image:: img/pricing_plans_add_price.png

This is the key button for the massive pricing pattern import process:

.. image:: img/pricing_plan_csv.png

Once chosen the CSV file to import, this window turns up:

.. image:: img/pricing_plan_csv3.png

We can select which column contains which field, in case we want to import a
`CSV <https://es.wikipedia.org/wiki/CSV>`_ file in a non-recommended format. We
can also decide whether to import the first line or discard it as it may have
titles instead of data.

.. hint:: The importing process is done in background, letting the brand operator
   continue doing other stuff while it is finished.

CSV format
==========

Although the above window allowed importing non-recommended format `CSV
<https://es.wikipedia.org/wiki/CSV>`_  files, we encourage you to import a file
in the proposed format, as it will make this process much easier.

The recommended `CSV <https://es.wikipedia.org/wiki/CSV>`_ format is described
in the contextual help section, that includes even a link to download an example
file:

.. image:: img/pricing_plan_csv2.png

The order of the columns should be:

- Pricing pattern name
- Pricing pattern description
- Prefix
- Price per minute
- Establishment cost
- Billing period

.. note:: It is recommended to double quote alphanumeric entries, though
   it is not compulsory for single word entries (or entries without odd symbols).
   **If they contain any comma, they MUST be quoted**.

.. error:: Floating numbers **MUST use point as decimal separator**.

.. note:: Numeric entries can be quoted with double quotes, but it is
   not mandatory.

.. important:: The importing system will just bind the price to an existing
   price pattern or, if prefix doesn't match any existing pricing pattern, it will
   create one.

.. warning:: The price of the call will be increased every billing period unit.

    - If *billing period* is set to 1, every second the price will be increased
      *price per minute* divided by 60 (bill by seconds).

    - If *billing period* is set to 60, every minute the price will be increased
      *price per minute* (bill by minutes).

Once the import process is over, we just have to bind the pricing plan to
the companies we want following :ref:`the procedure explained in
the previous block <pricing_plan_to_company>`.
