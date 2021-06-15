
########
Invoices
########

**Invoices** section lets **brand operator** generate invoices to issue to its clients and lists all invoices of all
clients, no matter if they were generated automatically or manually.

.. tip:: Brand administrators can also enable view mode on this section to their clients. Check Client's Invoice data
    configuration section for more information.


Generating a new invoice
========================

These are the fields shown when *Add Invoice* options is used:

.. glossary::

    Invoice number sequence
        Use next number of a predefined sequence or use custom number

    Number
        Only shown if no sequence number is used, lets brand operator to introduce a custom number

    Client
        The client whose calls will be invoiced

    Template
        Invoice template that will be used to generate the PDF invoice file

    In/Out date
        The time period of the calls that will be invoiced

    Call discount
        Percentage to discount calls, prior to tax rate calculation. No effect on fixed concepts.

    Tax rate
        Taxes to add to the final cost (e.g. VAT)


Once saved, some :ref:`fixed costs` can be added before generating the final invoice. This is achieved with **Fixed costs**
subsection, that allows adding several positive concepts to the invoice:

.. glossary::

    Fixed cost
        Choose a predefined cost

    Quantity
        How many of this must be included

The last step is pressing **Generate invoice** suboption to create the final PDF. Afterwards, we can see which calls have been
included in a particular invoice with **List of External Calls** option or download the PDF file.

.. warning:: Only outbound external calls are included into invoices
.. tip:: **Status** column shows if the PDF generation task is waiting for async worker (*waiting*), in process (*processing*),
         ended with errors (*failed*) or ended successfully (*created*). On blank, *Generate invoice* needs to be pressed.

Rules
-----

Invoice subsystem enforces several rules before generating a new invoice:

- **Proper date interval**: *out date* must be bigger (after) than *in date*.

- **Out date must be previous than today**: Future dates or today's calls cannot be invoiced.

- **One call, one invoice:** All calls in time interval cannot be included in any other invoice.

- **All calls in interval must be billed**.

.. warning:: If any of these rules is not fulfilled, the invoice won't be created and the system will warn.

Timezones
---------

*In date* and *Out date* will be interpreted using brand timezone. On the other hand, call times in invoices are converted
to client timezone, leading to situations like this:

- *In date*: 01/10/2018 00:00:00

- *Out date*: 31/10/2018 23:59:59

- Brand timezone: UTC + 1

- Client timezone: UTC - 1

- Time interval in brand timezone: 01/10/2018 00:00 - 31/10/2018 23:59:59

- Time interval in client timezone: 30/09/2018 22:00 - 31/10/2018 21:59:59


Invoice generated for the client will have calls from 30nd of september at 22:00 to 31st of october at 21:59:59, which
may seem awkward to the client.


Regenerating an existing invoice
================================

Brand operator can edit any invoice parameter (as long as rules above are fulfilled), add/remove fixed concepts, etc. and
press **Generate invoice** again.

.. tip:: Whenever a change is made, *Status* column will change to blank to show that *Generate invoice* must be pressed.

Generate invoice for rerated calls
----------------------------------

If rating of any call included in an invoice is wrong, :ref:`External Calls` section allows rerating it, as long as the
invoice that includes the call is previously deleted.

Once deleted and rerated, a new row can be added in *Invoices* section to include rerated calls.

List of external calls
======================

You can see calls of a given invoice using this option. You will see the same fields as in :ref:`External calls`.

.. error:: It is compulsory to have **a valid brand URL** in order to use *Export to CSV* feature in this subsection.
