.. _routing_patterns:

****************
Routing patterns
****************

When a user dials an external phone number, IvozProvider tries to categorize
this call into one of the routing patterns defined in this section. Once categorized,
the pattern will be used in routing process described in :ref:`Outgoing Routings`.

Usually, it will we useful to have one routing pattern for the countries
defined in the `ISO 3166
<https://en.wikipedia.org/wiki/ISO_3166>`_. That's why IvozProvider automatically
includes all this countries and their prefixes.

.. tip:: Brand operator can choose between keeping this routing pattern if
   finds them useful or deleting them an creating the ones that meet his needs.
