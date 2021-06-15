************
Routing tags
************

In most scenarios, Brands administrators are responsible for configuring
:ref:`Carriers` and :ref:`Outgoing Routings` to provide connectivity for
their clients. But in some cases, clients want to choose the outgoing routing to
use per call.

A Routing tag is **a code that will prefix the destination number when placing calls to IvozProvider** and allow clients
to choose different routes for same destinations.

Add/Edit/Delete a routing tag
-----------------------------

Routing tag definition only implies these two fields:

.. glossary::

    Name
        Name used for referencing (e.g. "Premium")

    Tag
        Prefix itself

.. important:: Tag **must** have this format: from 1 to 3 digits ended by # symbol.

Using routing tags
------------------

Once created, routing tags can be used in three different sections:

- In **client edit screen**, to allow a client to use a routing tag.

.. error:: Using a non enabled routing tag will cause the call to be declined.

- In **Outgoing routings** to modify the way those calls are routed.

- In **client - rating profiles association**, so that different routes imply different billing.

.. important:: Route tags are only available to wholesale and retail clients at the moment.
