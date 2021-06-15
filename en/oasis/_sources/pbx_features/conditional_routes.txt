.. _conditional_routes:

##################
Conditional routes
##################

Conditional routes allows changing a call logic depending on:

- Who is calling.
- What time is calling.
- What day is calling.
- Route lock status

These routes are electable in three sections:

- DDIs

- Extensions

- IVR custom options

.. tip:: Remaining sections could use conditional routes creating an extension
         that point to a conditional route first, and routing to this extension.

Creating a conditional route
============================

First of all we create a conditional route in **Conditional routes** section:

.. image:: img/conditional_route_edit.png

On creation we define what should be done with a call that does not satisfy any
of the rules described below.

Adding rules
============

Once created, we need to add rules, for example:

.. rubric:: Calls from Japan and Germany received in the morning to an specific user

.. image:: img/conditional_route_rule1.png

.. rubric:: Calls from Japan and Germany received in the afternoon to another user

.. image:: img/conditional_route_rule2.png

.. rubric:: Override the reception IVR for summer days

.. image:: img/conditional_route_rule3.png

With this example rules, our example conditional route will look like this:

.. image:: img/conditional_route_rules.png

.. note:: Since IvozProvider 1.7 **Route locks** (see :ref:`route_locks`) can be used as a criteria too.

Some notes about this example:

- Rules are evaluated following the metric parameter. Once a rule matches, its 
  logic is applied.

- Rules may have from 1 to 4 criteria:

  - None, one or more matchlist (pre-created, see :ref:`match_lists`)

  - None, one or more schedules (pre-created, see :ref:`schedules`)

  - None, one or more calendar (pre-created, see :ref:`calendars`)

  - None, one or more route locks (pre-created, see :ref:`route_locks`)

- These 4 criteria are combined (applying an AND logic).

.. important:: When adding more than one route lock, if any of them is Opened, this criteria will be considered as fulfilled.

Using a conditional route
=========================

The behaviour when an IVR option or an extension is routed to a conditional 
route is easy to understand, but using conditional routes with DDIs need an
additional explanation.

Imagine this scenario:

.. image:: img/conditional_route_ddi.png

DDI has an external call filter and is routed to the new conditional route.

When a call is received:

- External call filter is evaluated:

  - If current day is marked in any calendar, the holiday logic applies.

  - If current time is not inside any time-gap, out-of-schedule logic applies.

- If external call filter logics have not applied, conditional route is evaluated.

.. attention:: Conditional route is not intented as an external call filter
               replacement. Filter is evaluated first, conditional route afterwards.
