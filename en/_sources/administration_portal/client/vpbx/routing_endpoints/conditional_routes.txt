.. _conditional_routes:

##################
Conditional routes
##################

Conditional routes allows changing a call logic depending on:

- Who is calling.
- What time is calling.
- What day is calling.
- Status of selected route locks.

These routes are electable in three sections:

- DDIs

- Extensions

- IVR custom options

.. tip:: Remaining sections could use conditional routes creating an extension
         that point to a conditional route first, and routing to this extension.

Creating a conditional route
============================

First of all we create a conditional route in **Conditional routes** section.


On creation we define what should be done with a call that does not satisfy any
of the rules added bellow.

Adding rules
============

Once created, we need to add rules, for example:

- Calls from Japan and Germany received in the morning to an specific user


- Calls from Japan and Germany received in the afternoon to another user


- Override the reception IVR for summer days


Evaluating conditional routes
=============================

- Rules are evaluated following the metric parameter. Once a rule matches, its
  logic is applied.

- Rules may have from 1 to 4 criteria:

  - None, one or more matchlist (pre-created, see :ref:`match_lists`)

  - None, one or more schedules (pre-created, see :ref:`schedules`)

  - None, one or more calendar (pre-created, see :ref:`calendars`)

  - None, one or more route locks (pre-created, see :ref:`route locks`)

- These 4 criteria are combined (applying an AND logic).

- If all used criterias in a rule are fulfilled, its logic is applied.

This is how each criteria is evaluated:

.. glossary::

    Matchlist criteria
        If caller number matches any of selected matchlist(s), this criteria is considered fulfilled.

    Schedule criteria
        If current time is included in any of selected schedules, this criteria is considered fulfilled.

    Calendar criteria
          - If current day is marked as holiday in any of selected calendars, this criteria is considered fulfilled.
          - If current day is marked as non-wholeday holiday in any of selected calendars and current time is included
            in its interval, this criteria is considered fulfilled.

    Lock criteria
        If one of selected route locks is open, this criteria is considered fulfilled.

.. warning:: :ref:`Calendar Periods` linked to selected calendars are not taken into account.

DDI routed to a conditional route
=================================

Imagine this scenario: DDI has an external call filter and is routed to the new conditional route.

When a call is received:

- External call filter is evaluated:

  - If current day is marked in any calendar, the holiday logic applies.

  - If current time is not inside any time-gap, out-of-schedule logic applies.

- If external call filter logics have not applied, conditional route is evaluated.

.. attention:: Conditional route is not intended as an external call filter
               replacement. Filter is evaluated first, conditional route afterwards.
