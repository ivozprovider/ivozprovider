******************
Invoice schedulers
******************

This section allows programming the automatic periodical creation of invoices.

When adding a new definition, these fields are shown:

.. glossary::

    Name
        Name of the scheduled invoice

    Client
        Which client calls should be included

    Email
        Send generated invoices via email. Empty if no automatic mail is wanted.

    Frequency/Unit
        Defines the frequency (once a month, every 7 days, etc.) of the programmed task

    Invoice number sequence
        Scheduled invoices will use the next invoice number available in a given predefined sequence

    Call discount
        Percentage to discount calls, prior to tax rate calculation. No effect on fixed concepts.

    Tax rate
        Taxes to add to the final cost (e.g. VAT)


.. tip:: Fixed concepts can be added in the same way as in manual invoice definitions

Invoices generated due to an schedule can be seen in two ways:

- In each row of *Invoice schedulers* section, **List of Invoices** option.

- In *Invoices* section, indistinguishable to manually generated invoices.

Frequency definition
====================

It is interesting to understand how *Frequency* and *Unit* fields define the periodical task:

- Invoices are programmed at 08:00:00 by default on mondays, 1st of month or 1st of January (depending on Unit value).

- Once created a new schedule, **Next execution** shows when will happen next invoice generation.

**Next execution** value can be mangled, but generated invoice always will:

- Discard current day (2018/11/01 08:00:00 will set 2018/10/31 23:59:59 as *Out date*).

- *In date* will be *out date* minus X week(s), X month(s) or X year(s) (X equals to *Frequency* value) + 1 second.


.. rubric:: Example 1: Unit: week - Frequency 2

Next execution will be set to next monday at 08:00 and invoices will include calls of last 2 weeks.

.. rubric:: Example 1: Unit: month - Frequency 3

Next execution will be set to next 1st of month at 08:00 and invoices will include calls of last 3 months.

.. rubric:: Example 1: Unit: month - Frequency 1 - Next execution mangling

Next execution will be set to next 1st of month at 08:00 but we mangle it to 3rd of month at 10:00:00.

Invoice will include calls from 3nd of previous month at 00:00:00 to 2nd to current month at 23:59:59.

.. tip:: *Last execution* shows the date of last execution and its result (success/error).

.. note:: Both *next execution* and *last execution* are shown using brand timezone.
