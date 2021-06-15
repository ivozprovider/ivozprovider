##########
Extensions
##########

**An extensions is**, by definition, **an internal number with an assigned
logic**. Internal users' calls to numbers listed in this section do not traverse
call ACL logics: **every user/friend is allowed to call to any number listed here**.

.. rubric:: Create a new extension

.. glossary::

    Number
        The number that must be dialed by the internal user that will trigger
        the configured logic. It must have a minimum length of 2 and must be 
        a number.

    Route
        This select will allow us to choose the logic that will use this
        extension when is dialed from an internal user. Depending on the selected
        route, and additional select or input will be shown to select the
        hunt group, conference room, user, etc.

.. warning:: If an extension has a number that conflicts with an external
   number, this external number will be masked and, in practice, will be
   unavailable for the whole client.

Route options
=============

.. glossary::

    Unassigned
        Calls to this extension will be hung up.

    User
        Selected :ref:`user <Users>` will be called.

    IVR
        Selected :ref:`IVR <IVRs>` logic will be called.

    Huntgroup
        Selected :ref:`huntgroup <huntgroups>` will be called.

    Friend
        Calls to this extension will evaluate :ref:`friends <Friends>` logic.

    Queue
        Call will be delivered to selected :ref:`queue <Queues>`.

    Conditional route
        Call will be delivered to selected :ref:`conditional route <Conditional Routes>`.

    Number
        Calling to this extension will generate an external outbound call
        to introduced number.

.. note:: Any internal user can generate an external outbound call via an **Extension
          routed to Number** even if its *Call permissions* does not allow to
          call to that destination directly.


Import aliases
==============

*Extensions to numbers* are useful to call to most dialed numbers easily. As each
client usually has a list with frequent numbers, **Import aliases** button allows
importing them through a CSV file.

.. rubric:: Example import file

.. code-block:: none

    Extension,CountryPrefix,Number,CountryCode
    200,+34,944048184,ES
    201,+34,944048185,ES
    202,+34,944048186
    203,+1,944048187
    204,+1,944048188,US

Numbers will be imported synchronously following these rules:

- If given extension already exists and points to a number: number is updated.
- If given extension already exists and does not point to a number: error.
- If given country prefix does not exist: error.
- If given country code does not exist: error.
- If given country prefix and country code combination does not exist: error.
- CountryCode is optional: if given country prefix is used in multiple countries
  and country code is not given, first country is selected.
